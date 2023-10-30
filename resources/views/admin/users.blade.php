<x-app-layout>
    <div class="flex justify-between items-center max-w-7xl">
        <h2 class="text-3xl leading-9 font-semibold">All Users</h2>
        <a class="inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150" href="/admin/profile/create">Create User</a>
    </div>
    <div class="mt-8 flow-root max-w-7xl">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Number of Trips</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Roar Staff</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">

                        @foreach ($users as $user)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$user->name}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->email}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">0</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user->isAdmin() ? 'Roar Staff' : 'End User'}}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="/admin/profile/{{$user->id}}" class="text-sky-600 hover:text-sky-900">Edit<span class="sr-only">, {{$user->name}}</span></a>
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
