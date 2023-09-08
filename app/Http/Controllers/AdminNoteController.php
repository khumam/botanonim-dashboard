<?php

namespace App\Http\Controllers;

use App\Interfaces\AdminNoteInterface;
use App\Models\AdminNote;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminNoteController extends Controller
{
    use RedirectNotification;
    protected $adminNoteInterface;

    public function __construct(AdminNoteInterface $adminNoteInterface)
    {
        $this->adminNoteInterface = $adminNoteInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->adminNoteInterface->buildDatatableTable();
        $datatableScript = $this->adminNoteInterface->buildDatatableScript();
        return view('request.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminNote  $adminNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $act = $this->adminNoteInterface->destroy(['id' => $id]);
        return $this->sendRedirectTo($act, 'Berhasil menghapus catatan', 'Gagal menghapus catatan');
    }

    /**
     * list
     *
     * @param  mixed $request
     * @return void
     */
    public function list(Request $request)
    {
        return ($request->ajax()) ? $this->adminNoteInterface->datatable() : null;
    }
}
