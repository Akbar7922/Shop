<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CooperationService;
use Illuminate\Http\Request;

class CooperationsController extends Controller
{
    private $cooperationService;
    public function __construct(CooperationService $cooperationService)
    {
        $this->cooperationService = $cooperationService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperations = $this->cooperationService->all();
        return view('backend.cooperations.index', compact('cooperations'));
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
     * @param  \Illuminate\Http\Request  $request
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
        $cooperation = $this->cooperationService->find($id);
        return view('backend.cooperations.show', compact('cooperation'));
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
     * @param  \Illuminate\Http\Request  $request
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
        if ($this->cooperationService->delete($id))
            return response()->json(['status' => 200, 'message' => 'درخواست باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف درخواست ، مجددا تلاش کنید.']);
    }

    public function search(Request $request)
    {
        $cooperations = $this->cooperationService->search($request->word);
        return view('backend.cooperations.partial', compact('cooperations'));
    }
}
