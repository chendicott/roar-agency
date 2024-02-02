<div>
    <div class="flex w-full">
        <div class="w-3/4">
            <div class="max-w-6xl">
                <div class="flex border-b border-gray-200 pb-6 flex justify-between items-center">
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-semibold text-gray-900 inline-flex">{{$trip->trip_name}}</h2>
                        <h3 class="text-lg font-medium text-gray-500 leading-5">{{$trip->trip_start_date}}
                            - {{$trip->trip_end_date}}</h3>
                    </div>

                    <div class="flex items-center">
                        <div class="ml-3 text-medium font-bold uppercase text-gray-500 leading-5">
                            @if(auth()->user()->isAdmin())
                                <select wire:model="status">
                                    <option value="requested">Requested</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            @else
                                <p>{{$trip->status}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <h3 class="mt-5 mb-10 font-medium text-gray-900 text-lg">Information & Updates</h3>
                <div x-data="{ tab: 'Details' }">
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>
                        <select id="tabs" name="tabs"
                                class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                x-model="tab">
                            <option>Trip Details</option>
                            {{--                            <option>Trip Updates</option>--}}
                            <option>Trip Budget</option>
                            @if (!auth()->user()->isParticipant($trip))
                                <option>Incident Reports</option>
                            @endif
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Details' }"
                                   class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                   @click.prevent="tab = 'Details'">Trip Details</a>
                                {{--                                <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Updates' }"--}}
                                {{--                                   class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"--}}
                                {{--                                   @click.prevent="tab = 'Updates'">Trip Updates</a>--}}
                                <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Budget' }"
                                   class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                   @click.prevent="tab = 'Budget'">Trip Budget</a>
                                @if (!auth()->user()->isParticipant($trip))
                                    <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Incidents' }"
                                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                       @click.prevent="tab = 'Incidents'">Incident Reports</a>
                                @endif
                            </nav>
                        </div>
                    </div>

                    <!-- Content Sections -->
                    <div x-show="tab === 'Details'">
                        <div class="flex justify-between items-center">
                            <h2 class="mt-5">Trip Details</h2>
                            <div wire:click="toggleEditing"
                                 class="cursor-pointer text-sm uppercase text-gray-500 leading-5">{{$editButtonText}}</div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Participants</div>
                                </div>

                                <div class="flex-col w-full">
                                    @foreach ($trip->participants as $participant)
                                        <div class="flex justify-between items-center w-full pb-4">
                                            <div class="flex flex-col">
                                                <div
                                                    class="text-base text-gray-900">{{$participant->first_name}} {{$participant->last_name}}</div>
                                                <div class="text-sm text-gray-500">{{$participant->email}}</div>
                                            </div>
                                            @if (!$isEditing)
                                                @if (auth()->user()->isAdmin())
                                                    <a href="/admin/profile/{{$participant->id}}"
                                                       class="block text-sm text-sky-500">View Profile</a>
                                                @else
                                                    <a href="/profile/{{$participant->id}}"
                                                       class="block text-sm text-sky-500">View Profile</a>
                                                @endif
                                            @else
                                                <div wire:click="removeParticipant('{{$participant->id}}')"
                                                     class="cursor-pointer text-sm text-sky-500">Remove Participant
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if ($isEditing)
                                <div class="block rounded-md border border-s-2 border-gray-300 p-3">
                                    <div class="text-sm text-gray-500">Add Participant</div>
                                    <select wire:model="newParticipant"
                                            class="w-full border border-gray-300 rounded-md">
                                        <option value="">Select Participant</option>
                                        @foreach ($this->allUsersAvailableToLink as $user)
                                            <option
                                                value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="newParticipant"></x-input-error>
                                    <div class="flex justify-end mt-5">
                                        <x-button wire:click="addParticipant">Add Participant</x-button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Support Workers</div>
                                </div>

                                <div class="w-full flex-col">
                                    @foreach ($trip->supportWorkers as $supportWorker)
                                        <div class="flex justify-between items-center w-full pb-4">
                                            <div class="flex flex-col">
                                                <div
                                                    class="text-base text-gray-900">{{$supportWorker->first_name}} {{$supportWorker->last_name}}</div>
                                                <div
                                                    class="text-sm text-gray-500">{{$supportWorker->email}}</div>
                                            </div>

                                            @if (!$isEditing)
                                                @if (auth()->user()->isAdmin())
                                                    <a href="/admin/profile/{{$supportWorker->id}}"
                                                       class="block text-sm text-sky-500">View Profile</a>
                                                @else
                                                    <a href="/profile/{{$supportWorker->id}}"
                                                       class="block text-sm text-sky-500">View Profile</a>
                                                @endif
                                            @else
                                                <div wire:click="removeSupportWorker('{{$supportWorker->id}}')"
                                                     class="cursor-pointer text-sm text-sky-500">Remove Support
                                                    Worker
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if ($isEditing)
                                <div class="block rounded-md border border-s-2 border-gray-300 p-3">
                                    <div class="text-sm text-gray-500">Add Support Worker</div>
                                    <select wire:model="newSupportWorker"
                                            class="w-full border border-gray-300 rounded-md">
                                        <option value="">Select Support Worker</option>
                                        @foreach ($this->allUsersAvailableToLink as $user)
                                            <option
                                                value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="newSupportWorker"></x-input-error>
                                    <div class="flex justify-end mt-5">
                                        <x-button wire:click="addSupportWorker">Add Support Worker</x-button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Dates</div>
                                </div>

                                @if(!$isEditing)
                                    <div class="flex items-center w-full">
                                        <div class="flex flex-col">
                                            <x-label>Start Date</x-label>
                                            <div
                                                class="text-base text-gray-900">{{$trip->trip_start_date}}</div>
                                        </div>
                                        <div class="flex flex-col pl-10">
                                            <x-label>End Date</x-label>
                                            <div
                                                class="text-base text-gray-900">{{$trip->trip_end_date}}</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="grid sm:grid-cols-2 gap-6 w-full">
                                        <div class="block pb-4 w-full">
                                            <x-label>Start Date</x-label>
                                            <x-input wire:model.lazy="trip.trip_start_date"
                                                     class="w-full" type="date"
                                                     placeholder="Start Date"></x-input>
                                            <x-input-error for="tripStartDate"/>
                                        </div>

                                        <div class="block pb-4 w-full">
                                            <x-label>End Date</x-label>
                                            <x-input wire:model.lazy="trip.trip_end_date" class="w-full"
                                                     type="date"
                                                     placeholder="End Date"></x-input>
                                            <x-input-error for="tripEndDate"/>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Location Name</div>
                                </div>


                                <div class="flex items-center w-full">
                                    @if (!$isEditing)
                                        <div
                                            class="text-base text-gray-900">{{$trip->trip_location}}</div>
                                    @else
                                        <div class="block pb-4 w-full">
                                            <x-input wire:model.lazy="trip.trip_location" class="w-full"
                                                     placeholder="Location"></x-input>
                                            <x-input-error for="tripLocation"/>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                        @foreach ($trip->trip_data as $key => $value)

                            @if ($key != "supportWorker" && $key != "emotionalSupport" && $key != "quote" && $key != "startDate" && $key != "endDate" && $key != "location")
                                <div class="py-6 border-b border-gray-200 px-5">
                                    <div class="flex">
                                        <div class="flex flex-col w-60">
                                            <div
                                                class="text-sm text-gray-500">{{$this->camelCaseToFriendlyName($key)}}</div>
                                        </div>


                                        @if (!$isEditing)
                                            <div class="flex items-center w-full">
                                                <div class="text-base text-gray-900">{{$value}}</div>
                                            </div>
                                        @else
                                            <div class="block pb-4 w-full">
                                                <x-input wire:model.lazy="trip.trip_data.{{$key}}"
                                                         class="w-full"
                                                         placeholder="{{$this->camelCaseToFriendlyName($key)}}"></x-input>
                                                <x-input-error for="TripData.{{$key}}"/>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{--                    <div x-show="tab === 'Updates'">--}}
                    {{--                        <h2 class="mt-5">Trip Updates</h2>--}}

                    {{--                    </div>--}}

                    <div x-show="tab === 'Budget'">
                        <h2 class="mt-5">Trip Quote</h2>

                        @if (isset($trip->trip_data['quote']))
                            <div class="py-6 border-b border-gray-200 px-5">
                                <div class="flex">
                                    <div class="flex flex-col w-60">
                                        <div class="text-sm text-gray-500">Number of Nights</div>
                                    </div>


                                    <div class="flex items-center w-full">
                                        <div
                                            class="text-base text-gray-900">{{$trip->trip_data['quote']['numberOfNights']}}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="py-6 border-b border-gray-200 px-5">
                                <div class="flex">
                                    <div class="flex flex-col w-60">
                                        <div class="text-sm text-gray-500">Support Worker Preference</div>
                                    </div>


                                    <div class="flex items-center w-full">
                                        <div
                                            class="text-base text-gray-900">{{$trip->trip_data['quote']['supportWorkerPreference']}}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="py-6 border-b border-gray-200 px-5">
                                <div class="flex">
                                    <div class="flex flex-col w-60">
                                        <div class="text-sm text-gray-500">Receive Support From Roar</div>
                                    </div>


                                    <div class="flex items-center w-full">
                                        <div
                                            class="text-base text-gray-900">{{$trip->trip_data['quote']['receiveSupportFromRoar']}}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="py-6 border-b border-gray-200 px-5">
                                <div class="flex">
                                    <div class="flex flex-col w-60">
                                        <div class="text-sm text-gray-900">Quote Details</div>
                                    </div>


                                    <div class="flex items-center w-full">
                                        @if (isset($trip->trip_data['quote']['details']))
                                            <div class="text-base text-gray-900">
                                                ${{$trip->trip_data['quote']['details']}}</div>
                                        @else
                                            <div class="text-base text-gray-900">No quote details provided
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endif

                        @if (auth()->user()->isAdmin())
                            <h2 class="mt-5">Enter Budget</h2>
                            <div class="text-gray-500">Budget is only editable by Roar Staff, but is
                                viewable by all users
                            </div>
                            <textarea wire:model="trip.budget"
                                      class="mt-4 w-full h-64 border border-gray-300 rounded-md"></textarea>
                            <div class="flex justify-end mt-5">
                                <x-button wire:click="updateBudget">Update Budget</x-button>
                            </div>
                        @else
                            @if ($trip->budget === "")
                                <div class="bg-gray-50 mt-10 p-3 text-center text-gray-900">Budget to be
                                    updated by STA staff, check back soon
                                </div>
                            @else
                                <div class="bg-gray-50 mt-10 p-3 text-center text-gray-900">Budget updated
                                    by STA staff
                                </div>
                                {{$trip->budget}}
                            @endif
                        @endif


                    </div>

                    @if (!auth()->user()->isParticipant($trip))
                        <div x-show="tab === 'Incidents'">
                            <h2 class="mt-5">Incident Reports</h2>

                            @if ($trip->incidentReports->count() === 0)
                                <div class="bg-gray-50 mt-10 p-3 text-center text-gray-900">No incident
                                    reports have been submitted
                                </div>
                            @else
                                @foreach ($trip->incidentReports as $incident)
                                    <div class="py-6 border-b border-gray-200 px-5">
                                        <div class="flex-col divide-gray-200">
                                            <div
                                                class="text-sm text-gray-900">{{$incident->incident_data['incident']}}</div>
                                            <div class="text-sm text-gray-500 mt-3">
                                                <b>Date:</b> {{$incident->incident_data['date']}}</div>
                                            <div class="text-sm text-gray-500">
                                                <b>Participant:</b> {{$incident->participant->first_name}} {{$incident->participant->last_name}}
                                            </div>
                                            <div class="text-sm text-gray-500"><b>Submitted
                                                    By:</b> {{$incident->submittedBy->first_name}} {{$incident->submittedBy->last_name}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="mt-10 border border-gray-200 rounded p-4">
                                <h3 class="text-lg font-medium text-gray-900 leading-5">Submit Incident
                                    Report</h3>
                                <x-label class="mt-4">Select participant that this report relates to
                                </x-label>
                                <select wire:model="incident_participant"
                                        class="w-full border border-gray-300 rounded-md">
                                    <option value="">Select Participant</option>
                                    @foreach ($trip->participants as $participant)
                                        <option
                                            value="{{$participant->id}}">{{$participant->first_name}} {{$participant->last_name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="incident_participant" class="mt-2"/>

                                <x-label class="mt-4">Incident Date</x-label>
                                <input wire:model="incident_date" type="date"
                                       class="w-full border border-gray-300 rounded-md">
                                <x-input-error for="incident_date" class="mt-2"/>

                                <div class="mt-1">
                                    <x-label class="mt-4">Incident Details</x-label>
                                    <textarea wire:model="incident"
                                              class="w-full border border-gray-300 rounded-md"></textarea>
                                    <x-input-error for="incident" class="mt-2"/>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <x-button wire:click="submitIncident">Submit Incident</x-button>
                                </div>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
