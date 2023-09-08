<?php

namespace App\Http\Controllers;

use App\Interfaces\BannedInterface;
use App\Models\Banned;
use App\Notifications\TelegramNotification;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannedController extends Controller
{
    use RedirectNotification;

    protected $bannedInterface;

    public function __construct(BannedInterface $bannedInterface)
    {
        $this->bannedInterface = $bannedInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->bannedInterface->buildDatatableTable();
        $datatableScript = $this->bannedInterface->buildDatatableScript();
        return view('request.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banned  $banned
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banned $banned)
    {
        $act = $this->bannedInterface->destroy(['id' => $banned->id]);
        $message = '🤖 Kamu dapat kesempatan untuk menggunakan kembali bot ini. Jangan sampai disalah gunakan atau nanti akan diblacklist!.';
        Auth::user()->notify(new TelegramNotification($banned->user_id, $message));
        return $this->sendRedirectTo($act, 'Berhasil menghapus user dari daftar banned', 'Gagal menghapus user dari daftar banned');
    }

    /**
     * list
     *
     * @param  mixed $request
     * @return void
     */
    public function list(Request $request)
    {
        return ($request->ajax()) ? $this->bannedInterface->datatable() : null;
    }
}
