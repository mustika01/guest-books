<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lists Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('room.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</a>
                    </div>
                    <table class="table-auto border-collapse w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Quota</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr class="bg-white text-gray-700 dark:bg-gray-800 dark:text-white">
                                    <td class="border px-4 py-2">{{ $entry->name }}</td>
                                    <td class="border px-4 py-2">{{ $entry->description }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($entry->image)
                                            <a href="{{ asset('storage/' . $entry->image) }}" data-fancybox="gallery">
                                                <img src="{{ asset('storage/' . $entry->image) }}" alt="Room Image"
                                                    class="h-16 w-16 object-cover">
                                            </a>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $entry->quota }}</td>
                                    <td class="border px-4 py-2">{{ $entry->created_at }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-between">
                                            <a href="{{ route('room.edit', $entry->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                            <form action="{{ route('room.destroy', $entry->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    $(document).ready(function() {
        // Inisialisasi Fancybox
        $('[data-fancybox="gallery"]').fancybox({
            // Aktifkan fungsi menutup dengan mengklik di luar gambar
            clickOutside: true
        });
    });
</script>
