<div class="mt-10">
    @if (!$showThanks)
        <div class="mx-auto max-w-6xl flex flex-row-reverse">
            <div class="w-2/6 px-6 ">
                <h3 class="text-gray-900 text-xl leading-7 font-bold">New Booking Request</h3>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'quote')border-sky-500 @elseif($pageHasError['quote'])border-red-500 @elseif($pageIsComplete['quote'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'quote')text-sky-500 @else text-gray-500 @endif ">
                                Step 1
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Quote</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'your-details')border-sky-500 @elseif($pageHasError['your-details'])border-red-500 @elseif($pageIsComplete['your-details'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'your-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 2
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Your Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'participant-details')border-sky-500 @elseif($pageHasError['participant-details'])border-red-500 @elseif($pageIsComplete['participant-details'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'participant-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 3
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Participant Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'trip-details')border-sky-500 @elseif($pageHasError['trip-details'])border-red-500 @elseif($pageIsComplete['trip-details'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'trip-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 4
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Trip Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'medical-details')border-sky-500 @elseif($pageHasError['medical-details'])border-red-500 @elseif($pageIsComplete['medical-details'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'medical-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 5
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Medical Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <div
                        class="border-l-[3px] @if($currentStep == 'summary')border-sky-500 @elseif($pageHasError['summary'])border-red-500 @elseif($pageIsComplete['summary'])border-green-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'summary')text-sky-500 @else text-gray-500 @endif ">
                                Step 5
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Summary</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quote Section -->
            @if ($currentStep == 'quote')
                <div class="w-4/6 px-3">
                    <div class="pb-4 border-b border-gray-200">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Quote</h2>
                        <div class="text-sm leading-5 font-normal text-gray-500">Respite/Short Term Accommodation
                            includes
                            accommodation, food and activities anywhere in Australia!
                        </div>
                    </div>


                    <div class="block mt-6 border-b border-gray-200 pb-4">
                        <x-label>Number of Nights</x-label>
                        <x-input wire:model.lazy="numberOfNights" class="w-full mt-2"
                                 type="number" placeholder="Number of Nights"></x-input>
                        <x-input-error for="numberOfNights"/>
                    </div>

                    <div class="block mt-6 border-b border-gray-200 pb-4">
                        <x-label>You can plan your own STA, or have a Roar Agency Consultant plan it for you.</x-label>
                        <div class="flex flex-col mt-2">
                            <label>
                                <input type="radio" wire:model.lazy="supportWorkerPreference"
                                       value="Bring your own support worker">
                                Bring your own support worker
                            </label>
                            <label>
                                <input type="radio" wire:model.lazy="supportWorkerPreference"
                                       value="Supported by Roar Agency">
                                Supported by Roar Agency
                            </label>
                        </div>
                        <x-input-error for="supportWorkerPreference"/>
                    </div>

                    @if (isset($supportWorkerPreference))
                        <div class="w-full mt-6 bg-sky-50 p-3">
                            <div class="text-sky-900 text-lg leading-6 font-medium">STA Cost Breakdown</div>
                            <div class="text-gray-700 text-sm leading-5 font-normal">
                                {{{$this->quoteBreakdown}}}
                            </div>
                        </div>
                    @endif

                    @if($supportWorkerPreference == 'Supported by Roar Agency')
                        <div class="block mt-6 border-b border-gray-200 pb-4">
                            <x-label>Do you currently receive ongoing weekly supports from Roar Agency?</x-label>
                            <div class="flex flex-col mt-2">
                                <label>
                                    <input type="radio" wire:model.lazy="receiveSupportFromRoar" value="Yes"/>
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" wire:model.lazy="receiveSupportFromRoar" value="No"/>
                                    No
                                </label>
                            </div>
                            <x-input-error for="receiveSupportFromRoar"/>
                        </div>
                    @endif

                    <div class="border-t border-gray-200">

                        @if (!$isGuest)
                            <div class="flex justify-between pt-4">
                                <div
                                    class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                    <div wire:click="cancel">Cancel</div>
                                </div>
                                @else
                                    <div class="flex justify-end pt-4">
                                        @endif
                                        <div
                                            class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                            <div wire:click="nextStep">Next</div>
                                        </div>
                                    </div>
                            </div>

                    </div>
                    @endif

                    @if ($currentStep == 'your-details')
                        <div class="w-4/6">
                            <div class="pb-4 border-b border-gray-200">
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Trip Participant Details</h2>
                            </div>

                            <div class="block mt-6 border-b border-gray-200 pb-4">
                                <x-label>Your role in this booking</x-label>
                                <div class="flex flex-col mt-2">
                                    <label>
                                        <input type="radio" wire:model.lazy="currentUserRoleForTrip" value="participant"/>
                                        Participant
                                    </label>
                                    <label>
                                        <input type="radio" wire:model.lazy="currentUserRoleForTrip" value="plan-nominee"/>
                                        Plan Nominee
                                    </label>
                                    <label>
                                        <input type="radio" wire:model.lazy="currentUserRoleForTrip"
                                               value="support-coordinator"/>
                                        Support Coordinator
                                    </label>
                                    <label>
                                        <input type="radio" wire:model.lazy="currentUserRoleForTrip"
                                               value="appointed-guardian"/>
                                        Appointed Guardian
                                    </label>
                                </div>
                                <x-input-error for="currentUserRoleForTrip"/>
                            </div>

                            <div class="block pb-4 w-full mt-10">
                                <x-label>Number of participants</x-label>
                                <x-input wire:model.lazy="numberOfParticipants" class="w-full"
                                         placeholder="Number of participants" type="number"></x-input>
                                <x-input-error for="numberOfParticipants"/>
                            </div>

                            @if ($isGuest)
                                <h2 class="mt-10 text-sm leading-5 font-medium">Your Details</h2>
                                <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200">
                                    <div class="block mt-6 pb-4 w-full">
                                        <x-label>First Name</x-label>
                                        <x-input wire:model.lazy="userFirstName" class="w-full"
                                                 placeholder="First Name"></x-input>
                                        <x-input-error for="userFirstName"/>
                                    </div>

                                    <div class="block pb-4 mt-6 w-full">
                                        <x-label>Last Name</x-label>
                                        <x-input wire:model.lazy="userLastName" class="w-full"
                                                 placeholder="Last Name"></x-input>
                                        <x-input-error for="userLastName"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Email</x-label>
                                        <x-input type="email" required wire:model.lazy="userEmail" class="w-full"
                                                 placeholder="Email Address"></x-input>
                                        <x-input-error for="userEmail"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Contact</x-label>
                                        <x-input type="text" required wire:model.lazy="userContact" class="w-full"
                                                 placeholder="Contact"></x-input>
                                        <x-input-error for="userContact"/>
                                    </div>
                                </div>
                            @endif

                            <div class="border-t border-gray-200">
                                <div class="flex justify-between pt-4">
                                    <div
                                        class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                        <div wire:click="previousStep">Previous</div>
                                    </div>

                                    <div
                                        class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                        <div wire:click="nextStep">Next</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($currentStep == 'participant-details')
                        <div class="w-4/6">
                            <div class="pb-4 border-b border-gray-200">
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Trip Participant Details</h2>
                            </div>

                            @for ($participantIdentifier = 1; $participantIdentifier <= $numberOfParticipants; $participantIdentifier++)

                                <h2 class="mt-10 text-sm leading-5 font-medium">
                                    Participant {{$participantIdentifier}}</h2>
                                <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200">
                                    <div class="block mt-6 pb-4 w-full">
                                        <x-label>First Name</x-label>
                                        <x-input wire:model.lazy="participant.{{ $participantIdentifier }}.firstName"
                                                 class="w-full"
                                                 placeholder="First Name"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.firstName"/>
                                    </div>

                                    <div class="block pb-4 mt-6 w-full">
                                        <x-label>Last Name</x-label>
                                        <x-input wire:model.lazy="participant.{{ $participantIdentifier }}.lastName"
                                                 class="w-full"
                                                 placeholder="Last Name"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.lastName"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Title</x-label>
                                        <x-input wire:model.lazy="participant.{{ $participantIdentifier }}.title"
                                                 class="w-full"
                                                 placeholder="Title"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.title"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Pronouns</x-label>
                                        <div class="flex w-full">
                                            <select wire:model.lazy="participant.{{ $participantIdentifier }}.pronouns"
                                                    class="block py-2.5 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:leading-6">
                                                <option hidden>Please select</option>
                                                <option value="he">he</option>
                                                <option value="she">she</option>
                                                <option value="they">they</option>
                                                <option value="prefer not to state">prefer not to state</option>
                                            </select>
                                        </div>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.pronouns"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Email</x-label>
                                        <x-input type="email" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.email"
                                                 class="w-full"
                                                 placeholder="Email Address" :disabled="isset($disableEmailChangeForParticipant[$participantIdentifier]) && $disableEmailChangeForParticipant[$participantIdentifier] == true"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.email"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Contact</x-label>
                                        <x-input type="text" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.contact"
                                                 class="w-full"
                                                 placeholder="Contact"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.contact"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Date of Birth</x-label>
                                        <x-input type="date" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.dateOfBirth"
                                                 class="w-full"
                                                 placeholder="Date of Birth"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.dateOfBirth"/>
                                    </div>

                                    <div></div>

                                    <div class="block pb-4 w-full">
                                        <x-label>City</x-label>
                                        <x-input type="text" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.city"
                                                 class="w-full"
                                                 placeholder="City"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.city"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>State</x-label>
                                        <x-input type="text" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.state"
                                                 class="w-full"
                                                 placeholder="State"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.state"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Postcode</x-label>
                                        <x-input type="text" required
                                                 wire:model.lazy="participant.{{ $participantIdentifier }}.postCode"
                                                 class="w-full"
                                                 placeholder="Postcode"></x-input>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.postCode"/>
                                    </div>
                                    <div></div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Do you have a companion card?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.companionCard"
                                                       value=Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.companionCard"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.companionCard"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Are you a smoker?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.smoker"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.smoker"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.smoker"/>
                                    </div>
                                </div>

                                <h2 class="mt-10 text-sm leading-5 font-medium border-b border-gray-200 pb-2">Plan
                                    Details /
                                    STA
                                    details</h2>
                                <div>
                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Do you have a plan nominee?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeApplicable"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeApplicable"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error
                                            for="participant.{{ $participantIdentifier }}.planNomineeApplicable"/>
                                    </div>
                                    @if (isset($this->participant[$participantIdentifier]['planNomineeApplicable']) &&
                                  $this->participant[$participantIdentifier]['planNomineeApplicable']  == 'Yes')
                                        <div class="text-sm leading-5 font-medium text-gray-500">Plan nominee details
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200 mt-4">
                                            <div class="block pb-4 w-full">
                                                <x-label>First Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeFirstName"
                                                    class="w-full"
                                                    placeholder="First Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planNomineeFirstName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Last Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeLastName"
                                                    class="w-full"
                                                    placeholder="Last Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planNomineeLastName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Email</x-label>
                                                <x-input type="email"
                                                         wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeEmail"
                                                         class="w-full"
                                                         placeholder="Last Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planNomineeEmail"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Contact</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.planNomineeContact"
                                                    class="w-full"
                                                    placeholder="Contact"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planNomineeContact"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Do you have a support coordinator?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorApplicable"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorApplicable"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error
                                            for="participant.{{ $participantIdentifier }}.supportCoordinatorApplicable"/>
                                    </div>
                                    @if (isset($this->participant[$participantIdentifier]['supportCoordinatorApplicable']) &&
                                  $this->participant[$participantIdentifier]['supportCoordinatorApplicable']  == 'Yes')
                                        <div class="text-sm leading-5 font-medium text-gray-500">Support Coordinator
                                            details
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200 mt-4">
                                            <div class="block pb-4 w-full">
                                                <x-label>First Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorFirstName"
                                                    class="w-full"
                                                    placeholder="First Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.supportCoordinatorFirstName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Last Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorLastName"
                                                    class="w-full"
                                                    placeholder="Last Name"></x-input>

                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.supportCoordinatorLastName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Email</x-label>
                                                <x-input type="email" required type="email"
                                                         wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorEmail"
                                                         class="w-full" placeholder="Email Address"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.supportCoordinatorEmail"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Contact</x-label>
                                                <x-input type="text" required
                                                         wire:model.lazy="participant.{{ $participantIdentifier }}.supportCoordinatorContact"
                                                         class="w-full" placeholder="Contact"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.supportCoordinatorContact"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Do you have an Appointed Guardian?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianApplicable"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianApplicable"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error
                                            for="participant.{{ $participantIdentifier }}.appointedGuardianApplicable"/>
                                    </div>
                                    @if (isset($this->participant[$participantIdentifier]['appointedGuardianApplicable']) &&
                                        $this->participant[$participantIdentifier]['appointedGuardianApplicable'] == 'Yes')
                                        <div class="text-sm leading-5 font-medium text-gray-500">Appointed Guardian
                                            details
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200 mt-4">
                                            <div class="block pb-4 w-full">
                                                <x-label>First Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianFirstName"
                                                    class="w-full"
                                                    placeholder="First Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.appointedGuardianFirstName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Last Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianLastName"
                                                    class="w-full"
                                                    placeholder="Last Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.appointedGuardianLastName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Email</x-label>
                                                <x-input type="email" required type="email"
                                                         wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianEmail"
                                                         class="w-full" placeholder="Email Address"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.appointedGuardianEmail"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Contact</x-label>
                                                <x-input type="text" required
                                                         wire:model.lazy="participant.{{ $participantIdentifier }}.appointedGuardianContact"
                                                         class="w-full" placeholder="Contact"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.appointedGuardianContact"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Plan Managed?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.planManaged"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.planManaged"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.planManaged"/>
                                    </div>
                                    @if (isset($this->participant[$participantIdentifier]['planManaged']) &&
                                        $this->participant[$participantIdentifier]['planManaged'] == 'Yes')
                                        <div class="text-sm leading-5 font-medium text-gray-500">Participant Plan
                                            Manager
                                            Details
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-4 divide-gray-200 mt-4">
                                            <div class="block pb-4 w-full">
                                                <x-label>Plan Manager Full Name</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.planManagerFullName"
                                                    class="w-full"
                                                    placeholder="Full Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planManagerFullName"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Plan Manager Email</x-label>
                                                <x-input
                                                    wire:model.lazy="participant.{{ $participantIdentifier }}.planManagerEmail"
                                                    class="w-full"
                                                    placeholder="Last Name"></x-input>
                                                <x-input-error
                                                    for="participant.{{ $participantIdentifier }}.planManagerEmail"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Self Managed?</x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.selfManaged"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio"
                                                       wire:model.lazy="participant.{{ $participantIdentifier }}.selfManaged"
                                                       value="No">
                                                No
                                            </label>
                                        </div>
                                        <x-input-error for="participant.{{ $participantIdentifier }}.selfManaged"/>
                                    </div>
                                    @if (isset($this->participant[$participantIdentifier]['selfManaged']) &&
                                    $this->participant[$participantIdentifier]['selfManaged'] == 'Yes')
                                        <div class="block pb-4 w-full">
                                            <x-label>Please provide email address if different to above</x-label>
                                            <x-input
                                                wire:model.lazy="participant.{{ $participantIdentifier }}.selfManagedEmail"
                                                class="w-full"
                                                placeholder="Email"></x-input>
                                            <x-input-error
                                                for="participant.{{ $participantIdentifier }}.selfManagedEmail"/>
                                        </div>
                                    @endif
                                </div>
                            @endfor

                            <div class="border-t border-gray-200">
                                <div class="flex justify-between pt-4">
                                    <div
                                        class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                        <div wire:click="previousStep">Previous</div>
                                    </div>

                                    <div
                                        class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                        <div wire:click="nextStep">Next</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($currentStep == 'trip-details')
                        <div class="w-4/6 px-3">
                            <div class="pb-4 border-b border-gray-200">
                                <h2 class="text-lg leading-6 font-medium text-gray-900">Trip Details</h2>
                            </div>

                            <div class="border-b pb-4 border-gray-200">
                                <div class="block pb-4 mt-6 w-full">
                                    <x-label>Preferred Location</x-label>
                                    <x-input wire:model.lazy="tripLocation" class="w-full"
                                             placeholder="Preferred Location"></x-input>
                                    <x-input-error for="tripLocation"/>
                                </div>

                                <div class="block pb-4 w-full">
                                    <x-label>Preferred Accommodation Provider</x-label>
                                    <x-input wire:model.lazy="tripAccommodationProvider" class="w-full"
                                             placeholder="Accomdation Provider"></x-input>
                                    <x-input-error for="tripAccommodationProvider"/>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-6">
                                    <div class="block pb-4 w-full">
                                        <x-label>Preferred Start Date</x-label>
                                        <x-input wire:model.lazy="tripStartDate" class="w-full" type="date"
                                                 placeholder="Start Date"></x-input>
                                        <x-input-error for="tripStartDate"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Preferred End Date</x-label>
                                        <x-input wire:model.lazy="tripEndDate" class="w-full" type="date"
                                                 placeholder="End Date"></x-input>
                                        <x-input-error for="tripEndDate"/>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b pb-4 border-gray-200">
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <div class="block pb-4 mt-6 w-full">
                                        <x-label>Support Worker First Name</x-label>
                                        <x-input wire:model.lazy="tripSupportWorkerFirstName" class="w-full"
                                                 placeholder="Support Worker First Name"></x-input>
                                        <x-input-error for="tripSupportWorkerFirstName"/>
                                    </div>

                                    <div class="block pb-4 mt-6 w-full">
                                        <x-label>Support Worker Last Name</x-label>
                                        <x-input wire:model.lazy="tripSupportWorkerLastName" class="w-full"
                                                 placeholder="Support Worker Last Name"></x-input>
                                        <x-input-error for="tripSupportWorkerLastName"/>
                                    </div>

                                    <div class="block pb-4 w-full">
                                        <x-label>Support Worker Contact</x-label>
                                        <x-input wire:model.lazy="tripSupportWorkerContact" class="w-full"
                                                 placeholder="Support Worker Contact"></x-input>
                                        <x-input-error for="tripSupportWorkerContact"/>
                                    </div>
                                    <div class="block pb-4 w-full">
                                        <x-label>Support Worker Email</x-label>
                                        <x-input wire:model.lazy="tripSupportWorkerEmail" type="email" class="w-full"
                                                 placeholder="Support Worker Email"></x-input>
                                        <x-input-error for="tripSupportWorkerEmail"/>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-4">
                                <div class="block pb-4 w-full mt-6">
                                    <x-label>Do you need emotional support?</x-label>
                                    <div class="flex flex-col mt-2">
                                        <label>
                                            <input type="radio" wire:model.lazy="tripEmotionalSupportRequired"
                                                   value="Yes">
                                            Yes
                                        </label>
                                        <label>
                                            <input type="radio" wire:model.lazy="tripEmotionalSupportRequired"
                                                   value="No">
                                            No
                                        </label>
                                        <x-input-error for="tripEmotionalSupportRequired"/>
                                    </div>
                                    @if ($tripEmotionalSupportRequired == 'Yes')
                                        <div class="grid sm:grid-cols-2 gap-6">
                                            <div class="block pb-4 mt-6 w-full">
                                                <x-label>Emotional Support Name</x-label>
                                                <x-input wire:model.lazy="tripEmotionalSupportName" class="w-full"
                                                         placeholder="Emotional Support Name"></x-input>
                                                <x-input-error for="tripEmotionalSupportName"/>
                                            </div>

                                            <div class="block pb-4 mt-6 w-full">
                                                <x-label>Emotional Support Relationship</x-label>
                                                <x-input wire:model.lazy="tripEmotionalSupportRelationship" class="w-full"
                                                         placeholder="Emotional Support Relationship"></x-input>
                                                <x-input-error for="tripEmotionalSupportRelationship"/>
                                            </div>

                                            <div class="block pb-4 w-full">
                                                <x-label>Emotional Support Date of Birth</x-label>
                                                <x-input wire:model.lazy="tripEmotionalSupportDateOfBirth" class="w-full"
                                                         placeholder="Emotional Support Date of Birth"
                                                         type="date"></x-input>
                                                <x-input-error for="tripEmotionalSupportDateOfBirth"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <div class="pb-4 border-b mt-4 border-gray-200">
                                        <h2 class="text-lg leading-6 font-medium text-gray-900">Accommodations</h2>
                                    </div>

                                    <div class="block pb-4 w-full mt-10">
                                        <x-label>Number of bedrooms</x-label>
                                        <x-input wire:model.lazy="tripNumberOfBedrooms" class="w-full"
                                                 placeholder="Number of bedrooms" type="number"></x-input>
                                        <x-input-error for="tripNumberOfBedrooms"/>
                                    </div>

                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Do you require the accommodation to be accessible or have specific
                                            modifications?
                                        </x-label>
                                        <div class="flex flex-col mt-2">
                                            <label>
                                                <input type="radio" wire:model.lazy="tripAccommodationAccessible"
                                                       value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="radio" wire:model.lazy="tripAccommodationAccessible"
                                                       value="No">
                                                No
                                            </label>
                                            <x-input-error for="tripAccommodationAccessible"/>
                                        </div>
                                        @if ($tripAccommodationAccessible == 'Yes')
                                            <div class="block pb-4 mt-6 w-full">
                                                <x-label>Please specify</x-label>
                                                <x-input wire:model.lazy="tripAccommodationAccessibleDetails"
                                                         class="w-full"></x-input>
                                                <x-input-error for="tripAccommodationAccessibleDetails"/>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="block pb-4 w-full mt-6">
                                        <x-label>Do you have any requests?</x-label>
                                        <x-input wire:model.lazy="tripAccommodationRequests" class="w-full"
                                                 type="text"></x-input>
                                        <x-input-error for="tripAccommodationRequests"/>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200">
                                    <div class="flex justify-between pt-4">
                                        <div
                                            class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                            <div wire:click="previousStep">Previous</div>
                                        </div>

                                        <div
                                            class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                            <div wire:click="nextStep">Next</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endif

                            @if ($currentStep == 'medical-details')
                                <div class="w-4/6 px-3">
                                    <div class="pb-4 border-b border-gray-200">
                                        <h2 class="text-lg leading-6 font-medium text-gray-900">Participant Medical
                                            Details</h2>
                                    </div>

                                    @for ($participantIdentifier = 1; $participantIdentifier <= $numberOfParticipants; $participantIdentifier++)

                                        <div class="pb-4 mt-4 border-b border-gray-200">
                                            <h2 class="text-lg leading-6 font-medium text-gray-900">
                                                Participant {{$participantIdentifier}}</h2>

                                            @if (isset($hideMedicalDetailsFor[$participantIdentifier]) && $hideMedicalDetailsFor[$participantIdentifier] == true)
                                                <div class="text-center text-sky-900 p-3 bg-sky-50 block mt-10">
                                                    Medical Details have been pre-populated from the participant's
                                                    profile.
                                                </div>
                                            @else

                                                <div class="py-6 border-b border-gray-200 ">
                                                    <x-label>Diagnoses</x-label>
                                                    <div class="text-sm text-gray-900">
                                                        @if (isset($participant[$participantIdentifier]['medicalDetails']['diagnosis']) && count($participant[$participantIdentifier]['medicalDetails']['diagnosis']) > 0)
                                                            @foreach ($participant[$participantIdentifier]['medicalDetails']['diagnosis'] as $index => $diagnosis)
                                                                <div
                                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                                    {{$diagnosis}}<a href="#"
                                                                                     wire:click="removeMedicalItem('{{$participantIdentifier}}', 'diagnosis', {{$index}})"
                                                                                     class="text-xs font-medium text-red-600">Remove</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div
                                                            class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                                            <x-input
                                                                wire:model="participant.{{ $participantIdentifier }}.medicalDetails.newItems.diagnosis"
                                                                class="mt-1 w-full"/>
                                                            @error('diagnosis') <span
                                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                                            <x-button
                                                                wire:click="addMedicalItem('{{$participantIdentifier}}', 'diagnosis')"
                                                                class="ml-1">
                                                                Add
                                                            </x-button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="py-6 border-b border-gray-200 ">
                                                    <x-label>Medical Conditions</x-label>

                                                    <div class="text-sm text-gray-900">
                                                        @if (isset($participant[$participantIdentifier]['medicalDetails']['medicalConditions']) && count($participant[$participantIdentifier]['medicalDetails']['medicalConditions']) > 0)
                                                            @foreach ($participant[$participantIdentifier]['medicalDetails']['medicalConditions'] as $index => $medicalCondition)
                                                                <div
                                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                                    {{$medicalCondition}}<a href="#"
                                                                                            wire:click="removeMedicalItem('{{$participantIdentifier}}', 'medicalConditions', {{$index}})"
                                                                                            class="text-xs font-medium text-red-600">Remove</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div
                                                            class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                                            <x-input
                                                                wire:model="participant.{{ $participantIdentifier }}.medicalDetails.newItems.medicalConditions"
                                                                class="mt-1 w-full"/>
                                                            @error('diagnosis') <span
                                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                                            <x-button
                                                                wire:click="addMedicalItem('{{$participantIdentifier}}', 'medicalConditions')"
                                                                class="ml-1">Add
                                                            </x-button>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="py-6 border-b border-gray-200 ">
                                                    <x-label>Medications</x-label>
                                                    <div class="text-sm text-gray-900">
                                                        @if (isset($participant[$participantIdentifier]['medicalDetails']['medication']) && count($participant[$participantIdentifier]['medicalDetails']['medication']) > 0)
                                                            @foreach ($participant[$participantIdentifier]['medicalDetails']['medication'] as $index => $medicationItem)
                                                                <div
                                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                                    {{$medicationItem}}<a href="#"
                                                                                          wire:click="removeMedicalItem('{{$participantIdentifier}}', 'medication', {{$index}})"
                                                                                          class="text-xs font-medium text-red-600">Remove</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div
                                                            class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                                            <x-input
                                                                wire:model="participant.{{ $participantIdentifier }}.medicalDetails.newItems.medication"
                                                                class="mt-1 w-full"/>
                                                            @error('diagnosis') <span
                                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                                            <x-button
                                                                wire:click="addMedicalItem('{{$participantIdentifier}}', 'medication')"
                                                                class="ml-1">Add
                                                            </x-button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="block mt-6 border-b border-gray-200 pb-4">
                                                    <x-label>Medication Administration</x-label>
                                                    <div class="flex flex-col mt-2">
                                                        <label>
                                                            <input type="radio"
                                                                   wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.medicationAdministration"
                                                                   value="Self Administered"/>
                                                            Self Administered
                                                        </label>
                                                        <label>
                                                            <input type="radio"
                                                                   wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.medicationAdministration"
                                                                   value="Need help with administering medicine"/>
                                                            Need help with administering medicine
                                                        </label>
                                                    </div>
                                                    <x-input-error
                                                        for="participant.{{ $participantIdentifier }}.medicalDetails.medicationAdministration"/>
                                                </div>

                                                <div class="py-6 border-b border-gray-200 ">
                                                    <x-label>Allergies</x-label>
                                                    <div class="text-sm text-gray-900">
                                                        @if (isset($participant[$participantIdentifier]['medicalDetails']['allergies']) && count($participant[$participantIdentifier]['medicalDetails']['allergies']) > 0)
                                                            @foreach ($participant[$participantIdentifier]['medicalDetails']['allergies'] as $index => $allergy)
                                                                <div
                                                                    class="border-b border-gray-200 p-1 flex justify-between items-center">
                                                                    {{$allergy}}<a href="#"
                                                                                   wire:click="removeMedicalItem('{{$participantIdentifier}}', 'allergies', {{$index}})"
                                                                                   class="text-xs font-medium text-red-600">Remove</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div
                                                            class="border-b border-gray-200 p-1 flex items-center justify-evenly">
                                                            <x-input
                                                                wire:model="participant.{{ $participantIdentifier }}.medicalDetails.newItems.allergies"
                                                                class="mt-1 w-full"/>
                                                            @error('diagnosis') <span
                                                                class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                                                            <x-button
                                                                wire:click="addMedicalItem('{{$participantIdentifier}}', 'allergies')"
                                                                class="ml-1">
                                                                Add
                                                            </x-button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="py-6 border-b border-gray-200 ">
                                                    <x-label>Physical Support needs</x-label>
                                                    <textarea
                                                        wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.physicalSupportNeeds"
                                                        class="mt-1 w-full border border-gray-200 rounded"></textarea>
                                                    <x-input-error
                                                        for="participant.{{ $participantIdentifier }}.medicalDetails.physicalSupportNeeds"/>

                                                </div>

                                                <div class="block mt-6 border-b border-gray-200 pb-4">
                                                    <x-label>Do you have a Behaviour Support Plan or Forensic Order in
                                                        Place?
                                                    </x-label>
                                                    <div class="flex flex-col mt-2">
                                                        <label>
                                                            <input type="radio"
                                                                   wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.behaviourSupportPlan"
                                                                   value="Yes"/>
                                                            Yes
                                                        </label>
                                                        <label>
                                                            <input type="radio"
                                                                   wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.behaviourSupportPlan"
                                                                   value="No"/>
                                                            No
                                                        </label>
                                                    </div>
                                                    <x-input-error
                                                        for="participant.{{ $participantIdentifier }}.medicalDetails.behaviourSupportPlan"/>
                                                </div>

                                                <div class="py-6 border-b border-gray-200 ">
                                                    <div class="md:grid-cols-2 md:grid md:gap-6">
                                                        <div class="block pb-4 w-full">
                                                            <x-label>Emergency contact name</x-label>
                                                            <x-input
                                                                wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.name"
                                                                class="mt-1 w-full"/>
                                                            <x-input-error
                                                                for="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.name"/>
                                                        </div>

                                                        <div class="block pb-4 w-full">
                                                            <x-label>Emergency contact phone</x-label>
                                                            <x-input
                                                                wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.phone"
                                                                class="mt-1 w-full"/>
                                                            <x-input-error
                                                                for="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.phone"/>
                                                        </div>

                                                        <div class="block pb-4 w-full">
                                                            <x-label>Emergency contact relationship</x-label>
                                                            <x-input
                                                                wire:model.lazy="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.relationship"
                                                                class="mt-1 w-full"/>
                                                            <x-input-error
                                                                for="participant.{{ $participantIdentifier }}.medicalDetails.emergencyContact.relationship"/>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endfor
                                                <div class="border-t border-gray-200">
                                                    <div class="flex justify-between pt-4">
                                                        <div
                                                            class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                                            <div wire:click="previousStep">Previous</div>
                                                        </div>

                                                        <div
                                                            class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                                            <div wire:click="nextStep">Next</div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        @endif


                                        @if ($currentStep == 'summary')
                                            <div class="w-4/6 px-3">
                                                <div class="pb-4 border-b border-gray-200">
                                                    <h2 class="text-lg leading-6 font-medium text-gray-900">Summary</h2>
                                                </div>
                                                <div class="py-6 border-b border-gray-200 ">
                                                    <div class="leading-5 font-medium text-gray-500">Participants</div>
                                                    @foreach ($this->participant as $participantIdentifier => $participant)
                                                        <div class="block pb-4 w-full mt-6">
                                                            <x-label>Participant 1</x-label>

                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-900">{{ $this->participant[$participantIdentifier]['firstName'] }} {{ $this->participant[$participantIdentifier]['lastName'] }}</div>
                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-500">{{ $this->participant[$participantIdentifier]['email'] }}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="py-6 border-b border-gray-200 ">
                                                    <div class="leading-5 font-medium text-gray-500">Support Workers
                                                    </div>

                                                    <div class="block pb-4 w-full mt-6">
                                                        <x-label>Support Worker 1</x-label>
                                                        <div
                                                            class="text-base pt-2 font-medium leading-5 text-gray-900">{{$tripSupportWorkerFirstName}} {{$tripSupportWorkerLastName}}</div>
                                                        <div
                                                            class="text-base pt-2 font-medium leading-5 text-gray-500">{{$tripSupportWorkerEmail}}</div>
                                                    </div>
                                                </div>
                                                <div class="py-6 border-b border-gray-200 ">
                                                    <div class="leading-5 font-medium text-gray-500">Trip Details</div>

                                                    <div class="grid sm:grid-cols-2 gap-6">
                                                        <div class="block pb-4 w-full mt-6">
                                                            <x-label>Preferred Location</x-label>
                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-900">{{$tripLocation}}</div>
                                                        </div>

                                                        <div class="block pb-4 w-full mt-6">
                                                            <x-label>Preferred Accommodation Provider</x-label>
                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-900">{{$tripAccommodationProvider}}</div>
                                                        </div>

                                                        <div class="block pb-4 w-full">
                                                            <x-label>Preferred Start Date</x-label>
                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-900">{{$tripStartDate}}</div>
                                                        </div>

                                                        <div class="block pb-4 w-full">
                                                            <x-label>Preferred End Date</x-label>
                                                            <div
                                                                class="text-base pt-2 font-medium leading-5 text-gray-900">{{$tripEndDate}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="border-t border-gray-200">
                                                        <div class="flex justify-between pt-4">
                                                            <div
                                                                class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                                                <div wire:click="previousStep">Previous</div>
                                                            </div>

                                                            <div
                                                                class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                                                <div wire:click="submit">Submit</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>


                                            <div class="hidden">
                                                <button wire:click="submit">Submit
                                                    <div wire:loading>
                                                        Submitting trip...
                                                    </div>
                                                </button>
                                            </div>
                                </div>
                        </div>
                </div>
        </div>
    @else
        <div class="flex justify-center items-center h-screen">
            <div class="text-center">
                <h1 class="text-3xl font-bold">Thank you, we've received your trip request</h1>
                <div>We'll be in touch soon with more information.</div>
            </div>
        </div>
    @endif
</div>
