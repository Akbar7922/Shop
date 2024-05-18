<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Services\DashboardService;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $number_reports = (Auth::user()->isAdmin()) ? $this->dashboardService->getAdminNumberReports() : $this->dashboardService->getShopNumberReports(Shop::whereManagerUserId(Auth::id())->pluck("id")->toArray());
        $notificationReports = $this->dashboardService->getNotificationReports();
        return view('backend.dashboard' , compact('number_reports' , 'notificationReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
