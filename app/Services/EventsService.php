<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\QueryException;

class EventsService
{
    public function all()
    {
        return Event::paginate(12);
    }
    public function create($data)
    {
        try {
            Event::create($data);
            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }
    public function update($id, $data)
    {
        try {
            Event::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            Event::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id)
    {
        return Event::findOrFail($id);
    }

    public function search($word)
    {
        return Event::orWhere('title', 'like', '%' . $word . '%')
            ->orWhere('body', 'like', '%' . $word . '%')
            ->paginate(12);
    }
}
