<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-6 text-2xl font-bold">Kelola Pengguna</h1>

                    <!-- Form untuk assign role -->
                    <form action="{{ route('users.assignRole') }}" method="POST" class="mb-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="user_id" class="block text-sm font-medium text-white">Pilih Pengguna</label>
                                <select id="user_id" name="user_id" required
                                    class="block w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-medium text-white">Pilih Role</label>
                                <select id="role" name="role" required
                                    class="block w-full px-4 py-2 border border-blue-300 bg-white text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="supervisor">Supervisor</option>
                                    <option value="cashier">Kasir</option>
                                    <option value="warehouse">Pegawai Gudang</option>
                                    <option value="manager">Manager Toko</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Assign Role
                            </button>
                        </div>
                    </form>

                    <!-- Daftar Pengguna -->
                    <h2 class="mb-4 text-xl font-semibold">Daftar Pengguna</h2>
                    <table class="min-w-full border-collapse border border-blue-300">
                        <thead class="bg-blue-700 text-white">
                            <tr>
                                <th class="px-4 py-2 border border-blue-300 text-left">#</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Nama</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Email</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Role</th>
                                <th class="px-4 py-2 border border-blue-300 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($users as $index => $user)
                                <tr class="hover:bg-blue-100">
                                    <td class="px-4 py-2 border border-blue-300">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border border-blue-300">{{ ucfirst($user->role) }}</td>
                                    <td class="px-4 py-2 border border-blue-300">
                                        <form action="{{ route('users.removeRole', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                Hapus Role
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-500 px-4 py-2">Tidak ada pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
