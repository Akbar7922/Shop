<?php

namespace App\Http\Controllers\Web\Backend;

use App\Services\TicketMessagesService;
use Validator;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Services\TicketService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    private $ticketService, $ticketMessagesService;
    public function __construct(TicketService $ticketService, TicketMessagesService $ticketMessagesService)
    {
        $this->ticketService = $ticketService;
        $this->ticketMessagesService = $ticketMessagesService;
    }

    public function index()
    {
        $tickets = $this->ticketService->all();
        return view('backend.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('backend.tickets.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'section' => 'required|integer',
            'receiver_id' => 'required|integer',
            'body' => 'required|string',
        ]);
        if ($validator->failed())
            return redirect()->back()->withErrors($validator->errors())->withInput();

        $ticketData = [
            'title' => $request->title, 'section' => $request->section, 'user_id' => Auth::id()
        ];
        $messageData = [
            'body' => $request->body, 'user_id' => Auth::id()
        ];

        // return $this->ticketService->createTicket($ticketData , $messageData);
        if ($this->ticketService->createTicket($ticketData, $messageData))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تیکت باموفقیت درج شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در درج تیکت ، مجددا تلاش کنید.']);
    }

    public function edit($id)
    {
        $ticket = $this->ticketService->find($id);
        return view('backend.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'section' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);
        if ($validator->failed())
            return redirect()->back()->withErrors($validator->errors())->withInput();

        $ticketData = [
            'title' => $request->title, 'section' => $request->section
        ];

        if ($this->ticketService->update($id, $ticketData))
            return redirect(route('ticket.index'))->with('status', ['status' => 200, 'message' => 'تیکت باموفقیت ویرایش شد.']);
        return redirect(route('ticket.index'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش تیکت ، مجددا تلاش کنید.']);
    }

    public function search(Request $request)
    {
        $tickets = $this->ticketService->search($request->word);
        return view('backend.tickets.partial', compact('tickets'));
    }

    public function close($tracking_code)
    {
        if ($this->ticketService->checkIsOpen($tracking_code)) {
            if ($this->ticketService->close($tracking_code))
                return response()->json(['status' => 200, 'message' => 'تیکت موردنظر باموفقیت بسته شد.']);
            return response()->json(['status' => 201, 'message' => 'خطا در بستن تیکت ، مجددا تلاش کنید.']);
        } else
            return response()->json(['status' => 202, 'message' => 'تیکت موردنظر باز نمیباشد.']);
    }

    public function messages($id)
    {
        $messages = $this->ticketMessagesService->messages($id);
        $ticket = $this->ticketService->find($id);
        $this->ticketMessagesService->markAsRead($id);
        return view('backend.tickets.ticket_messages', compact('messages', 'ticket'));
    }

    public function send(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string',
        ]);

        if ($validator->failed())
            return response()->json(['status' => 201, 'message' => $validator->errors()]);

        $data = [
            'ticket_id' => $id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ];

        if ($this->ticketMessagesService->create($data))
            return response()->json(['status' => 200, 'message' => 'تیکت باموفقیت ثبت شد .']);
        return response()->json(['status' => 201, 'message' => 'خطا در ثبت تیکت ، مجددا تلاش کنید.']);
    }
}
