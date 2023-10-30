<div class="flex w-full">
    <div class="w-3/4">
        <div class="max-w-6xl">
            <div class="flex justify-between border-b border-gray-200 pb-6">
                <h2 class="text-2xl font-semibold text-gray-900 inline-flex">{{$user->name}}</h2>
                <x-button wire:click="toggleEdit">Edit Profile</x-button>
            </div>

            <div x-data="{ tab: 'Details' }">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <select id="tabs" name="tabs"
                            class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                            x-model="tab">
                        <option>Profile Details</option>
                        <option>Medical Details</option>
                        @if ($currentUserIsAdmin)
                            <option>Trips</option>
                        @endif
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Details' }"
                               class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                               @click.prevent="tab = 'Details'">Profile Details</a>
                            <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Medical' }"
                               class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                               @click.prevent="tab = 'Medical'">Medical Details</a>
                            @if ($currentUserIsAdmin)
                                <a href="#" :class="{ 'border-sky-500 text-sky-600': tab === 'Medical' }"
                                   class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                   @click.prevent="tab = 'Trips'">Trips</a>
                            @endif
                        </nav>
                    </div>
                </div>


                <!-- Content Sections -->
                <div x-show="tab === 'Details'">
                    <div class="pt-6 pb-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium">Profile Details</h3>
                        <div class="text-sm font-medium text-gray-500 mt-1">
                            This information will used by default on all new STA Trips that you request.
                        </div>
                    </div>

                    @if (!$isEditing)
                        {{--  Name  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Name</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">{{$user->name}}</div>
                                </div>
                            </div>
                        </div>

                        {{--  Name  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Date of birth</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">{{$user->dateofbirth}}</div>
                                </div>
                            </div>
                        </div>

                        {{--  Email  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Email</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">{{$user->email}}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{--  Name  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Name</div>
                                </div>
                                <div class="flex flex-col">
                                    <x-input wire:model="user.name" class="mt-1 w-full"/>
                                    @error('user.name') <span
                                        class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{--  Name  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Date of birth</div>
                                </div>
                                <div class="flex flex-col">
                                    <x-input wire:model="user.dateofbirth" class="mt-1 w-full"/>
                                    @error('user.dateofbirth') <span
                                        class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{--  Email  --}}
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Email</div>
                                </div>
                                <div class="flex flex-col">
                                    <x-input wire:model="user.email" type="email" class="mt-1 w-full"/>
                                    @error('user.email') <span
                                        class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 justify-end">
                            <x-button wire:click="cancelEdit">Cancel</x-button>
                            <x-button wire:click="saveDetails">Save</x-button>
                        </div>
                    @endif
                </div>
                <div x-show="tab === 'Medical'">
                    <div class="pt-6 pb-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium">Medical Details</h3>
                        <div class="text-sm font-medium text-gray-500 mt-1">
                            This information will used by default on all new STA Trips that you request.
                        </div>
                    </div>

                    @if (!$isEditing)
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Diagnoses</div>
                                </div>
                                <div class="flex flex-col">
                                    @if ($numberDiagnosis === 0)
                                        <div class="text-sm text-gray-900">No Diagnosis</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            @foreach ($medicalDetails['diagnosis'] as $diagnosis)
                                                <div class="border-b border-gray-200 p-1">
                                                    {{$diagnosis}}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Medical Conditions</div>
                                </div>
                                <div class="flex flex-col">
                                    @if ($numberMedicalConditions === 0)
                                        <div class="text-sm text-gray-900">No Medical Conditions</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            @foreach ($medicalDetails['medicalConditions'] as $medicalCondition)
                                                <div class="border-b border-gray-200 p-1">
                                                    {{$medicalCondition}}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Medications</div>
                                </div>
                                <div class="flex flex-col">
                                    @if ($numberMedication === 0)
                                        <div class="text-sm text-gray-900">No Medications</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            @foreach ($medicalDetails['medication'] as $medicationItem)
                                                <div class="border-b border-gray-200 p-1">
                                                    {{$medicationItem}}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Allergies</div>
                                </div>
                                <div class="flex flex-col">
                                    @if ($numberAllergies === 0)
                                        <div class="text-sm text-gray-900">No Allergies</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            @foreach ($medicalDetails['allergies'] as $allergy)
                                                <div class="border-b border-gray-200 p-1">
                                                    {{$allergy}}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Physical Support Needs</div>
                                </div>
                                <div class="flex flex-col">
                                    @if (!isset($medicalDetails['physicalSupportNeeds']))
                                        <div class="text-sm text-gray-900">No Physical Support Needs</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            {{$medicalDetails['physicalSupportNeeds']}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Emergency Contact</div>
                                </div>
                                <div class="flex flex-col">
                                    @if (!isset($medicalDetails['emergencyContact']))
                                        <div class="text-sm text-gray-900">No Emergency Contact</div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            {{$medicalDetails['emergencyContact']['name']}}
                                            | {{$medicalDetails['emergencyContact']['phone']}}
                                            | {{$medicalDetails['emergencyContact']['relationship']}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Diagnoses</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">
                                        @if ($numberDiagnosis > 0)
                                            @foreach ($medicalDetails['diagnosis'] as $index => $diagnosis)
                                                <div
                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                    {{$diagnosis}}<a href="#"
                                                                     wire:click="removeItem('diagnosis', 'numberDiagnosis', {{$index}})"
                                                                     class="text-xs font-medium text-red-600">Remove</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                            <x-input wire:model="newItems.diagnosis" class="mt-1 w-full"/>
                                            @error('diagnosis') <span
                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                            <x-button wire:click="addItem('diagnosis', 'numberDiagnosis')" class="ml-1">
                                                Add
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Medical Conditions</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">
                                        @if ($numberMedicalConditions > 0)
                                            @foreach ($medicalDetails['medicalConditions'] as $index => $medicalCondition)
                                                <div
                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                    {{$medicalCondition}}<a href="#"
                                                                            wire:click="removeItem('medicalConditions', 'numberMedicalConditions', {{$index}})"
                                                                            class="text-xs font-medium text-red-600">Remove</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                            <x-input wire:model="newItems.medicalConditions" class="mt-1 w-full"/>
                                            @error('diagnosis') <span
                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                            <x-button
                                                wire:click="addItem('medicalConditions', 'numberMedicalConditions')"
                                                class="ml-1">Add
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Medications</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">
                                        @if ($numberMedication > 0)
                                            @foreach ($medicalDetails['medication'] as $index => $medicationItem)
                                                <div
                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                    {{$medicationItem}}<a href="#"
                                                                          wire:click="removeItem('medication', 'numberMedication', {{$index}})"
                                                                          class="text-xs font-medium text-red-600">Remove</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                            <x-input wire:model="newItems.medication" class="mt-1 w-full"/>
                                            @error('diagnosis') <span
                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                            <x-button wire:click="addItem('medication', 'numberMedication')"
                                                      class="ml-1">Add
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Allergies</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-900">
                                        @if ($numberAllergies > 0)
                                            @foreach ($medicalDetails['allergies'] as $index => $allergy)
                                                <div
                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                    {{$allergy}}<a href="#"
                                                                   wire:click="removeItem('allergies', 'numberAllergies', {{$index}})"
                                                                   class="text-xs font-medium text-red-600">Remove</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                            <x-input wire:model="newItems.allergies" class="mt-1 w-full"/>
                                            @error('diagnosis') <span
                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                            <x-button wire:click="addItem('allergies', 'numberAllergies')" class="ml-1">
                                                Add
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Physical Support Needs</div>
                                </div>
                                <div class="flex flex-col">
                                    <textarea wire:model="medicalDetails.physicalSupportNeeds"
                                              class="mt-1 w-full border border-gray-200 rounded"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="py-6 border-b border-gray-200 px-5">
                            <div class="flex">
                                <div class="flex flex-col w-60">
                                    <div class="text-sm text-gray-500">Emergency Contact</div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="mt-2 pb-1 border-b border-gray-200">
                                        <div class="text-sm text-gray-900">
                                            Name:
                                            <x-input wire:model="medicalDetails.emergencyContact.name"
                                                     class="mt-1 w-full"/>
                                        </div>
                                    </div>
                                    <div class="mt-2 pb-1 border-b border-gray-200">
                                        <div class="text-sm text-gray-900">
                                            Phone:
                                            <x-input wire:model="medicalDetails.emergencyContact.phone"
                                                     class="mt-1 w-full"/>
                                        </div>
                                    </div>
                                    <div class="mt-2 pb-1 border-b border-gray-200">
                                        <div class="text-sm text-gray-900">
                                            Relationship:
                                            <x-input wire:model="medicalDetails.emergencyContact.relationship"
                                                     class="mt-1 w-full"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 justify-end">
                            <x-button wire:click="cancelEdit">Cancel</x-button>
                            <x-button wire:click="saveMedical">Save</x-button>
                        </div>
                    @endif
                </div>

                @if ($currentUserIsAdmin)
                    <div x-show="tab === 'Trips'">
                        <div class="pt-6 pb-6 border-b border-gray-200">
                            <h3 class="text-lg font-medium">Trips</h3>
                            <div class="text-sm font-medium text-gray-500 mt-1">
                                All trips for this profile are displayed below
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if (!$currentUserIsAdmin)
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
    @endif
</div>
