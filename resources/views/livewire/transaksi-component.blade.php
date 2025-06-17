<div>

    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Product Grid
        </h2>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('eror'))
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                {{ session('eror') }}
            </div>
        @endif
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
               
                
            </div>
            <!-- BEGIN: Users Layout -->
            @foreach ($mobil as $data)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="box">
                        <div class="p-5">
                            <div
                                class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Mobil" class="rounded-md"
                                        width="150">
                                @else
                                    <span>Tidak ada foto</span>
                                @endif

                                <span
                                    class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
                                        class="block font-medium text-base">{{$data->merk}}</a> <span
                                        class="text-white/90 text-xs mt-3">{{$data->nopolisi}}</span> </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-500 mt-5">
                                <div class="flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link"
                                        class="lucide lucide-link w-4 h-4 mr-2">
                                        <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path>
                                        <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path>
                                    </svg> Harga : {{$data->harga}} </div>
                                <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="layers"
                                        data-lucide="layers" class="lucide lucide-layers w-4 h-4 mr-2">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg> Kapasitas : {{$data->kapasitas}} </div>
                                {{-- <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="check-square"
                                        data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg> Status: Active </div> --}}
                            </div>
                        </div>
                        <div
                            class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">

                            <button class="flex items-center mr-3" wire:click="create({{$data->id}},{{$data->harga}})"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> Pesan </button>

                        </div>
                    </div>
                </div>
            @endforeach
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                    class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                    <polyline points="11 17 6 12 11 7"></polyline>
                                    <polyline points="18 17 13 12 18 7"></polyline>
                                </svg> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left"
                                    class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right"
                                    class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right"
                                    class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                    <polyline points="13 17 18 12 13 7"></polyline>
                                    <polyline points="6 17 11 12 6 7"></polyline>
                                </svg> </a>
                        </li>
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
    {{ $mobil->links() }}

    @if ($addPage)
        @include('transaksi.create')
    @endif
    @if ($lihatpage)
        @include('transaksi.lihat')
    @endif
</div>
</div>