<?php

namespace App\Http\Livewire;

use App\Models\TicketMessage;
use Auth;
use Illuminate\Database\QueryException;
use Livewire\Component;

class TicketChatroom extends Component
{
    public $messages, $new_message, $newRecord, $ticket_id, $st;
    public function createMessage()
    {
        try {
            $this->newRecord = new TicketMessage();
            $this->newRecord->ticket_id = $this->ticket_id;
            $this->newRecord->user_id = Auth::id();
            $this->newRecord->body = $this->new_message;
            $this->newRecord->save();
            $this->new_message = '';
            $this->messages = TicketMessage::whereTicketId($this->ticket_id)->get();
            $this->st = 1;
        } catch (QueryException $e) {
            $this->st = -1;
        }
    }
    public function mount($id)
    {
        $this->ticket_id = $id;
        $this->messages = TicketMessage::whereTicketId($id)->get();
    }

    public function render()
    {
        return view('livewire.ticket-chatroom');
    }
}
