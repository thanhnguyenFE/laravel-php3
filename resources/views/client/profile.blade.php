@extends('client.layouts.home')
@section('styles')
    <style>
        .profile-pic {
            color: transparent;
            transition: all .3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: max-content;
            margin: 0 auto;
        }
        .profile-pic input {
            display: none;
        }
        .profile-pic img{
            position: absolute;
            object-fit: cover;
            width: 200px;
            height: 200px;
            box-shadow: 0 0 0 5px #fff;
            border-radius: 50%;
            z-index: 0;
        }

        .profile-pic .-label {
            cursor: pointer;
            height: 200px;
            width: 200px;
        }

        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0,0,0,.8);
            z-index: 10000;
            color: rgb(250,250,250);
            transition: background-color .2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0;
        }

        .profile-pic span {
                display: inline-flex;
                padding: .2em;
                height: 2em;
        }
    </style>
@endsection
@section('content')
    <div class="text-white pb-10 xl:pb-20 px-4 xl:px-0 pt-10">
        <div class="mx-auto max-w-7xl">
            <h3 class="text-2xl font-bold mb-10 text-center text-white mt-20">Thông tin cá nhân</h3>
            <div class="mb-4">
                <ul class="flex items-center justify-center gap-4 flex-wrap"
                    id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:outline-none font-medium rounded-lg text-sm"
                    data-tabs-inactive-classes="text-sm font-medium rounded-full bg-transparent hover:bg-[#1f324f] border border-gray-200"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block px-5 py-2.5 text-center me-2 mb-2"
                                id="profile-styled-tab" data-tabs-target="#styled-profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Tài khoản của tôi</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block px-5 py-2.5 text-center me-2 mb-2"
                                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard"
                                type="button" role="tab" aria-controls="dashboard" aria-selected="false">Lịch sử mua vé</button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden p-4 " id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mt-10">
                        <form method="post" action="{{route('client.update-profile')}}" class="grid-cols-2 grid gap-10 mt-10" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <i class='bx bxs-camera text-[50px]'></i>
                                </label>
                                <input id="file" type="file" name="avatar" onchange="loadFile(event)"/>
                                <img src="{{auth()->user()->avatar ? asset('storage/avatars/'.auth()->user()->avatar) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBFIz1RbmXlp7G3mWuuDBjKCth7ZJJ_HjzCw&s'}}" id="output" width="200" />
                            </div>
                            <div>
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-white">Tên tài khoản</label>
                                    <input name="name" type="text" value="{{auth()->user()->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                </div>
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                                    <input name="email" type="email" value="{{auth()->user()->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                </div>
                                <div class="">
                                    <label for="email" class="block mb-2 text-sm font-medium text-white">Số điện thoại</label>
                                    <input name="phone" type="number" value="{{auth()->user()->phone}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                </div>
                                <div class="mt-6" id="change_password" style="display: none" >
                                    <div class="mb-6">
                                        <label for="password_old" class="block mb-2 text-sm font-medium text-white">Nhập mật khẩu cũ</label>
                                        <input name="password" type="password" id="password_old" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <div class="mb-6">
                                        <label for="password_new" class="block mb-2 text-sm font-medium text-white">Nhập mật khẩu mới</label>
                                        <input name="password_new" type="text" id="password_new" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                    <div class="mb-6">
                                        <label for="enter_password_new" class="block mb-2 text-sm font-medium text-white">Nhập lại mật khẩu mới</label>
                                        <input name="enter_password_new" type="text" id="enter_password_new" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 flex justify-end gap-4">
                                <button class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border
                            border-gray-200 hover:bg-gray-100 hover:text-red-400  focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button" id="button-change-password">
                                    Đổi mật khẩu
                                </button>
                                <a href="" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border
                            border-gray-200 hover:bg-gray-100 hover:text-red-400  focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700
                            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                    Hoàn tác
                                </a>
                                <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                            focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80
                            font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" type="submit">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden p-4" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="mt-4 ring-1 ring-gray-700 sm:mx-0 sm:rounded-xl">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Ngày giao dịch</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Tên phim</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Số ghế</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Phòng</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="font-medium text-white">

                                    </div>
                                </td>
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="font-medium text-white">

                                    </div>
                                </td>
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="font-medium text-white">

                                    </div>
                                </td>
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="font-medium text-white">

                                    </div>
                                </td>
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="font-medium text-white">

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var loadFile = function (event) {
                var image = document.getElementById("output");
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            $('#button-change-password').click(function () {
                 $('#change_password').slideToggle({
                     complete: function() {
                         if (!$(this).is(':visible')) {
                             $('#password_old, #password_new, #enter_password_new').val('');
                             $('#button-change-password').text('Đổi mật khẩu')
                         }else{
                             $('#button-change-password').text('Huỷ đổi mật khẩu')
                         }
                     }
                 });
            })
        });
    </script>
@endsection
