<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stock Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-2xl font-bold">Stock Report</h1>
                    
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-blue-300">
                            <thead class="bg-blue-700 text-white">
                                <tr>
                                    <th class="px-4 py-2 border border-blue-300 text-left">#</th>
                                    <th class="px-4 py-2 border border-blue-300 text-left">Product Name</th>
                                    <th class="px-4 py-2 border border-blue-300 text-left">Stock Quantity</th>
                                    <th class="px-4 py-2 border border-blue-300 text-left">Price (Sell)</th>
                                    <th class="px-4 py-2 border border-blue-300 text-left">Price (Buy)</th>
                                    <th class="px-4 py-2 border border-blue-300 text-left">Branch</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse($products as $index => $product)
                                    <tr class="hover:bg-blue-100 text-black">
                                        <td class="px-4 py-2 border border-blue-300">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 border border-blue-300">{{ $product->name }}</td>
                                        <td class="px-4 py-2 border border-blue-300">
                                            {{ $product->stocks->sum('quantity') ?? 0 }}
                                        </td>
                                        <td class="px-4 py-2 border border-blue-300">Rp {{ number_format($product->price_sell, 2) }}</td>
                                        <td class="px-4 py-2 border border-blue-300">Rp {{ number_format($product->price_buy, 2) }}</td>
                                        <td class="px-4 py-2 border border-blue-300">
                                            @if($product->stocks->isNotEmpty() && $product->stocks->first()->branch)
                                                {{ $product->stocks->first()->branch->name }}
                                            @else
                                                Unknown
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-black px-4 py-2">No products available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
