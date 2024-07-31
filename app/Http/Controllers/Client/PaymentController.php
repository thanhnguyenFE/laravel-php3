<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    public function index()
    {
        return view('client.payment');
    }
    public function infoSchedule(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $movie_name = $schedule->movie->title;
        $room_name = $schedule->room->name;
        $start_at = $schedule->start_at;
        $date = $schedule->date;
        return response()->json(['movie_name' => $movie_name, 'room_name' => $room_name, 'start_at' => $start_at, 'date' => $date]);
    }

    public function pay(Request $request)
    {
        $schedule_id = $request->schedule_id;
        $seats = $request->seats;
        $price = $request->price;
        $payment_method = $request->payment_method;
        if(auth()->user()){
            if($payment_method){
                $ticket = new \App\Models\Ticket();
                $ticket->user_id = auth()->user()->id;
                $ticket->schedule_id = $schedule_id;
                $ticket->total_price = $price;
                $ticket->payment_method = $payment_method;
                $ticket->seats = json_encode($seats);
                $ticket->date = Carbon::now();
                $ticket->save();
                return response()->json(['code'=>0, 'message'=>'Thanh toàn thành công', 'url'=>'/profile']);
            }else{
                return response()->json(['code'=>1, 'message'=>'Vui lòng chọn phương thức thanh toán!']);
            }
        }else{
            return response()->json(['code'=>1, 'message'=>'Vui lòng đăng nhập để được đặt vé']);
        }

    }
}
