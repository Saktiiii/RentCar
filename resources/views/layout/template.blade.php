
<!DOCTYPE html>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/assets/Compiled/dist/css/app.css" />
        @livewireStyles
        
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('/assets/Compiled/dist/images/logo.svg')}}">
                    <span class="text-white text-lg ml-3"> Rent Car </span> 
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> @yield('title')</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->

               
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{ asset('/assets/Compiled/dist/images/profile-9.jpg')}}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ auth()->user()->name}}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ auth()->user()->role}}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="{{ route('login.logout') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <div class="wrapper">
            <div class="wrapper-box">
                <!-- BEGIN: Side Menu -->
                <nav class="side-nav">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="side-menu {{ request()->routeIs('home') ? 'side-menu--active' : '' }}">

                                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                <div class="side-menu__title">
                                    Dashboard 
                                </div>
                            </a>
                            
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                                <div class="side-menu__title">
                                    Data Master 
                                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="{{ route('mobil') }}" class="side-menu {{ request()->routeIs('mobil') ? 'side-menu--active' : '' }}">

                                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="side-menu__title"> Data Mobil </div>
                                    </a>
                                </li>
                                @auth
                                    @if(Auth::user()->role === 'pemilik')
                                        <li>
                                            <a href="{{ route('users') }}" class="side-menu {{ request()->routeIs('users') ? 'side-menu--active' : '' }}">
                                                <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                                <div class="side-menu__title"> Data User </div>
                                            </a>
                                        </li>
                                    @endif
                                @endauth

                            </ul>
                        </li>
                        {{-- <li>
                            <a href="{{route('mobil')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                                <div class="side-menu__title"> Mobil </div>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('transaksi') }}" class="side-menu {{ request()->routeIs('transaksi') ? 'side-menu--active' : '' }}">

                                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                                <div class="side-menu__title"> Transaksi </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('laporan') }}" class="side-menu {{ request()->routeIs('laporan') ? 'side-menu--active' : '' }}">

                                <div class="side-menu__icon"> <i data-lucide="credit-card"></i> </div>
                                <div class="side-menu__title"> Laporan </div>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('users')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                                <div class="side-menu__title"> User </div>
                            </a>
                        </li> --}}
                        <li class="side-nav__devider my-6"></li>
                        <li>
 
                    </ul>
                </nav>
                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div class="content">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 2xl:col-span-9">
                            <div class="your-content-wrapper">
                                @yield('content') 
                                
                                 {{-- Berisi konten halaman --}}
                            </div>
                        </div>
                        <div class="col-span-12 2xl:col-span-3">
                            {{-- Sidebar / tambahan lainnya --}}
                        </div>
                    </div>
                </div>
                
                <!-- END: Content -->
            </div>
        </div>
        {{-- <!-- BEGIN: Dark Mode Switcher-->
        <div data-url="side-menu-dark-dashboard-overview-1.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> --}}
        <!-- END: Dark Mode Switcher-->
        
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="/assets/Compiled/dist/js/app.js"></script>
        
        <!-- END: JS Assets-->
    </body>
</html>