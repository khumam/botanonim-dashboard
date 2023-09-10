<?php

namespace App\Repositories;

use App\Interfaces\ReportInterface;
use App\Models\Banned;
use App\Models\Report;
use App\Notifications\TelegramNotification;
use App\Traits\RedirectNotification;
use DB;
use Illuminate\Support\Facades\Auth;

class ReportRepository extends Repository implements ReportInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new Report();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->with(['reported', 'reportedby'])->get();
        $this->datatableRoute = 'admin.report';
        $this->datatableAction = [];
        $this->datatableHeader = [
            'Reported Username' => 'reported_username',
            'Reported' => 'reported',
            'Reported By Username' => 'reported_by_username',
            'Reported By' => 'reported_by',
            'Reason' => 'reason',
            'Banned' => 'banned'
        ];
        $this->datatableColumns = [
            'reported_username' => function ($data) {
                return $data->reported->username;
            },
            'reported' => function ($data) {
                return $data->reported->first_name . " " . $data->reported->last_name;
            },
            'reported_by_username' => function ($data) {
                return $data->reportedby->username;
            },
            'reported_by' => function ($data) {
                return $data->reportedby->first_name . " " . $data->reportedby->last_name;
            },
            'banned' => function ($data) {
                return "<form action='" . route('admin.report.banned') . "' method='POST'>"
                . csrf_field() .
                "<input type='hidden' value='$data->id' name='report_id'>" .
                "<input type='hidden' value='$data->user_id' name='user_id'>" .
                "<button class='btn btn-danger btn-sm'>Ban!</button></form>";
            }
        ];
    }

    public function banned($reportId)
    {
        DB::beginTransaction();
        try {
            $report = Report::where('id', $reportId)->first();
            Banned::create([
                'user_id' => $report->reported_id,
                'chat_id' => $report->reported_id,
                'reason' => $report->reason,
            ]);
            Report::where('reported_id', $report->reported_id)->delete();
            $message = '🤖 Kamu dapat surat cinta dari admin. Karena terindikasi melanggar aturan bot, kamu dibanned dan tidak dapat melakukan aktivitas apapun di dalam bot ini.';
            Auth::user()->notify(new TelegramNotification($report->reported_id, $message));
            DB::commit();
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            return false;
        }
    }
}
