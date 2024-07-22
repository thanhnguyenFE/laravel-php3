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
    <style>
        /* Ẩn thanh cuộn trong các trình duyệt WebKit */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body style="background-color: rgb(16 20 27)">
<div class="text-white">
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
                            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" data-type-modal="register" id="button-show-modal">
                        Đăng kí
                    </button>
                    <button class="inline-flex items-center justify-center rounded-full text-sm font-medium ring-offset-background
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                     disabled:opacity-50 bg-danger text-destructive-foreground h-10 px-8 py-2 hover:scale-105 transition duration-300"
                            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" data-type-modal="login" id="button-show-modal">
                        Đăng nhập
                    </button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-black rounded-lg shadow min-w-[400px] p-4 border-red-700 border">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white" id="title-modal">
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5" id="content-modal">
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="bg-[#0B0D13] text-white mt-10">
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
<script src="{{asset('vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('vendor/js/bootstrap.js')}}"></script>
<script type="text/javascript">
    $('#title-modal').innerText= 'Đăng ký';
        $(document).ready(function() {
        $('#button-show-modal').click(function (event) {
            console.log(event)
        let type =event.target.dataset.typeModal;
            console.log($('#title-modal'))

        // if(type === 'login'){
        //     $('#title-modal').value = 'Đăng nhập';
        // }else{
        //     $('#title-modal').value = 'Đăng ký';
        // }
    });
});
</script>
</body>


</html>
