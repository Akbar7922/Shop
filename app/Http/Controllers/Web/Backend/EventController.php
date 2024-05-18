<?php

namespace App\Http\Controllers\Web\Backend;

use Validator;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use App\Services\EventsService;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    private $eventService;

    public function __construct(EventsService $eventsService)
    {
        $this->eventService = $eventsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventService->all();
        return view('backend.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'type' => 'required|integer',
            'event_date' => 'nullable|date',
            'body' => 'required|string',
            'file' => 'required|file'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        if ($request->has('file')) {
            $image = $request->file('file');
            $image_path = ($request->type == 0) ? public_path('/image/events/') : public_path('/image/news/');
            $imageName = ($request->type == 0) ? 'event_' . time() . '.png' : 'news_' . time() . '.png';
            $image->move($image_path, $imageName);
            $request->request->add(['pic' => $imageName]);
        }

        if ($request->event_date)
            $request->merge(['event_date' => Verta::parse($request->event_date)->toCarbon()]);

        if ($this->eventService->create($request->all()))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'رکورد باموفقیت درج شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در درج رکورد ، مجددا تلاش کنید.']);
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
        $event = $this->eventService->find($id);
        return view('backend.events.edit' , compact('event'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'type' => 'required|integer',
            'event_date' => 'nullable|date',
            'body' => 'required|string',
            'file' => 'nullable|file'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        if ($request->has('file')) {
            $event = $this->eventService->find($id);
            $image = $request->file('file');
            $image_path = ($request->type == 0) ? public_path('/image/events/') : public_path('/image/news/');
            $imageName = ($request->type == 0) ? 'event_' . time() . '.png' : 'news_' . time() . '.png';
            if(file_exists($event->getPicPublicPath()))
                unlink($event->getPicPublicPath());
            $image->move($image_path, $imageName);
            $request->request->add(['pic' => $imageName]);
        }

        if ($request->event_date)
            $request->merge(['event_date' => Verta::parse($request->event_date)->toCarbon()]);

        if ($this->eventService->update($id , $request->except(['_token' , 'file' , '_method'])))
            return redirect(route('event.index'))->with('status', ['status' => 200, 'message' => 'رکورد باموفقیت ویرایش شد.']);
        return redirect(route('event.index'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش رکورد ، مجددا تلاش کنید.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->eventService->delete($id))
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید.']);
    }

    public function search(Request $request){
        $events = $this->eventService->search($request->word);
        return view('backend.events.partial' , compact('events'));
    }
}
