@extends('client.layouts.home')
@section('styles')
    <style>
        .wrapper:after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
            background: linear-gradient(0deg, #10141b, rgba(16, 20, 27, 0));
        }
        .bg-primary{
            background-color: rgba(16, 20, 27, 0.6);
        }
        .seat{
            cursor: pointer;
            width: 40px;
            height: 40px;
            border: none;
            outline: none;
        }
        .seat:checked{
            background: #ff3e1d;
        }
    </style>
@endsection
@section('content')
    <div class="w-full h-[250px] md:h-[300px] xl:h-[473px] relative wrapper">
        <div class="absolute inset-0 w-full h-full">
            <img src="{{filter_var($movie->thumbnail, FILTER_VALIDATE_URL) ? $movie->thumbnail : asset('storage/movies/'.$movie->thumbnail)}}" alt="" class="object-cover w-full h-full">
        </div>
        <div class="absolute bg-primary inset-0 w-full h-full z-10"></div>
        <div class="hidden xl:block absolute w-full inset-0 m-auto z-20">
            <div class="w-full max-w-4xl m-auto h-[473px] py-7 pt-24 flex gap-10">
                <div class="relative h-[333px] min-w-[238px] shadow-lg ">
                    <img src="{{filter_var($movie->thumbnail, FILTER_VALIDATE_URL) ? $movie->thumbnail : asset('storage/movies/'.$movie->thumbnail)}}" alt="" class="object-cover rounded-xl w-full h-full">
                </div>
                <div class="text-sm flex flex-col">
                    <div class="flex items-center gap-2 mt-2 text-white">
                        <h3 class="font-bold text-2xl">{{$movie->title}}</h3>
                        <div class="rounded-xl p-2 border border-white font-bold">2D</div>
                    </div>
                    <div class="flex items-center mt-2 gap-5 text-sm text-white">
                        <p>{{$movie->categories->map(function($category) { return $category->name; })->implode(', ')}}</p>
                        <p>Viet Nam</p>
                        <p>{{$movie->duration}}</p>
                    </div>
                    <p class="text-white">Đạo diễn: Trấn Thành</p>
                    <p class="text-white">Diễn viên: Trấn Thành, Lê Giang, NSND Ngọc Giàu, Uyển Ân, Khả Như, NSND Việt Anh, NSUT Công Ninh, Ngân Quỳnh, Song Luân, Lê Dương Bảo Lâm, Lý Hạo Mạnh Quỳnh, Phương Lan, Hoàng Mèo,.</p>
                    <p class="mt-5 line-clamp-4 text-white">Phim xoay quanh gia đình của bà Nữ (nghệ sĩ Lê Giang đảm nhận) - người làm nghề bán bánh canh. Truyện phim khắc họa mối quan hệ phức tạp, đa chiều xảy ra với các thành viên trong gia đình. Câu tagline (thông điệp) chính "Mỗi gia đình đều có những bí mật" chứa nhiều ẩn ý về nội dung bộ phim muốn gửi gắm.</p>
                    <div class="text-red-500 mt-5 ">Khuyến cáo: T16: Phim được phổ biến đến khán giả từ đủ 16 tuổi trở lên;</div>
                    <div class="mt-2 flex items-center gap-4 flex-1">
                        <button type="button" class="text-sm underline text-white">Chi tiết nội dung</button>
                        <button class="border border-yellow-500 rounded-full py-2 px-10 text-yellow-500 hover:scale-105" type="button">Xem trailer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="flex h-[91px] justify-center bg-[#1A1D23]">
            <button class="focus:border-none focus:outline-none">
                <div class="w-[72px] h-full flex flex-col items-center justify-center text-xs transition-colors bg-red-600">
                    <p>T.{{\App\Helpers\getDate($schedule->date, 'month')}}</p>
                    <p class="text-xl font-bold">{{\App\Helpers\getDate($schedule->date, 'day')}}</p>
                    <p>{{\App\Helpers\getDate($schedule->date, 'rank')}}</p>
                </div>
            </button>
        </div>
        <div class="text-sm text-center mx-4 md:px-6 lg:mx-auto mt-4 text-orange-500">
            <b>Lưu ý:</b>
            Khán giả dưới 13 tuổi chỉ chọn suất chiếu kết thúc trước 22h và Khán giả dưới 16 tuổi chỉ chọn suất chiếu kết thúc trước 23h.
        </div>
    </div>

        @if(!$id)
            <div class="mx-auto w-full max-w-4xl py-6 space-y-6 relative">
                <div class="grid grid-cols-5 gap-2 xl:gap-4 px-4 xl:px-0">
                    <button class="inline-flex items-center justify-center rounded-full text-sm font-medium border border-input hover:text-gray-300 hover-bg-orange h-10 px-8 py-2">
                        <p class="font-bold text-sm">10:00</p>
                    </button>
                </div>
            </div>
        @else
            <div class="mx-auto max-w-7xl">
                <div class="pb-10 pt-5 w-full xl:w-3/4 mx-auto px-4 xl:px-0">
                    <div class="flex items-center justify-between mb-5">
                        <div class="text-sm md:text-base self-end">Giờ chiếu:
                            <span class="font-bold">19:50</span>
                        </div>
                        <div class="rounded-xl border border-red-500 p-2 text-sm md:text-base hidden xl:block">Thời gian chọn ghế:
                            <span class="font-semibold">6:00</span>
                        </div>
                    </div>
                    <div class="relative h-[100px]">
                        <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fscreen.png&w=1920&q=75">
                    </div>
                    <div>
                        <div class="mb-4 text-center font-bold text-lg">Phòng chiếu số 5</div>
                        <div class="space-y-1 -mx-4">
                            @php
                                $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
                                $length = count($rows);
                             @endphp
                            @for($i=0; $i<$length; $i++)
                                <div class="grid md:flex gap-1 items-center justify-center ">
                                    @for($j=1; $j<=13; $j++)
                                        @php
                                            $seatId = $rows[$i].$j;
                                            $isBooked = in_array($seatId, $bookedSeats);
                                         @endphp
                                        <div class="relative">
                                            <input type="checkbox" id="seat-{{$rows[$i].$j}}" class="text-white seat rounded-[2px] sm:rounded-sm xl:rounded-[8px] flex items-center justify-center md:h-6 lg:h-10 bg-gray-700" value="{{$rows[$i].$j}}" {{$isBooked ? 'disabled' : ''}}/>
                                            @if($isBooked)
                                                <i class='bx bx-x text-3xl absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'></i>
                                            @else
                                                <label for="seat-{{$rows[$i].$j}}" class="cursor-pointer absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">{{$rows[$i].$j}}</label>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4 xl:gap-8 mt-8 flex-wrap text-sm md:text-base">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col items-center">
                                <div class="aspect-square rounded-[2px] sm:rounded-sm xl:rounded-[8px] flex items-center justify-center md:h-6 lg:h-10 bg-gray-700"></div>
                                <p>Ghế chưa được đặt</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="aspect-square rounded-[2px] sm:rounded-sm xl:rounded-[8px] flex items-center justify-center md:h-6 lg:h-10 bg-[#ff3e1d] "></div>
                                <p>Ghế đang chọn</p>
                            </div>

                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full mt-8 flex-wrap gap-y-4">
                        <div>
                            <p>Ghế đã chọn: <span id="selected-seats" class="font-semibold"></span></p>
                            <p>Tổng tiền: <span id="total-price" class="font-semibold"></span></p>
                        </div>
                        <div class="flex items-center justify-center gap-2 w-full xl:w-auto">
                            <a class="inline-flex items-center justify-center rounded-full text-sm font-medium  transition-colors  border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-10 px-8 py-2" href="{{url()->previous()}}">Quay lại</a>
                            <button id="pay-button" class="inline-flex items-center justify-center rounded-full text-sm font-medium bg-danger text-destructive-foreground h-10 px-8 py-2 hover:scale-105 transition duration-300 disabled:opacity-50" disabled>Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seats = document.querySelectorAll('.seat');
        const selectedSeatsSpan = document.getElementById('selected-seats');
        const totalPriceSpan = document.getElementById('total-price');
        const payButton = document.getElementById('pay-button');
        const scheduleId = <?php echo $schedule->id; ?>;
        let selectedSeats = [];
        let seatPrice = 100000;

        seats.forEach(seat => {
            seat.addEventListener('change', function () {
                const seatValue = this.value;

                if (this.checked) {
                    selectedSeats.push(seatValue);
                } else {
                    selectedSeats = selectedSeats.filter(seat => seat !== seatValue);
                }

                updateSeatSelection();
            });
        });

        function updateSeatSelection() {
            selectedSeatsSpan.textContent = selectedSeats.join(', ');
            totalPriceSpan.textContent = (selectedSeats.length * seatPrice).toLocaleString('vi-VN') + ' VND';

            if (selectedSeats.length > 0) {
                payButton.disabled = false;
            } else {
                payButton.disabled = true;
            }
        }
        $('#pay-button').click(function () {
            localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
            localStorage.setItem('seatPrice', totalPriceSpan.textContent);
            localStorage.setItem('scheduleId', scheduleId);
            window.location.href = '/payment';
        })
    });

</script>
@endsection
