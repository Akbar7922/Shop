<?php
namespace App\Services;

use App\Models\Ticket;
use App\Models\TicketMessage;
use Auth;
use DB;
use Illuminate\Database\QueryException;

class TicketService{
    public function all(){
        return Ticket::paginate(12);
    }

    public function createTicket($ticketData , $messageData){
        try {
            DB::beginTransaction();

            $ticketData['tracking_code'] = $this->createTrackingCode();
            $ticket = Ticket::create($ticketData);
            $messageData['ticket_id'] = $ticket->id ;
            TicketMessage::create($messageData);

            DB::commit();
            return true;
        } catch (QueryException $th) {
            DB::rollBack();
            return false;
        }
    }

    public function create($data)
    {
        try {
            Ticket::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Ticket::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Ticket::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Ticket::findOrFail($id);
    }

    public function search($word){
        return Ticket::where('title' , 'like' , '%'.$word.'%')->paginate(12);
    }

    public function createTrackingCode(){
        $now = verta();
        return 'TKT-'.$now->year.$now->month.$now->day.'-'.$now->hour.$now->minute.$now->second;
    }

    public function checkIsOpen($tracking_code){
        return Ticket::whereTrackingCode($tracking_code)->whereStatus(0)->exists();
    }

    public function close($tracking_code){
        try {
            Ticket::where('tracking_code', $tracking_code)->update(['status' => 1]);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
}
