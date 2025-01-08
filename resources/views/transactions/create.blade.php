<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-2xl font-bold">Add New Transaction</h1>
                    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Branch Input -->
                        <div>
                            <label for="branch_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Branch</label>
                            <select id="branch_id" name="branch_id" required
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- User Input -->
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">User</label>
                            <select id="user_id" name="user_id" required
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                            <div class="w-2/3">
                                <input type="date" id="date" name="date" value="{{ old('date') }}" required
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>


                        <!-- Products Input -->
                        <div id="products-container">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Products</label>
                            <div class="flex items-center space-x-4 mb-4">
                                <select name="products[0][product_id]" required
                                    class="block w-1/2 px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="products[0][quantity]" placeholder="Quantity" required
                                    class="block w-1/2 px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Add Product Button -->
                        <button type="button" id="add-product-btn" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            + Add Product
                        </button>

                        <!-- Save and Cancel Buttons -->
                        <div class="flex items-center justify-start space-x-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
                            <a href="{{ route('transactions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const productsContainer = document.getElementById('products-container');
        const addProductBtn = document.getElementById('add-product-btn');
        let productIndex = 1;

        addProductBtn.addEventListener('click', () => {
            const productInput = `
                <div class="flex items-center space-x-4 mb-4">
                    <select name="products[${productIndex}][product_id]" required
                        class="block w-1/2 px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="products[${productIndex}][quantity]" placeholder="Quantity" required
                        class="block w-1/2 px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            `;
            productsContainer.insertAdjacentHTML('beforeend', productInput);
            productIndex++;
        });
    </script>
</x-app-layout>
