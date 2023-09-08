<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBotRequest;
use App\Http\Requests\UpdateUserBotRequest;
use App\Interfaces\UserBotInterface;
use App\Models\UserBot;
use App\Traits\RedirectNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserBotController extends Controller
{
    use RedirectNotification;

    protected $userBotInterface;

    public function __construct(UserBotInterface $userBotInterface)
    {
        $this->userBotInterface = $userBotInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $datatable = $this->userBotInterface->buildDatatableTable();
        $datatableScript = $this->userBotInterface->buildDatatableScript();
        return view('userbot.index', compact('datatable', 'datatableScript'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBot  $userBot
     * @return \Illuminate\Http\Response
     */
    public function show(UserBot $userBot): View
    {
        return view('userbot.show', compact('userBot'));
    }

    public function list(Request $request)
    {
        return ($request->ajax()) ? $this->userBotInterface->datatable() : null;
    }

}
