<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5">
                        <input type="text" id="searchInput" placeholder="Search..."
                            class="bg-gray-800 text-white w-full dark:text-gray-300 dark:bg-gray-600 rounded-md px-3 outline-none border-none ">
                    </div>

                    <div class="mt-5">
                        <table id="dataTable" class="table-auto border-collapse w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Phone</th>
                                    <th class="px-4 py-2">Requirement</th>
                                    <th class="px-4 py-2">Room</th>
                                    <th class="px-4 py-2">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                    <tr class="bg-white text-gray-700 dark:bg-gray-800 dark:text-white">
                                        <td class="border px-4 py-2">{{ $entry->name }}</td>
                                        <td class="border px-4 py-2">{{ $entry->phone }}</td>
                                        <td class="border px-4 py-2">{{ $entry->requirement }}</td>
                                        <td class="border px-4 py-2">{{ $entry->room }}</td>
                                        <td class="border px-4 py-2">{{ $entry->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var found = false;
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    var columnValue = td[j];
                    if (columnValue) {
                        txtValue = columnValue.textContent || columnValue.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        });
    </script>

</x-app-layout>
