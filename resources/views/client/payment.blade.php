@extends('client.layouts.home')
@section('content')
    <div class="pb-10 md:pb-20 px-4 xl:px-0 text-white pt-36">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap xl:flex-nowrap gap-5">
                <div class="w-2/3">
                    <div class="p-4 md:p-6 space-y-6 bg-[#1A1D23] rounded-2xl text-sm md:text-base">
                        <h4 class="font-bold">Thông tin phim</h4>
                        <div>
                            <p>Phim</p>
                            <p class="font-semibold" id="payment-movie-info"></p>
                        </div>
                        <div class="flex items-center gap-10">
                            <div class="w-1/2">
                                <p>Ngày giờ chiếu</p>
                                <div class="flex items-center space-x-2">
                                    <span class="font-bold text-orange-500" id="payment-time-info"></span>
                                    <span>-</span>
                                    <span class="font-semibold" id="payment-date-info"></span>
                                </div>
                            </div>
                            <div>
                                <p>Ghế</p>
                                <p class="font-semibold" id="payment-seats-info"></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-10">
                            <div class="w-1/2">
                                <p>Định dạng</p>
                                <p class="font-semibold">2D</p>
                            </div>
                            <div>
                                <p>Phòng chiếu</p>
                                <p class="font-semibold" id="payment-screen-info"></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:p-6 space-y-6 bg-[#1A1D23] mt-5 rounded-2xl text-sm md:text-base">
                        <h4 class="font-bold">Thông tin thanh toán</h4>
                        <div>
                            <div class="mt-4 ring-1 ring-gray-700 sm:mx-0 rounded-xl">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Danh mục</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Số lượng</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="font-medium text-white" id="list-seats"></div>
                                        </td>
                                        <td class="px-3 py-3.5 text-sm">
                                            <p class="font-bold" id="info-quantity"></p>
                                        </td>
                                        <td class="px-3 py-3.5 text-sm">
                                            <p class="font-bold" id="info-price"></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 flex-1 text-sm md:text-base">
                    <div class="bg-[#1A1D23] h-full rounded-2xl p-4 md:p-6 space-y-5">
                        <h4 class="font-bold">Phương thức thanh toán</h4>
                        <div>
                            <ul class=" text-sm font-medium rounded-lg w-full">
                                <li class="w-full rounded-t-lg">
                                    <div class="flex items-center ps-3">
                                        <input id="vietQr" type="radio" value="viet-qr" name="payment_methods" class="w-4 h-4 text-red-400">
                                        <label for="vietQr" class="flex w-full items-center py-3 ms-2 text-sm font-medium text-white gap-2"><img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fvietqr.png&w=64&q=75"> VietQR</label>
                                    </div>
                                </li>
                                <li class="w-full rounded-t-lg">
                                    <div class="flex items-center ps-3">
                                        <input id="vnPay" type="radio" value="vn-pay" name="payment_methods" class="w-4 h-4 text-red-400">
                                        <label for="vnPay" class="flex w-full items-center py-3 ms-2 text-sm font-medium text-white gap-2"><img class="w-[50px]" src="https://chieuphimquocgia.com.vn/images/vnpay.svg"> VNPay</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="block-error" class="font-bold text-red-600"></div>
                        <div class="space-y-3">
                                <button class="w-full px-5 py-2.5 text-center me-2 mb-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:outline-none rounded-lg" id="button-submit-payment">
                                    Thanh toán
                                </button>
                            <a class="btn" href="{{route('client.schedule')}}">Quay lại</a>
                            <div class="text-sm text-center mx-auto mt-4 text-orange-500">
                                <b>Lưu ý:</b>
                                Không mua vé cho trẻ em dưới 13 tuổi đối với các suất chiếu phim kết thúc sau 22h00 và
                                không mua vé cho trẻ em dưới 16 tuổi đối với các suất chiếu phim kết thúc sau 23h00.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let scheduleId = localStorage.getItem('scheduleId');
            let seats = JSON.parse(localStorage.getItem('selectedSeats'));
            let price = localStorage.getItem('seatPrice');
            let paymentMethodInputs = document.querySelectorAll('input[name="payment_methods"]');
            let paymentMethod = '';
            paymentMethodInputs.forEach(method => {
                method.addEventListener('change', function () {
                    paymentMethod = method.value
                });
            });
            $.ajax({
                url: '/schedules/info',
                type: 'GET',
                data: { schedule_id: scheduleId },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#payment-movie-info').text(data.movie_name);
                    $('#payment-price-info, #info-price').text(price);
                    $('#payment-time-info').text(data.start_at);
                    $('#payment-date-info').text(data.date);
                    $('#payment-screen-info').text(data.room_name)
                    $('#payment-seats-info, #list-seats').text(seats.join(', '))
                    $('#info-quantity').text(seats.length)
                    $('#button-submit-payment').click(function() {
                        $.ajax({
                            url :'/payment',
                            type: 'POST',
                            data: { schedule_id: scheduleId, seats: seats, price: price, payment_method: paymentMethod },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){
                                if(data.code == 0) {
                                    window.location.href = data.url + '?success=' + encodeURIComponent(data.message)
                                }else{
                                    $('#block-error').text(data.message)
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        })
                    })
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        });

    </script>
@endsection
