<x-app-layout>
    <div class="flex justify-between items-center max-w-7xl">
        <h2 class="text-3xl leading-9 font-semibold">All Trips</h2>
        {{--        <a class="inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150" href="/admin/profile/create">Create User</a>--}}
    </div>

    <div class="mt-8 flow-root max-w-7xl">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Trip Name
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">STA
                            Participant
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">View</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">Lindsay Walton</div>
                                <div class="mt-1 text-gray-500">lindsay.walton@example.com</div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                            <div class="text-gray-900">Front-end Developer</div>
                            <div class="mt-1 text-gray-500">Optimization</div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                            <span
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                        </td>

                        <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                            <a href="/admin/trip/1" class="text-sky-600 hover:text-sky-900">View<span class="sr-only">, Lindsay Walton</span></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
