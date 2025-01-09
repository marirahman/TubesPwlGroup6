<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-6 text-2xl font-bold">Add New Product</h1>
                    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="flex items-center mb-4">
                            <label for="code" class="w-1/5 text-left text-sm font-medium text-white">Product Code</label>
                            <div class="w-2/3">
                                <input type="text" id="code" name="code" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="name" class="w-1/5 text-sm font-medium text-white text-left">Product Name</label>
                            <div class="w-2/3">
                                <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="price_buy" class="w-1/5 text-sm font-medium text-white text-left">Buying Price</label>
                            <div class="w-2/3">
                                <input type="number" id="price_buy" name="price_buy" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="price_sell" class="w-1/5 text-sm font-medium text-white text-left">Selling Price</label>
                            <div class="w-2/3">
                                <input type="number" id="price_sell" name="price_sell" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="stock" class="w-1/5 text-sm font-medium text-white text-left">Stock</label>
                            <div class="w-2/3">
                                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div> 

                        <div class="flex items-center">
                            <label for="branch_id" class="w-1/5 text-sm font-medium text-white text-left">Branch</label>
                            <div class="w-2/3">
                                <select id="branch_id" name="branch_id" required
                                    class="w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                                    @forelse($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @empty
                                        <option value="" disabled>No branches available</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-800">Save</button>
                            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
