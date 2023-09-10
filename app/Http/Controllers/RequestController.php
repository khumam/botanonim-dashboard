<?php

namespace App\Http\Controllers;

use App\Interfaces\RequestInterface;
use App\Models\Request;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request as RequestHandler;

class RequestController extends Controller
{
    use RedirectNotification;

    protected $requestInterface;

    /**
     * __construct
     *
     * @param  RequestInterface $requestInterface
     * @return void
     */
    public function __construct(RequestInterface $requestInterface)
    {
        $this->requestInterface = $requestInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->requestInterface->buildDatatableTable();
        $datatableScript = $this->requestInterface->buildDatatableScript();
        return view('request.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): View
    {
        return view('request.show', compact('request'));
    }

    /**
     * list
     *
     * @param  mixed $request
     * @return void
     */
    public function list(RequestHandler $request)
    {
        return ($request->ajax()) ? $this->requestInterface->datatable() : null;
    }

    public function approve($userId)
    {
        $act = $this->requestInterface->approve($userId);
        return $this->sendRedirectTo($act, 'Berhasil approve user baru', 'Gagal approve user baru');
    }

    public function destroy($id)
    {
        $act = $this->requestInterface->destroy(['id' => $id]);
        return $this->sendRedirectTo($act, 'Berhasil menghapus request', 'Gagal menghapus request');
    }
}
