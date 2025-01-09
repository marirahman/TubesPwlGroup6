<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-2xl font-bold">Daftar Branch</h1>
                    <a href="{{ route('branches.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 mb-6 inline-block">Tambah Branch</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-blue-300">
                            <thead class="bg-blue-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Branch</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Lokasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-blue-400 text-black">
                                @forelse($branches as $index => $branch)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $branch->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $branch->address }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('branches.edit', $branch->id) }}" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">
                                                    Edit
                                                </a>
                                                <a href="{{ route('branches.show', $branch->id) }}" class="px-3 py-1 bg-blue-700 text-white rounded-md hover:bg-blue-600">
                                                    Detail
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm">Tidak ada data branch.</td>
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
