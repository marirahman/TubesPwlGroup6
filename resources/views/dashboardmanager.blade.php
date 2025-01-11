<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Manager') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Hai, {{ Auth::user()->name }}</h1>
                    <p class="text-lg">Jabatan: <span class="font-medium text-green-600 dark:text-green-400">Manager</span></p>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        Selamat datang di dashboard Anda. Gunakan menu di atas untuk mengelola data dan mengawasi operasional dengan lebih efisien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
