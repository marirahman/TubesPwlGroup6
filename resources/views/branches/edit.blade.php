<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-6 text-2xl font-bold">Edit Branch</h1>
                    <form action="{{ route('branches.update', $branch->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <label for="name" class="text-sm font-medium text-white self-center">Branch Name</label>
                            <div class="sm:col-span-2">
                                <input type="text" id="name" name="name" value="{{ $branch->name }}" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-black rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <label for="location" class="text-sm font-medium text-white self-center">Location</label>
                            <div class="sm:col-span-2">
                                <input type="text" id="location" name="address" value="{{ $branch->address }}" required
                                class="w-full px-4 py-2 border border-blue-300 bg-white text-black rounded-md shadow-sm focus:ring-blue-700 focus:border-blue-700">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
                                Update
                            </button>
                            <a href="{{ route('branches.index') }}" class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
