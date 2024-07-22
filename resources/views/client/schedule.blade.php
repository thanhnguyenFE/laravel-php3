@extends('client.layouts.home')
@section('content'))
    <div class="mx-auto max-w-7xl pt-28">
        <div class="flex items-center gap-2 mb-4 justify-center">
            <div class="rounded-full bg-red-500 w-4 h-4"></div>
            <h3 class="font-bold text-xl">Phim đang chiếu</h3>
        </div>
        <div class="flex items-center justify-center gap-2 xl:gap-4 flex-wrap">
            @foreach($days as $day)
                <a href="{{route('client.schedule.date', ['date' => $day])}}"
                   class="btn inline-flex items-center justify-center text-sm font-medium ring-offset-background cursor-pointer
            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
            disabled:pointer-events-none disabled:opacity-50  {{$day == $date ? 'bg-red-700 text-accent-foreground hover:bg-red-600' : 'bg-transparent border border-input hover:bg-gray-700 hover:text-accent-foreground'}} h-9 rounded-md px-3">
                 {{$day}}
                </a>
            @endforeach
        </div>
        <div class="text-sm text-center mx-auto mt-4 text-orange-500 mb-10">
            Lưu ý: Khán giả dưới 13 tuổi chỉ chọn suất chiếu kết thúc trước 22h và Khán giả dưới 16 tuổi chỉ chọn suất chiếu kết thúc trước 23h.
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:gap-6">
            @foreach($movies as $movie)
                <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                    <div class="relative w-[200px] h-[290px] overflow-hidden shadow-lg">
                        <img src="{{filter_var($movie->thumbnail, FILTER_VALIDATE_URL) ? $movie->thumbnail : asset('storage/movies/'.$movie->thumbnail)}}" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                    </div>
                    <div class="p-4 xl:p-6 flex-1 relative">
                        <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                        <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                            <p>{{$movie->categories->map(function($category) { return $category->name; })->implode(', ')}}</p>
                            <p>{{$movie->duration}}</p>
                        </div>
                        <div class="mt-2 text-sm font-bold pr-10">{{$movie->title}}</div>
                        <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                        <div class="mt-1 text-sm hidden md:block">Khởi chiếu: {{\App\Helpers\formatDate($movie->release_date, 'd-m-Y')}}</div>
                        <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                        <div class="mt-3">
                            <p class="text-sm font-semibold">Lịch chiếu</p>
                            <div class="flex items-center gap-2 mt-2 flex-wrap">
                                @foreach($movie->schedules->sortBy('start_at') as $item)
                                    <a href="{{route('client.schedule.detail', ['slug' => $movie->slug,'id' => $item['id']])}}" class="btn inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                       {{$item['start_at']}}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
