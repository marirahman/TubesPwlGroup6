<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-2xl font-bold">Transaction Details</h1>

                    <!-- Date -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"><strong>Date:</strong></label>
                        <p class="text-gray-800 dark:text-gray-200">{{ $transaction->date ?? 'N/A' }}</p>
                    </div>

                    <!-- Total Amount -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"><strong>Total Amount:</strong></label>
                        <p class="text-gray-800 dark:text-gray-200">Rp {{ number_format($transaction->total_amount, 2) }}</p>
                    </div>

                    <!-- Items -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"><strong>Items:</strong></label>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                            @if ($transaction->items && $transaction->items->count() > 0)
                                @foreach ($transaction->items as $item)
                                    <li class="flex justify-between items-center py-3">
                                        <div>
                                            <p class="text-gray-800 dark:text-gray-200">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Quantity: {{ $item->quantity }}</p>
                                        </div>
                                        <span class="text-gray-800 dark:text-gray-200">Rp {{ number_format($item->price, 2) }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="text-center text-gray-600 dark:text-gray-400">No items found.</li>
                            @endif
                        </ul>
                    </div>

                    <!-- Back Button -->
                    <a href="{{ route('transactions.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">Back to Transactions</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
