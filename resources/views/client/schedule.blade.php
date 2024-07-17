@extends('client.layouts.home')
@section('content')
    <div class="mx-auto max-w-7xl pt-28">
        <div class="flex items-center gap-2 mb-4 justify-center">
            <div class="rounded-full bg-red-500 w-4 h-4"></div>
            <h3 class="font-bold text-xl">Phim đang chiếu</h3>
        </div>
        <div class="flex items-center justify-center gap-2 xl:gap-4 flex-wrap">
            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background transition-colors
            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
            disabled:pointer-events-none disabled:opacity-50 bg-danger text-destructive-foreground h-9 rounded-md px-3">
                11-11-2023
            </button>
            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2
            disabled:pointer-events-none disabled:opacity-50 border border-input bg-transparent hover:bg-gray-700 hover:text-accent-foreground h-9 rounded-md px-3">
                12-11-2023
            </button>
        </div>
        <div class="text-sm text-center mx-auto mt-4 text-orange-500 mb-10">
            Lưu ý: Khán giả dưới 13 tuổi chỉ chọn suất chiếu kết thúc trước 22h và Khán giả dưới 16 tuổi chỉ chọn suất chiếu kết thúc trước 23h.
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:gap-6">
            <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                <div class="relative min-w-[150px] xl:min-w-[200px] min-h-[200px] xl:max-h-[290px] overflow-hidden shadow-lg">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                </div>
                <div class="p-4 xl:p-6 flex-1 relative">
                    <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                    <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                        <p>Tâm kí tình cảm</p>
                        <p>160 phút</p>
                    </div>
                    <div class="mt-2 text-sm font-bold pr-10">EM VÀ TRỊNH (Vé miễn phí- T13)</div>
                    <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                    <div class="mt-1 text-sm hidden md:block">Khởi chiếu: 13/11/2023</div>
                    <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold">Lịch chiếu</p>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                18:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                <div class="relative min-w-[150px] xl:min-w-[200px] min-h-[200px] xl:max-h-[290px] overflow-hidden shadow-lg">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                </div>
                <div class="p-4 xl:p-6 flex-1 relative">
                    <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                    <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                        <p>Tâm kí tình cảm</p>
                        <p>160 phút</p>
                    </div>
                    <div class="mt-2 text-sm font-bold pr-10">EM VÀ TRỊNH (Vé miễn phí- T13)</div>
                    <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                    <div class="mt-1 text-sm hidden md:block">Khởi chiếu: 13/11/2023</div>
                    <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold">Lịch chiếu</p>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                18:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                <div class="relative min-w-[150px] xl:min-w-[200px] min-h-[200px] xl:max-h-[290px] overflow-hidden shadow-lg">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                </div>
                <div class="p-4 xl:p-6 flex-1 relative">
                    <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                    <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                        <p>Tâm kí tình cảm</p>
                        <p>160 phút</p>
                    </div>
                    <div class="mt-2 text-sm font-bold pr-10">EM VÀ TRỊNH (Vé miễn phí- T13)</div>
                    <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                    <div class="mt-1 text-sm hidden md:block">Khởi chiếu: 13/11/2023</div>
                    <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold">Lịch chiếu</p>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                18:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                <div class="relative min-w-[150px] xl:min-w-[200px] min-h-[200px] xl:max-h-[290px] overflow-hidden shadow-lg">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                </div>
                <div class="p-4 xl:p-6 flex-1 relative">
                    <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                    <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                        <p>Tâm kí tình cảm</p>
                        <p>160 phút</p>
                    </div>
                    <div class="mt-2 text-sm font-bold pr-10">EM VÀ TRỊNH (Vé miễn phí- T13)</div>
                    <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                    <div class="mt-1 text-sm hidden md:block">Khởi chiếu: 13/11/2023</div>
                    <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold">Lịch chiếu</p>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                18:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cursor-pointer rounded-xl w-full border-gray-700 border flex flex-row overflow-hidden">
                <div class="relative min-w-[150px] xl:min-w-[200px] min-h-[200px] xl:max-h-[290px] overflow-hidden shadow-lg">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=https%3A%2F%2Fapi.chieuphimquocgia.com.vn%2FContent%2FImages%2F0017673_0.jpg&w=256&q=75" alt="" class="object-cover object-center rounded-l-xl hover:scale-110 transition duration-500 w-full h-full">
                </div>
                <div class="p-4 xl:p-6 flex-1 relative">
                    <div class="text-gray-300 absolute top-2 right-2 border border-gray-600 rounded-md px-2 py-1 font-semibold">2D</div>
                    <div class="flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm pr-12 hidden md:flex">
                        <p>Tâm kí tình cảm</p>
                        <p>160 phút</p>
                    </div>
                    <div class="mt-2 text-sm font-bold pr-10">EM VÀ TRỊNH (Vé miễn phí- T13)</div>
                    <div class="mt-1 text-sm">Xuất sứ: Việt Nam</div>
                    <div class="mt-1 text-sm hidden md:block">Khởi chiếu: 13/11/2023</div>
                    <div class="line-clamp-2 mt-1 text-xs md:text-sm text-red-500">T13: Phim được phổ biến đến khán giả từ đủ 13 tuổi trở lên;</div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold">Lịch chiếu</p>
                        <div class="flex items-center gap-2 mt-2 flex-wrap">
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background
                            transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50
                             border bg-transparent hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 border-white btn-movie">
                                18:00
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
