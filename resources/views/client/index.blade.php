@extends('client.layouts.home')
@section('content')
    <div>
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-dvh">
                @foreach($banners as $banner)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/banners/'.$banner->image)}}"
                             class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="pb-10 xl:pb-20 px-4 md:px-6 xl:px-0 mt-10">
            <div class="mx-auto max-w-7xl">
                <div class="flex flex-wrap xl:flex-nowrap gap-6">
                    <div class="w-full">
                        <div class="divide-y divide-gray-700">
                            <div class="pb-16">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="rounded-full bg-red-500 w-4 h-4"></div>
                                        <h3 class="font-bold text-base xl:text-xl">Phim đang chiếu</h3>
                                    </div>
                                    <form class="max-w-md flex-1" action="{{route('client.home')}}" method="GET">
                                        <div class="flex">
                                            <label for="search-dropdown"
                                                   class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                                            <select
                                                name="category"
                                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:outline-none"
                                            >
                                                <option value="">Tất cả</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{$category->name}}" {{$category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="relative w-full">
                                                <input type="search" id="search-dropdown"
                                                       name="search"
                                                       value="{{$search ?? ''}}"
                                                       class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 "
                                                       placeholder="Search Movies..."
                                                />
                                                <button type="submit"
                                                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white  bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br rounded-e-lg focus:outline-none">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                    </svg>
                                                    <span class="sr-only">Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="mt-6 grid gap-7 grid-cols-1 xl:grid-cols-5">
                                    @if($movies->count() > 0)
                                        @foreach($movies as $movie)
                                            <div class="cursor-pointer shadow-lg">
                                                <div
                                                    class="relative w-full h-[290px] overflow-hidden rounded-xl shadow-lg">
                                                    <a href="{{route('client.schedule.detail', $movie->slug)}}">
                                                        <img
                                                            class="object-cover object-center rounded-xl hover:scale-110 transition duration-500 h-full"
                                                            src="{{ filter_var($movie->thumbnail, FILTER_VALIDATE_URL) ? $movie->thumbnail : asset('storage/movies/'.$movie->thumbnail)}}"
                                                            alt="{{$movie->title}}"
                                                        />
                                                    </a>
                                                </div>
                                                <div>
                                                    <div
                                                        class="flex flex-wrap items-center gap-x-5 text-[#5D6A81] text-sm mt-3">
                                                        {{ $movie->categories->implode('name', ', ') }}
                                                        <p>{{\App\Helpers\formatDate($movie->release_date)}}</p>
                                                    </div>
                                                    <p class="mt-2 text-sm xl:text-base font-bold">{{$movie->title}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center text-lg font-bold text-red-500">Không tìm thấy phim
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
