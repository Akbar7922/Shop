<?php

namespace App\Services;

use App\Models\TicketMessage;
use Illuminate\Database\QueryException;

class TicketMessagesService
{
    public function all()
    {
        return TicketMessage::paginate(12);
    }
    public function create($data)
    {
        try {
            TicketMessage::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            TicketMessage::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            TicketMessage::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id)
    {
        return TicketMessage::findOrFail($id);
    }

    public function search($word)
    {
        return TicketMessage::where('body', 'like', '%' . $word . '%')->paginate(12);
    }

    public function messages($id)
    {
        return TicketMessage::whereTicketId($id)
            ->latest('created_at')
            ->get();
    }

    public function markAsRead($ticket_id)
    {
        // try {
        TicketMessage::whereTicketId($ticket_id)->update(['status' => 1]);
        // } catch (QueryException $th) {
        //     //throw $th;
        // }
    }
}
