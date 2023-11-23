<x-app-layout class="flex w-full">
    <div class="flex w-full">
        <div class="w-3/4">
            <div class="max-w-6xl">
                <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                    <dt>
                        <div class="font-medium text-base">Welcome back,</div>
                        <div class="font-bold text-2xl">{{ Auth::user()->name }}</div>
                    </dt>
                    <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                        <div
                            class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 divide-x flex items-center">
                            <div class="text-sm uppercase font-medium px-1 py-4 flex justify-center items-center">
                                {{ $numberOfRequestedTrips }} requested trips
                            </div>
                            <div class="text-sm uppercase font-medium px-1 py-4 flex justify-center items-center">
                                {{ $numberOfConfirmedTrips }} confirmed trips
                            </div>
                            <div class="text-sm uppercase font-medium px-1 py-4 flex justify-center items-center">
                                {{ $numberOfCompletedTrips }} completed trips
                            </div>
                        </div>
                    </dd>
                </div>

                <div class="mt-10">
                    <h2 class="font-bold text-2xl">My STA</h2>
                    <div class="border-b border-gray-300 mt-4"></div>

                    @if (count($trips) == 0)
                        <div class="flex items-center justify-center flex-col flex-1 flex-grow">
                            <div class="font-base text-2xl mt-10">No Trips</div>
                            <div class="font-base text-gray-500 text-sm mt-4">Get started by requesting a new trip.
                            </div>
                            <div class="button w-1/4 mt-4">
                                <a href="/trip/new"
                                   class="w-full inline-flex justify-center items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    + New Trip
                                </a>
                            </div>
                        </div>
                    @else
                        <div x-data="{ tab: 'All' }">
                            <div class="sm:hidden">
                                <label for="tabs" class="sr-only">Select a tab</label>
                                <select id="tabs" name="tabs"
                                        class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                        x-model="tab">
                                    <option>All</option>
                                    <option>Requested</option>
                                    <option>Confirmed</option>
                                    <option>Completed</option>
                                    <option>Cancelled</option>
                                </select>
                            </div>
                            <div class="hidden sm:block">
                                <div class="border-b border-gray-200">
                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                        <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'All' }"
                                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                           @click.prevent="tab = 'All'">All</a>
                                        <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Requested' }"
                                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                           @click.prevent="tab = 'Requested'">Requested</a>
                                        <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Confirmed' }"
                                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                           @click.prevent="tab = 'Confirmed'">Confirmed</a>
                                        <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Completed' }"
                                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                           @click.prevent="tab = 'Completed'">Completed</a>
                                        <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Cancelled' }"
                                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                           @click.prevent="tab = 'Cancelled'">Cancelled</a>
                                    </nav>
                                </div>
                            </div>


                            <!-- Content Sections -->
                            <div x-show="tab === 'All'">
                                <h2 class="text-lg mt-5">All STA Trips</h2>

                                <div class="max-w-6xl grid grid-cols-2 gap-10">
                                    @foreach ($trips as $trip)
                                        <div
                                            class="relative mt-10 overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                            <dt class="">
                                                <div class="flex items-center justify-between">
                                                    <div class="font-medium text-base">{{$trip->trip_name}}</div>
                                                    <div class="font-medium text-base text-gray-500 uppercase">{{$trip->status}}</div>
                                                </div>

                                                <div>
                                                    <div class="text-sm text-gray-500 mt-5">
                                                        {{$trip->trip_start_date}} - {{$trip->trip_end_date}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$trip->trip_location}}
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                                <a href="/trip/{{$trip->id}}"
                                                    class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 bg-sky-50 text-sky-900 p-3 justify-center text-center cursor-pointer items-center">
                                                    View Details
                                                </a>
                                            </dd>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div x-show="tab === 'Requested'">
                                <h2 class="text-lg mt-5">Requested STA Trips</h2>

                                <div class="max-w-6xl grid grid-cols-2 gap-10">
                                    @foreach ($trips->where('status', 'requested') as $trip)
                                        <div
                                            class="relative mt-10 overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                            <dt class="">
                                                <div class="flex items-center justify-between">
                                                    <div class="font-medium text-base">{{$trip->trip_name}}</div>
                                                    <div class="font-medium text-base text-gray-500 uppercase">{{$trip->status}}</div>
                                                </div>

                                                <div>
                                                    <div class="text-sm text-gray-500 mt-5">
                                                        {{$trip->trip_start_date}} - {{$trip->trip_end_date}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$trip->trip_location}}
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                                <a href="/trip/{{$trip->id}}"
                                                   class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 bg-sky-50 text-sky-900 p-3 justify-center text-center cursor-pointer items-center">
                                                    View Details
                                                </a>
                                            </dd>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div x-show="tab === 'Confirmed'">
                                <h2 class="text-lg mt-5">Confirmed STA Trips</h2>

                                <div class="max-w-6xl grid grid-cols-2 gap-10">
                                    @foreach ($trips->where('status', 'confirmed') as $trip)
                                        <div
                                            class="relative mt-10 overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                            <dt class="">
                                                <div class="flex items-center justify-between">
                                                    <div class="font-medium text-base">{{$trip->trip_name}}</div>
                                                    <div class="font-medium text-base text-gray-500 uppercase">{{$trip->status}}</div>
                                                </div>

                                                <div>
                                                    <div class="text-sm text-gray-500 mt-5">
                                                        {{$trip->trip_start_date}} - {{$trip->trip_end_date}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$trip->trip_location}}
                                                    </div>
                                                </div>
                                            </dt>
                                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                                <a href="/trip/{{$trip->id}}"
                                                   class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 bg-sky-50 text-sky-900 p-3 justify-center text-center cursor-pointer items-center">
                                                    View Details
                                                </a>
                                            </dd>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div x-show="tab === 'Completed'">
                                <h2 class="text-lg mt-5">Completed STA Trips</h2>

                                @foreach ($trips->where('status', 'completed') as $trip)
                                    <div
                                        class="relative mt-10 overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                        <dt class="">
                                            <div class="flex items-center justify-between">
                                                <div class="font-medium text-base">{{$trip->trip_name}}</div>
                                                <div class="font-medium text-base text-gray-500 uppercase">{{$trip->status}}</div>
                                            </div>

                                            <div>
                                                <div class="text-sm text-gray-500 mt-5">
                                                    {{$trip->trip_start_date}} - {{$trip->trip_end_date}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{$trip->trip_location}}
                                                </div>
                                            </div>
                                        </dt>
                                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                            <a href="/trip/{{$trip->id}}"
                                               class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 bg-sky-50 text-sky-900 p-3 justify-center text-center cursor-pointer items-center">
                                                View Details
                                            </a>
                                        </dd>
                                    </div>
                                @endforeach
                            </div>
                            <div x-show="tab === 'Cancelled'">
                                <h2 class="text-lg mt-5">Cancelled STA Trips</h2>

                                @foreach ($trips->where('status', 'cancelled') as $trip)
                                    <div
                                        class="relative mt-10 overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                        <dt class="">
                                            <div class="flex items-center justify-between">
                                                <div class="font-medium text-base">{{$trip->trip_name}}</div>
                                                <div class="font-medium text-base text-gray-500 uppercase">{{$trip->status}}</div>
                                            </div>

                                            <div>
                                                <div class="text-sm text-gray-500 mt-5">
                                                    {{$trip->trip_start_date}} - {{$trip->trip_end_date}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{$trip->trip_location}}
                                                </div>
                                            </div>
                                        </dt>
                                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                            <a href="/trip/{{$trip->id}}"
                                               class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 sm:px-6 bg-sky-50 text-sky-900 p-3 justify-center text-center cursor-pointer items-center">
                                                View Details
                                            </a>
                                        </dd>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-1/4 px-6">
            <h4 class="text-lg mb-5">Quick Actions</h4>
            <div class="border-b border-gray-200 mt-4"></div>

            <a href="/trip/new"
               class="block p-3 flex items-center hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-sky-50 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" rx="8" fill="#F0FDFA"/>
                    <path d="M24 16V32M32 24L16 24" stroke="#0F766E" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <div class="flex flex-col pl-2">
                    <div class="text-base font-medium">Request New Trip</div>
                    <div class="text-xs text-gray-500">Request a new trip from STA</div>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
