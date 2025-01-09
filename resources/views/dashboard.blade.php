<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Fitur Dashboard -->
            <div class="mt-6">
                <!-- Statistik Dashboard -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Transaksi -->
                    <div class="p-6 bg-blue-500 text-white shadow-lg rounded-lg text-center">
                        <h5 class="text-lg font-semibold">Total Transaksi</h5>
                        <p class="text-3xl font-bold">{{ $totalTransactions ?? 0 }}</p>
                    </div>

                    <!-- Total Produk -->
                    <div class="p-6 bg-blue-400 text-white shadow-lg rounded-lg text-center">
                        <h5 class="text-lg font-semibold">Total Produk</h5>
                        <p class="text-3xl font-bold">{{ $totalProducts ?? 0 }}</p>
                    </div>

                    <!-- Total Pendapatan -->
                    <div class="p-6 bg-blue-600 text-white shadow-lg rounded-lg text-center">
                        <h5 class="text-lg font-semibold">Total Pendapatan</h5>
                        <p class="text-3xl font-bold">Rp {{ number_format($totalRevenue ?? 0, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
