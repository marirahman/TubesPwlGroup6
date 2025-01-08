<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-2xl font-bold">Transaction List</h1>
                    <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4 inline-block">Add New Transaction</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-600 text-sm text-left">
                            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                                <tr>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">#</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">Date</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">Total Amount</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $index => $transaction)
                                    <tr class="bg-white dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600">
                                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">{{ $transaction->date }}</td>
                                        <td class="px-6 py-4">Rp {{ number_format($transaction->total_amount, 2) }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('transactions.show', $transaction->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 text-sm">View</a>
                                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No transactions available.</td>
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
