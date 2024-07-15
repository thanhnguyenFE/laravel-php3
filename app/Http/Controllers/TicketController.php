<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = \App\Models\Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        $schedules = \App\Models\Schedule::all();
        return view('admin.tickets.create', compact('users', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'user_id' => 'required|exists:users,id',
           'schedule_id' => 'required|exists:schedules,id',
           'total_price' => 'required|integer|min:0',
           'date' => 'required|date',
           'seat_ids' => 'required|array',
           'seat_ids.*' => 'string|max:255',
           'payment_method' => 'required|string|max:255',
       ]);
        $seatIds = $request->input('seat_ids');
       $ticket = new \App\Models\Ticket();
       $ticket->user_id = $request->user_id;
       $ticket->schedule_id = $request->schedule_id;
       $ticket->total_price = $request->total_price;
       $ticket->date = $request->date;
       $ticket->payment_method = $request->payment_method;
        $ticket->seats = json_encode($seatIds);
        if($request->has('status')) {
            $ticket->status = $request->status;
        }
       $ticket->save();
       return redirect()->route('tickets.index');

    }

    /**
     * Display the specified resource.
     */
    public function showDetailTicket(Request $request){
        $ticket_id = $request->input('ticket_id');
        $ticket = \App\Models\Ticket::find($ticket_id);
        $user = $ticket->user;
        $schedule = $ticket->schedule;
        $ticket->schedule->movie = $schedule->movie;
        $ticket->schedule->room = $schedule->room;
        $ticket->user = $user;
        $ticket->makeHidden('user_id', 'schedule_id');
        return response()->json($ticket);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = \App\Models\Ticket::find($id);
        $ticket->delete();
    }
}
