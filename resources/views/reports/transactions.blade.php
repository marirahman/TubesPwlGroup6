<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4 text-2xl font-bold">Transaction Report</h1>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">#</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Transaction ID</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Date</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Total Amount</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @forelse($transactions as $index => $transaction)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900">
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $transaction->id }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">Rp {{ number_format($transaction->total_amount, 2) }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">
                                            <span class="inline-block px-3 py-1 text-sm font-medium rounded-md 
                                                {{ $transaction->status == 'Completed' ? 'bg-green-600 text-white' : 'bg-green-600 text-white' }}">
                                                {{ $transaction->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-gray-500 dark:text-gray-400 px-4 py-2">No transactions available.</td>
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
