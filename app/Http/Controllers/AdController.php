<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use App\Interfaces\AdInterface;
use App\Models\Ads;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdController extends Controller
{
    use RedirectNotification;

    protected $adInterface;

    public function __construct(AdInterface $adInterface)
    {
        $this->adInterface = $adInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->adInterface->buildDatatableTable();
        $datatableScript = $this->adInterface->buildDatatableScript();
        return view('ads.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdsRequest $request)
    {
        $request->views = 0;
        $request->clicks = 0;
        $act = $this->adInterface->store($request);

        $updateCTALink = route('ads.redirect', $act->id) . '?redirect=' . $request->cta_link;
        $newMetadata = json_encode([[
            'text' => $request->cta_text,
            'url' => $updateCTALink,
        ]]);
        Ads::where('id', $act->id)->update(['metadata' => $newMetadata]);
        return $this->sendRedirectTo($act, 'Berhasil menambahkan iklan baru', 'Gagal menambahkan iklan baru', route('admin.ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $ads = $this->adInterface->get(['id' => $id]);
        $cta = json_decode($ads->metadata);
        return view('ads.show', compact('ads', 'cta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $ads = $this->adInterface->get(['id' => $id]);
        $cta = json_decode($ads->metadata);
        return view('ads.edit', compact('ads', 'cta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdsRequest $request, $id)
    {
        $act = $this->adInterface->update($request, ['id' => $id]);
        return $this->sendRedirectTo($act, 'Berhasil mengupdate iklan baru', 'Gagal mengupdate iklan baru', route('admin.ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $act = $this->adInterface->destroy(['id' => $id]);
        return $this->sendRedirectTo($act, 'Berhasil menghapus iklan baru', 'Gagal menghapus iklan baru', route('admin.ads.index'));
    }

    /**
     * list
     *
     * @param  mixed $request
     * @return void
     */
    public function list(Request $request)
    {
        return ($request->ajax()) ? $this->adInterface->datatable() : null;
    }

    public function redirect(Request $request, $id)
    {
        $redirect = $request->redirect;
        $ad = $this->adInterface->get(['id' => $id]);

        Ads::where('id', $id)->update([
            'clicks' => $ad->clicks + 1
        ]);

        return redirect($redirect);
    }
}
