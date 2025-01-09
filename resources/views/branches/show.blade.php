<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-2xl font-bold">Laporan Cabang: {{ $branch->name }}</h1>

                    <!-- Konten Laporan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Laporan Transaksi</h2>
                            <table class="min-w-full divide-y divide-blue-300">
                                <thead class="bg-blue-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">Tanggal Transaksi</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white text-black">
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td class="px-4 py-2 text-sm">{{ optional($transaction->transaction_date)->format('Y-m-d') ?? 'N/A' }}</td>
                                            <td class="px-4 py-2 text-sm">Rp {{ number_format($transaction->total, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-2 text-center text-sm">Tidak ada transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold mb-4">Laporan Stok Barang</h2>
                            <table class="min-w-full divide-y divide-blue-300">
                                <thead class="bg-blue-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">Nama Produk</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider">Stok</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white text-black">
                                    @forelse ($stocks as $stock)
                                        <tr>
                                            <td class="px-4 py-2 text-sm">{{ optional($stock->product)->name ?? 'Unknown Product' }}</td>
                                            <td class="px-4 py-2 text-sm">{{ $stock->quantity }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-2 text-center text-sm">Tidak ada stok barang.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('reports.transactions', $branch->id) }}" class="px-6 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-600">Cetak Laporan Transaksi</a>
                        <a href="{{ route('reports.stock', $branch->id) }}" class="px-6 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">Cetak Laporan Stok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
