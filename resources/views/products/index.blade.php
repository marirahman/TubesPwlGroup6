<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 dark:bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4 text-xl font-bold text-white">Product List</h1>
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-800">Add New Product</a>
                    
                    <table class="min-w-full divide-y divide-blue-400 dark:divide-blue-800 mt-4">
                        <thead class="bg-blue-600 dark:bg-blue-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Product ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Code</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Price (Buy)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Price (Sell)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-blue-800 divide-y divide-blue-400 dark:divide-blue-800">
                            @forelse($products as $index => $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">{{ $product->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">{{ $product->code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">
                                        {{ $product->stocks->sum('quantity') ?? '0' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">Rp {{ number_format($product->price_buy, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 dark:text-blue-200">Rp {{ number_format($product->price_sell, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('products.edit', $product->id) }}" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-sm text-blue-500 dark:text-blue-300">No products available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
