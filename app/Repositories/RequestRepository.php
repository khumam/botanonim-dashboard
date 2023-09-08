<?php

namespace App\Repositories;

use App\Interfaces\RequestInterface;
use App\Models\Request;
use App\Models\UserBot;
use App\Notifications\TelegramNotification;
use App\Traits\RedirectNotification;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class RequestRepository extends Repository implements RequestInterface
{
    use RedirectNotification;

    public function __construct()
    {
        $this->model = new Request();
        $this->fillable = $this->model->getFillable();
        $this->datatableSourceData = $this->model->with('user')->latest()->get();
        $this->datatableRoute = 'admin.request';
        $this->datatableAction = ['SHOW'];
        $this->datatableHeader = [
            'User ID' => 'user_id',
            'Chat ID' => 'chat_id',
            'Fullname' => 'fullname',
            'Username' => 'username',
            'Approve' => 'approve'
        ];
        $this->datatableColumns = [
            'fullname' => function ($data) {
                return $data->user->first_name . " " . $data->user->last_name;
            },
            'username' => function ($data) {
                return $data->user->username;
            },
            'approve' => function ($data) {
                return "<form action='". route('admin.request.approve', $data->user_id) ."' method='POST'>".
                csrf_field()
                ."<button class='btn btn-success btn-sm'>Approve</button></form>";
            }
        ];
        $this->datatableRawColumns = ['fullname', 'username', 'approve'];
    }

    public function approve($userId)
    {
        DB::beginTransaction();
        try {
            UserBot::where('id', $userId)->update([
                'verifed_at' => Carbon::now()
            ]);
            Request::where('user_id', $userId)->delete();
            DB::commit();
            $message = '🤖 Hallo akun kamu sudah aktif, kamu sekarang bisa menggunakan bot. Selamat berbincang!.';
            Auth::user()->notify(new TelegramNotification($userId, $message));
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            return false;
        }
    }
}
