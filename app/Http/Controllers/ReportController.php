<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportInterface;
use App\Models\Report;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use RedirectNotification;

    protected $reportInterface;

    public function __construct(ReportInterface $reportInterface)
    {
        $this->reportInterface = $reportInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->reportInterface->buildDatatableTable();
        $datatableScript = $this->reportInterface->buildDatatableScript();
        return view('request.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report): View
    {
        return view('report.show', compact('report'));
    }

    public function list(Request $request)
    {
        return ($request->ajax()) ? $this->reportInterface->datatable() : null;
    }

    public function banned(Request $request)
    {
        $reportId = $request->report_id;
        $act = $this->reportInterface->banned($reportId);
        return $this->sendRedirectTo($act, 'Berhasil banned user', 'Gagal banned user', route('admin.report.index'));
    }
}
