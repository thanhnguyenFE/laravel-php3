<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@if($errors->any())
    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5 z-50" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{$errors->first()}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
@if (session('success') || request()->query('success'))
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5 z-50" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{session('success') ?? request()->query('success')}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
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
                    <a class="hover:text-red-500 text-white" href="#">Giới thiệu</a>
                </nav>
               @if(auth()->user())
                   <div class="ml-auto flex items-center gap-4">
                       <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br text-white text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 cursor-pointer">{{auth()->user()->name}}</button>
                       <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 w-[150px] border border-red-400">
                           <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                               <li>
                                   <a href="{{route('client.profile')}}" class="block px-4 py-2 hover:bg-red-100">Trang cá nhân</a>
                               </li>
                               <li>
                                   <a href="#" class="block px-4 py-2 hover:bg-red-100">Settings</a>
                               </li>
                               <li>
                                   <a href="#" class="block px-4 py-2 hover:bg-red-100">Earnings</a>
                               </li>
                               <li>
                                   <a href="{{route('client.logout')}}" class="block px-4 py-2 hover:bg-red-100">Đăng xuất</a>
                               </li>
                           </ul>
                       </div>
                   </div>
                @else
                    <div class="ml-auto hidden xl:flex items-center gap-5">
                        <button class="inline-flex items-center justify-center rounded-full text-sm font-medium ring-offset-background
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                    disabled:opacity-50 border bg-transparent hover:bg-gray-700 hover:text-accent-foreground h-10 px-8 py-2 hover:scale-105
                    transition duration-300 border-white"
                                data-modal-target="modal-register" data-modal-toggle="modal-register" data-type-modal="register" id="button-show-modal-register">
                            Đăng kí
                        </button>
                        <button class="inline-flex items-center justify-center rounded-full text-sm font-medium ring-offset-background
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                     disabled:opacity-50 bg-danger text-destructive-foreground h-10 px-8 py-2 hover:scale-105 transition duration-300"
                                data-modal-target="modal-login" data-modal-toggle="modal-login" data-type-modal="login" id="button-show-modal-login">
                            Đăng nhập
                        </button>
                    </div>
               @endif
            </div>
        </div>
    </div>
    @yield('content')
    <div id="modal-login" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative border border-red-600 rounded-lg shadow" style="background-color: rgb(16 20 27)">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white ">
                            Đăng nhập
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-login">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('client.login')}}" id="form-login" method="POST">
                            @csrf
                            <div>
                                <label for="email-login" class="block mb-2 text-sm font-medium text-white dark:text-white">Email</label>
                                <input type="email" name="email" id="email-login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                            </div>
                            <div>
                                <label for="password-login" class="block mb-2 text-sm font-medium text-white dark:text-white">Password</label>
                                <input type="password" name="password" id="password-login" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                            </div>
                            <button type="submit" class="w-full text-white bg-red-500 hover:bg-danger focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <div id="modal-register" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative border border-red-600 rounded-lg shadow" style="background-color: rgb(16 20 27)">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white ">
                        Đăng kí
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-register">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{route('client.register')}}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Tên tài khoản</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Company" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white">Password</label>
                            <input type="text" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white">Enter the password</label>
                            <input type="text" name="enter_password" id="password" placeholder="Enter the password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <button type="submit" class="w-full text-white bg-red-500 hover:bg-danger focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register account</button>
                    </form>
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
@yield('script')
{{--<script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--        $('#button-show-modal-login').click(function (event) {--}}
{{--            let email = $('#email-login').val();--}}
{{--            let password = $('#password-login').val();--}}
{{--            $('#email').val(email);--}}
{{--            $('#password').val(password);--}}
{{--            $('#form-login').submit();--}}

{{--        // if(type === 'login'){--}}
{{--        //     $('#title-modal').value = 'Đăng nhập';--}}
{{--        // }else{--}}
{{--        //     $('#title-modal').value = 'Đăng ký';--}}
{{--        // }--}}
{{--    });--}}
{{--});--}}
{{--</script>--}}
</body>


</html>
