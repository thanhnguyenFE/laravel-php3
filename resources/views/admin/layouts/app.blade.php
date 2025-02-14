<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendor/libs/apex-charts/apex-charts.css')}}"/>

    <!-- Helpers -->
    <script src="{{asset('vendor/js/helpers.js')}}"></script>

    <!--Tailwind CSS -->
    @vite('resources/css/app.css')

    @yield('styles')
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('js/config.js')}}"></script>
</head>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @if(session('success'))
            <div
                class="bs-toast toast fade toast-placement-ex show bg-info position-fixed right-0 top-0 me-3 mt-3"
                role="alert"
                id="alertToast"
                aria-live="assertive"
                aria-atomic="true"
            >
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Alert</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @elseif($errors->any())
            <div id="toast-danger"
                 class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5 z-50"
                 role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{$errors->first()}}</div>
                <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                    width="25"
                    viewBox="0 0 25 42"
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                        id="path-1"
                    ></path>
                    <path
                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                        id="path-3"
                    ></path>
                    <path
                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                        id="path-4"
                    ></path>
                    <path
                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                        id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                            id="Triangle"
                            transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{request()->routeIs('admin.index') ? 'active' : ''}}">
                    <a href="{{route('admin.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('movies.index') ? 'active' : ''}}">
                    <a href="{{route('movies.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-movie"></i>
                        <div data-i18n="Movies">Movies</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('categories.index') ? 'active' : ''}}">
                    <a href="{{route('categories.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-category"></i>
                        <div data-i18n="Categories">Categories</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('rooms.index') ? 'active' : ''}}">
                    <a href="{{route('rooms.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-camera-home"></i>
                        <div data-i18n="Rooms">Rooms</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('schedules.index') ? 'active' : ''}}">
                    <a href="{{route('schedules.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-calendar"></i>
                        <div data-i18n="Schedules">Schedules</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('tickets.index') ? 'active' : ''}}">
                    <a href="{{route('tickets.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-blanket"></i>
                        <div data-i18n="Tickets">Tickets</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('banners.index') ? 'active' : ''}}">
                    <a href="{{route('banners.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-images"></i>
                        <div data-i18n="Banners">Banner Marketing</div>
                    </a>
                </li>

                <li class="menu-item {{request()->routeIs('roles.index') ? 'active' : ''}}">
                    <a href="{{route('roles.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-check-shield"></i>
                        <div data-i18n="Roles">Roles and Permissions</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('users.index') ? 'active' : ''}}">
                    <a href="{{route('users.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
            >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search..."
                                aria-label="Search..."
                            />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item lh-1 me-3">
                            <a
                                class="github-button"
                                href="https://github.com/themeselection/sneat-html-admin-template-free"
                                data-icon="octicon-star"
                                data-size="large"
                                data-show-count="true"
                                aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                            >Star</a
                            >
                        </li>

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{asset('storage/avatars/'.auth()->user()->avatar)}}" alt
                                         class="w-px-40 h-[40px] rounded-circle object-cover"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{asset('storage/avatars/'.auth()->user()->avatar)}}" alt
                                                         class="w-px-40 h-[40px] rounded-circle object-cover"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{auth()->user()->name}}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('main-content')
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    function convertNameToSlug(name) {
        // Define a map for Vietnamese characters to ASCII
        const vietnameseMap = {
            'á': 'a',
            'à': 'a',
            'ả': 'a',
            'ã': 'a',
            'ạ': 'a',
            'ă': 'a',
            'ắ': 'a',
            'ằ': 'a',
            'ẳ': 'a',
            'ẵ': 'a',
            'ặ': 'a',
            'â': 'a',
            'ấ': 'a',
            'ầ': 'a',
            'ẩ': 'a',
            'ẫ': 'a',
            'ậ': 'a',
            'đ': 'd',
            'é': 'e',
            'è': 'e',
            'ẻ': 'e',
            'ẽ': 'e',
            'ẹ': 'e',
            'ê': 'e',
            'ế': 'e',
            'ề': 'e',
            'ể': 'e',
            'ễ': 'e',
            'ệ': 'e',
            'í': 'i',
            'ì': 'i',
            'ỉ': 'i',
            'ĩ': 'i',
            'ị': 'i',
            'ó': 'o',
            'ò': 'o',
            'ỏ': 'o',
            'õ': 'o',
            'ọ': 'o',
            'ô': 'o',
            'ố': 'o',
            'ồ': 'o',
            'ổ': 'o',
            'ỗ': 'o',
            'ộ': 'o',
            'ơ': 'o',
            'ớ': 'o',
            'ờ': 'o',
            'ở': 'o',
            'ỡ': 'o',
            'ợ': 'o',
            'ú': 'u',
            'ù': 'u',
            'ủ': 'u',
            'ũ': 'u',
            'ụ': 'u',
            'ư': 'u',
            'ứ': 'u',
            'ừ': 'u',
            'ử': 'u',
            'ữ': 'u',
            'ự': 'u',
            'ý': 'y',
            'ỳ': 'y',
            'ỷ': 'y',
            'ỹ': 'y',
            'ỵ': 'y',
            'Á': 'A',
            'À': 'A',
            'Ả': 'A',
            'Ã': 'A',
            'Ạ': 'A',
            'Ă': 'A',
            'Ắ': 'A',
            'Ằ': 'A',
            'Ẳ': 'A',
            'Ẵ': 'A',
            'Ặ': 'A',
            'Â': 'A',
            'Ấ': 'A',
            'Ầ': 'A',
            'Ẩ': 'A',
            'Ẫ': 'A',
            'Ậ': 'A',
            'Đ': 'D',
            'É': 'E',
            'È': 'E',
            'Ẻ': 'E',
            'Ẽ': 'E',
            'Ẹ': 'E',
            'Ê': 'E',
            'Ế': 'E',
            'Ề': 'E',
            'Ể': 'E',
            'Ễ': 'E',
            'Ệ': 'E',
            'Í': 'I',
            'Ì': 'I',
            'Ỉ': 'I',
            'Ĩ': 'I',
            'Ị': 'I',
            'Ó': 'O',
            'Ò': 'O',
            'Ỏ': 'O',
            'Õ': 'O',
            'Ọ': 'O',
            'Ô': 'O',
            'Ố': 'O',
            'Ồ': 'O',
            'Ổ': 'O',
            'Ỗ': 'O',
            'Ộ': 'O',
            'Ơ': 'O',
            'Ớ': 'O',
            'Ờ': 'O',
            'Ở': 'O',
            'Ỡ': 'O',
            'Ợ': 'O',
            'Ú': 'U',
            'Ù': 'U',
            'Ủ': 'U',
            'Ũ': 'U',
            'Ụ': 'U',
            'Ư': 'U',
            'Ứ': 'U',
            'Ừ': 'U',
            'Ử': 'U',
            'Ữ': 'U',
            'Ự': 'U',
            'Ý': 'Y',
            'Ỳ': 'Y',
            'Ỷ': 'Y',
            'Ỹ': 'Y',
            'Ỵ': 'Y'
        };

        // Replace Vietnamese characters
        name = name.replace(/[^A-Za-z0-9\s]/g, function (x) {
            return vietnameseMap[x] || x;
        });

        // Convert to lowercase
        name = name.toLowerCase();

        // Replace spaces and non-alphanumeric characters with hyphens
        name = name.replace(/[^a-z0-9]+/g, '-');

        // Remove leading and trailing hyphens
        name = name.replace(/^-+|-+$/g, '');

        return name;
    }


    $(document).ready(function () {
        const nameInput = document.getElementById("basic-default-title");
        const slugInput = document.getElementById("basic-default-slug");
        nameInput.addEventListener("blur", function () {
            const slug = convertNameToSlug(nameInput.value);
            slugInput.value = slug;
        });
        document.addEventListener('DOMContentLoaded', function () {
            var successAlert = document.getElementById('alertToast');
            if (successAlert) {
                setTimeout(function () {
                    successAlert.style.display = 'none';
                }, 2000); // 2000 milliseconds = 2 seconds
            }
        });

        $("#search").keyup(function () {
            search_table($(this).val());
        });

        function search_table(value) {
            $("#admin_table tr").each(function () {
                var found = "false";
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = "true";
                    }
                });
                if (found == "true") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });

</script>

@yield('scripts')

</body>
</html>
