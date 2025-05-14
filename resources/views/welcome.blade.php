<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Kendaraan Tanak awu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
            <a href="/" class="flex items-center">
                <img src="{{ asset('assets/KosLombok.svg') }}" class="h-10 mr-3 sm:h-14" alt="Lombok kos" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Kos Lombok</span>
            </a>
            <div class="flex items-center lg:order-2">
                <form id="search-form" class="hidden w-full mr-3 lg:inline-block">
                    <label for="search-bar"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search-bar"
                            class="block w-full px-4 py-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search" required>
                    </div>
                </form>
                <button data-collapse-toggle="mobile-menu-search" aria-controls="mobile-menu-search"
                    aria-expanded="false" type="button"
                    class="lg:hidden inline-flex mr-2 lg:mr-0 items-center text-gray-800 dark:text-gray-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2.5 lg:px-5 py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    <svg class="w-5 h-5 lg:mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <span class="hidden w-px h-5 mx-2 bg-gray-200 lg:inline lg:mx-3"></span>
                <button data-collapse-toggle="mobile-menu-search" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1"
                id="mobile-menu-search">
                <form class="flex items-center mt-4 lg:hidden">
                    <label for="search-mobile" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="search" id="search-mobile"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search for anything..." required>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center p-2.5 ml-2 text-sm font-medium text-white bg-primary-700 rounded-lg border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><svg
                            class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg> Search</button>
                </form>
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/"
                            class="block py-2 pl-3 pr-4 rounded text-gray-700 dark:hover:bg-gray-700 hover:bg-gray-50 lg:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href=""
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-white lg:border-0 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>

                    <li>
                        <a href=""
                            class="block py-2 pl-3 pr-4 text-primary-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-white lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">syarat
                            dan ketentuan</a>
                    </li>
                    <li>
                        <a href="https://wa.me/6287863968484?text=Assalamualaikum"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-white lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Pusat
                            Bantuan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <section class="bg-white rounded-full dark:bg-gray-900">
        <div class="bg-gray-700 bg-center bg-no-repeat bg-cover bg-blend-multiply"
            style="background-image: url('{{ asset('assets/banner/coast-house-view.jpg') }}');">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative max-w-screen-xl px-4 py-8 mx-auto text-white lg:py-16 xl:px-0 z-1">
                    <div class="max-w-screen-md mb-6 lg:mb-0">
                        <h1
                            class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-white md:text-5xl lg:text-6xl">
                            Tinggal Nyaman di Lombok, Mulai dari Sini!</h1>
                        <p class="mb-6 font-light text-gray-300 lg:mb-8 md:text-lg lg:text-xl">Lombok Kos hadir untuk
                            memudahkan
                            Anda dalam mencari hunian yang nyaman dan sesuai dengan kebutuhan. Dengan berbagai pilihan
                            kos yang
                            telah diverifikasi, Anda bisa menemukan tempat tinggal yang aman, bersih, dan memiliki
                            fasilitas
                            lengkap. Tak perlu repot lagi mencari informasi—cukup jelajahi daftar kos, lihat detail
                            fasilitas,
                            dan hubungi pemilik secara langsung. Baik untuk mahasiswa, pekerja, atau wisatawan, Lombok
                            Kos
                            adalah solusi praktis untuk menemukan tempat tinggal ideal di Lombok. Mulailah perjalanan
                            Anda
                            menuju kenyamanan di Lombok bersama kami!.</p>
                        {{-- <a href="#"
                    class="inline-flex items-center px-5 py-3 font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-900 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                </a> --}}
                    </div>
                </div>
            </div>
{{-- <img src="{{ asset('images/vehicles/' . $vehicle->image) }}" --}}
    </section>
    <!-- Block start -->
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 text-center">Daftar Mobil Tersedia</h2>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($cars as $car)
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition overflow-hidden flex flex-col">
                    <a href="#" class="block">
                        <img class="w-full h-48 object-cover" src="{{ asset('images/vehicles/' . $car->image) }}" alt="{{ $car->name }}">
                    </a>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            <a href="#">{{ $car->name }}</a>
                        </h3>
                        <span class="text-primary-700 dark:text-primary-400 font-semibold mb-4">
                            {{ 'Rp ' . number_format($car->price_per_day, 0, ',', '.') }} <span class="text-sm font-normal text-gray-500 dark:text-gray-400">/ hari</span>
                        </span>
         
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold">
                                Tersedia
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold">
                                Supir
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-semibold">
                                Bensin
                            </span>
                        </div>

                                       <a href="https://wa.me/6287863968484?text=Halo%20saya%20ingin%20sewa%20mobil%20{{ urlencode($car->name) }}" target="_blank"
                            class="inline-flex items-center justify-center px-4 py-2 mb-4 text-sm font-medium text-white bg-green-500 rounded hover:bg-green-600 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A11.93 11.93 0 0012 0C5.37 0 0 5.37 0 12c0 2.12.55 4.19 1.61 6.01L0 24l6.18-1.62A11.93 11.93 0 0012 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.66-.5-5.23-1.44l-.37-.22-3.67.96.98-3.58-.24-.37A9.93 9.93 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.2-7.8c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.44-2.25-1.4-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.35-.01-.54-.01s-.5.07-.76.36c-.26.29-1 1-.97 2.43.03 1.43 1.03 2.81 1.18 3.01.15.2 2.03 3.1 4.93 4.22.69.3 1.23.48 1.65.61.69.22 1.32.19 1.81.12.55-.08 1.65-.67 1.88-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/></svg>
                            Kontak WhatsApp untuk Sewa
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Block end -->

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
