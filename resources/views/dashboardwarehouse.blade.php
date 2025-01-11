<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard Warehouse') }}
            </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Hai, {{ Auth::user()->name }}</h1>
                    <p class="text-lg mb-4">Jabatan: <span class="font-medium text-blue-600 dark:text-blue-400">Staff Gudang</span></p>
                    <p>Selamat datang di Dashboard Warehouse Anda.</p>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-600">
                    <p class="text-gray-600 dark:text-gray-400">
                        Akses menu di atas untuk mengelola data warehouse Anda, atau klik tombol di bawah untuk memulai.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
