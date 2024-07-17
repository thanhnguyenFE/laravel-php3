<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('styles')
</head>
<body style="background-color: rgb(16 20 27)">
<div class="text-white ">
    <div class="fixed z-40 w-full text-white transition duration-500 navbar" style="backdrop-filter: blur(40px); background-color: rgba(16,20,27,.3)">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 xl:px-0 flex items-center h-16 xl:h-20 gap-2">
                <a href="#" class="relative w-[60px] xl:w-[70px] h-[40px] xl:h-[50px]">
                    <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Flogo.png&w=96&q=75" alt="" class="w-full h-full">
                </a>
                <nav class="ml-12 hidden xl:flex items-center gap-10 z-30">
                    <a class="hover:text-red-500 text-red-500" href="{{route('client.home')}}">Trang chủ</a>
                    <a class="hover:text-red-500 text-white" href="{{route('client.schedule')}}">Lịch chiếu</a>
                    <a class="hover:text-red-500 text-white" href="#">Tin tức</a>
                    <a class="hover:text-red-500 text-white" href="#">Khuyến mãi </a>
                    <a class="hover:text-red-500 text-white" href="#">Giá vé</a>
                    <a class="hover:text-red-500 text-white" href="#">Liên hoan phim</a>
                    <a class="hover:text-red-500 text-white" href="#">Giở thiệu</a>
                </nav>
                <div class="ml-auto hidden xl:flex items-center gap-5">
                    <button class="inline-flex items-center justify-center rounded-full text-sm font-medium ring-offset-background
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                    disabled:opacity-50 border bg-transparent hover:bg-gray-700 hover:text-accent-foreground h-10 px-8 py-2 hover:scale-105
                    transition duration-300 border-white"
                            data-bs-toggle="modal" data-bs-target="#showModal">
                        Đăng kí
                    </button>
                    <button class="inline-flex items-center justify-center rounded-full text-sm font-medium ring-offset-background
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                     disabled:opacity-50 bg-danger text-destructive-foreground h-10 px-8 py-2 hover:scale-105 transition duration-300"
                            data-bs-toggle="modal" data-bs-target="#showModal">
                        Đăng nhập
                    </button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletes</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor/js/bootstrap.js')}}"></script>
</body>

<footer class="bg-[#0B0D13] text-white">
    <div class="mx-auto p-8">
        <ul class="flex items-center justify-center flex-wrap gap-4 sm:gap-10 mb-6 sm:mb-10 text-sm md:text-base">
            <li>Chính sách</li>
            <li>Lịch chiếu</li>
            <li>Tin tức</li>
            <li>Hỏi đáp</li>
            <li>Giá vê</li>
            <li>Liên hệ</li>
        </ul>
        <div class="mb-6 flex flex-wrap items-center justify-center gap-4 sm:gap-10">
           <div class="flex items-center gap-6">
               <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Ffacebook.png&w=32&q=75" class="w-[30px] h-[30px]" >
               <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fzalo.webp&w=32&q=75" class="w-[30px] h-[30px]" >
               <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fyoutube2.png&w=32&q=75" class="w-[30px] h-[30px]" >
           </div>
            <div class="flex gap-5 items-center">
                <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fgoogleplay.png&w=256&q=75" class="w-[140px] h-[38px]" >
                <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fappstore.png&w=256&q=75" class="w-[140px] h-[38px]" >
                <img src="https://chieuphimquocgia.com.vn/_next/image?url=%2Fimages%2Fcertification.png&w=256&q=75" class="w-[140px] h-[38px]" >
            </div>
        </div>
        <div class="text-center space-y-2 text-xs md:text-base mb-6">
            <p>Cơ quan chủ quản: BỘ VĂN HÓA, THỂ THAO VÀ DU LỊCH</p>
            <p>Bản quyền thuộc Trung tâm Chiếu phim Quốc gia.</p>
            <p>Giấy phép số: 224/GP- TTĐT ngày 31/8/2010 - Chịu trách nhiệm: Vũ Đức Tùng – Giám đốc.</p>
            <p>Địa chỉ: 87 Láng Hạ, Quận Ba Đình, Tp. Hà Nội - Điện thoại: 024.35141791</p>
        </div>
    </div>
</footer>
</html>
