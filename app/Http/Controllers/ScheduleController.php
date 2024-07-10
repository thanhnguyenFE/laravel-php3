<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('movie', 'room')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = new Movie();
        $room = new Room();
        $movies = $movie->getMoviesActive();
        $rooms = $room->getRoomsActive();
        return view('admin.schedules.create', compact('movies', 'rooms'));
    }

    public function getAvailableRooms(Request $request)
    {
        return response()->json(['data' => 'hello']);
//        $schedule = new Schedule();
//        $room = new Room();
//        try {
//            $show_date = $request->get('show_date');
//            dd($show_date);
//            $occupied_rooms = $schedule->newQuery()->where('date', $show_date)->pluck('room_id');
//            $available_rooms = $room->newQuery()->whereNotIn('id', $occupied_rooms)->get();
//            return response()->json($available_rooms);
//        } catch (\Exception $e) {
//            return response()->json(['error' => $e->getMessage()], 500);
//        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'room_id' => 'required',
            'date' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        $schedule = new Schedule();
        $schedule->movie_id = $request->movie_id;
        $schedule->room_id = $request->room_id;
        $schedule->date = $request->date;
        $schedule->start_at = $request->start_at;
        if ($request->has('status')) {
            $schedule->status = $request->status;
        }
        $schedule->end_at = $request->end_at;
        $schedule->save();
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schedule::with('movie', 'room')->find($id);
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = new Movie();
        $room = new Room();
        $movies = $movie->getMoviesActive();
        $rooms = $room->getRoomsActive();
        $schedule = Schedule::with('movie', 'room')->find($id);
        return view('admin.schedules.update', compact('schedule', 'movies', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'movie_id' => 'required',
            'room_id' => 'required',
            'date' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        $schedule = Schedule::find($id);
        $schedule->movie_id = $request->movie_id;
        $schedule->room_id = $request->room_id;
        $schedule->date = $request->date;
        $schedule->start_at = $request->start_at;
        if ($request->has('status')) {
            $schedule->status = $request->status;
        }
        else{
            $schedule->status = 0;
        }
        $schedule->end_at = $request->end_at;
        $schedule->save();
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}
