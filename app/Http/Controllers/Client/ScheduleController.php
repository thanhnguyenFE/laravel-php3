<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;
use function App\Helpers\formatDate;

class ScheduleController extends Controller
{

    public function list($date = null)
    {
        $schedule = new Schedule();
        $days = $schedule->getDateSchedule();
        if($date){
            $distinctMovieIds = $schedule->getScheduleByDate($date);
        }
       else{
           $distinctMovieIds = $schedule->getScheduleByDate($days[0]);
           $date = $days[0];
       }
        $movies = Movie::whereIn('id', $distinctMovieIds)->with(['schedules' => function ($query) use ($date) {
            if ($date) {
                $query->where('date', formatDate($date, 'Y-m-d'));
            }
        }])->get();
        return view('client.schedule', compact('days', 'movies', 'date'));
    }

    public function show($slug, $id=null)
    {
        $movie = Movie::where('slug', $slug)->first();
        if($id){
            $schedule = Schedule::where('id', $id)->first();
            $bookedSeats = Ticket::where('schedule_id', $id)->pluck('seats')->toArray();
            $bookedSeats = array_reduce($bookedSeats, function ($carry, $item) {
                return array_merge($carry, json_decode($item, true));
            }, []);
        }
        else{
            $schedule = null;
            $bookedSeats = [];
        }
        return view('client.schedule_detail', compact('schedule', 'movie', 'id', 'bookedSeats'));

    }
}
