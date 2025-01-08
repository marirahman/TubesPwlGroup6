<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-bold">Add New Product</h1>
                    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex items-center mb-4">
                            <label for="code" class="w-1/5 text-left text-sm font-medium text-gray-700 dark:text-gray-300 ">Product Code</label>
                            <div class="w-2/3">
                                <input type="text" id="code" name="code" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label for="name" class="w-1/5 text-sm font-medium text-gray-700 dark:text-gray-300 text-left">Product Name</label>
                            <div class="w-2/3">
                                <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label for="price_buy" class="w-1/5 text-sm font-medium text-gray-700 dark:text-gray-300 text-left">Buying Price</label>
                            <div class="w-2/3">
                                <input type="number" id="price_buy" name="price_buy" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label for="price_sell" class="w-1/5 text-sm font-medium text-gray-700 dark:text-gray-300 text-left">Selling Price</label>
                            <div class="w-2/3">
                                <input type="number" id="price_sell" name="price_sell" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label for="stock" class="w-1/5 text-sm font-medium text-gray-700 dark:text-gray-300 text-left">Stock</label>
                            <div class="w-2/3">
                            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div> 
                        <div class="flex items-center">
                            <label for="branch_id" class="w-1/5 text-sm font-medium text-gray-700 dark:text-gray-300 text-left">Branch</label>
                            <div class="w-2/3">
                                <select id="branch_id" name="branch_id" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @forelse($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @empty
                                        <option value="" disabled>No branches available</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
                            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
