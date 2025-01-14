<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('403 - Access Denied') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl font-bold mb-4">403 - Anda tidak memiliki izin untuk mengakses halaman ini.</h1>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
