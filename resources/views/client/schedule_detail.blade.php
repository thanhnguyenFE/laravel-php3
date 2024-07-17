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
    </style>
@endsection
@section('content')
    <div class="w-full h-[250px] md:h-[300px] xl:h-[473px] relative wrapper">
        <div class="absolute inset-0 w-full h-full">
            <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover w-full h-full">
        </div>
        <div class="absolute bg-primary inset-0 w-full h-full z-10"></div>
        <div class="hidden xl:block absolute w-full inset-0 m-auto z-20">
            <div class="w-full max-w-4xl m-auto h-[473px] py-7 pt-24 flex gap-10">
                <div class="relative h-[333px] min-w-[238px] shadow-lg ">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover w-full h-full">
                </div>
                <div class="text-sm flex flex-col">
                    <div class="flex items-center gap-2 mt-2 text-white">
                        <h3 class="font-bold text-2xl">NHÀ BÀ NỮ (Vé miễn phí- T16)</h3>
                        <div class="rounded-xl p-2 border border-white font-bold">2D</div>
                    </div>
                    <div class="flex items-center mt-2 gap-5 text-sm text-white">
                        <p>Tâm lý, tình cảm</p>
                        <p>Viet Nam</p>
                        <p>120 phút</p>
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
                    <p>T.11</p>
                    <p class="text-xl font-bold">14</p>
                    <p>Thứ 3</p>
                </div>
            </button>
        </div>
        <div class="text-sm text-center mx-4 md:px-6 lg:mx-auto mt-4 text-orange-500">
            <b>Lưu ý:</b>
            Khán giả dưới 13 tuổi chỉ chọn suất chiếu kết thúc trước 22h và Khán giả dưới 16 tuổi chỉ chọn suất chiếu kết thúc trước 23h.
        </div>
    </div>
    <div class="mx-auto w-full max-w-4xl py-6 space-y-6 relative">
        <div class="grid grid-cols-5 gap-2 xl:gap-4 px-4 xl:px-0">
            <button class="inline-flex items-center justify-center rounded-full text-sm font-medium border border-input hover:text-gray-300 hover-bg-orange h-10 px-8 py-2">
                <p class="font-bold text-sm">10:00</p>
            </button>
        </div>
    </div>
@endsection
