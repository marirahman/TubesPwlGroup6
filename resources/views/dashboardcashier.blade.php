<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Cashier') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Hai, {{ Auth::user()->name }}</h1>
                    <p class="text-lg mb-2">Jabatan: <span class="font-medium text-purple-600 dark:text-purple-400">Cashier</span></p>
                    <p class="text-gray-600 dark:text-gray-400">
                        Selamat bekerja! Gunakan fitur di dashboard ini untuk mencatat transaksi dengan mudah dan efisien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
