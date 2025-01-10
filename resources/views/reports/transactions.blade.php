<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-2xl font-bold">Transaction Report</h1>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-blue-300">
                        <thead class="bg-blue-700 text-white">
                            <tr>
                                <th class="px-4 py-2 border border-blue-300 text-left">#</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Transaction ID</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">User</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Product</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Branch</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Date</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Total Amount</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($transactions as $index => $transaction)
                                <tr class="hover:bg-blue-100 text-black">
                                    <td class="px-4 py-2 border border-blue-300">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $transaction->id }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $transaction->user->name }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $transaction->product->name ?? 'No Product' }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $transaction->branch->name ?? 'No Branch' }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $transaction->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</td>
                                    <td class="px-4 py-2 border border-blue-300">Rp {{ number_format($transaction->total_amount, 2) }}</td>
                                    <td class="px-4 py-2 border border-blue-300">
                                        <span style="color: black;">
                                            {{ $transaction->status ?? 'Selesai' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-black px-4 py-2">No transactions available.</td>
                                </tr>
                            @endforelse
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
