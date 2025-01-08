<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-bold">Edit Product</h1>

                            @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">There were some problems with your input.</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Product Code -->
                        <div class="flex items-center">
                            <label for="code" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">
                                Product Code
                            </label>
                            <div class="w-2/3">
                                <input type="text" id="code" name="code" value="{{ old('code', $product->code) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Product Name -->
                        <div class="flex items-center">
                            <label for="name" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">
                                Product Name
                            </label>
                            <div class="w-2/3">
                                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Buying Price -->
                        <div class="flex items-center">
                            <label for="price_buy" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">
                                Buying Price
                            </label>
                            <div class="w-2/3">
                                <input type="number" id="price_buy" name="price_buy" value="{{ old('price_buy', $product->price_buy) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Selling Price -->
                        <div class="flex items-center">
                            <label for="price_sell" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">
                                Selling Price
                            </label>
                            <div class="w-2/3">
                                <input type="number" id="price_sell" name="price_sell" value="{{ old('price_sell', $product->price_sell) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="flex items-center">
                            <label for="stock" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">
                                Stock
                            </label>
                            <div class="w-2/3">
                                <input type="number" id="stock" name="stock" value="{{ old('stock', $stock->quantity ?? 0) }}" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="branch_id" class="w-1/3 text-sm font-medium text-gray-700 dark:text-gray-300 text-right">Branch</label>
                            <div class="w-2/3">
                                <select id="branch_id" name="branch_id" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $product->branch_id == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update
                            </button>
                            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
