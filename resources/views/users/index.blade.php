<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-xl font-bold mb-4">User List</h1>
                    <a href="{{ route('users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 mb-4 inline-block">Add New User</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-blue-200 dark:divide-blue-600">
                            <thead class="bg-blue-700 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Role</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-white dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-blue-200 dark:divide-blue-600">
                                @foreach ($users as $index => $user)
                                    <tr class="hover:bg-blue-100 dark:hover:bg-blue-800">
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-200">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-200">{{ $user->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-200">{{ $user->email }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-200">{{ $user->role }}</td>
                                        <td class="px-4 py-2 text-sm">
                                            <a href="{{ route('users.edit', $user->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
