<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-bold">Add New Branch</h1>
                    <form action="{{ route('branches.store') }}" method="POST">
    @csrf
    <div class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium">Branch Name</label>
            <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="address" class="block text-sm font-medium">Address</label>
            <input type="text" id="address" name="address" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="supervisor_id" class="block text-sm font-medium">Supervisor</label>
            <select id="supervisor_id" name="supervisor_id" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Select Supervisor --</option>
                @foreach ($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
            <a href="{{ route('branches.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</a>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
