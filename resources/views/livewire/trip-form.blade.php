<div class="mt-10">
    <form wire:submit.prevent="submitForm">
        <div class="mx-auto max-w-6xl flex flex-row-reverse">
            <div class="w-2/6 px-6 ">
                <h3 class="text-gray-900 text-xl leading-7 font-bold">New Booking Request</h3>

                <div class="flex flex-col mt-4 hover:cursor-pointer" wire:click="changeStep('quote')">
                    <div
                        class="border-l-[3px] @if($currentStep == 'quote')border-sky-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'quote')text-sky-500 @else text-gray-500 @endif ">
                                Step 1
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Quote</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4 hover:cursor-pointer" wire:click="changeStep('your-details')">
                    <div
                        class="border-l-[3px] @if($currentStep == 'your-details')border-sky-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'your-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 2
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Your Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4 hover:cursor-pointer" wire:click="changeStep('trip-details')">
                    <div
                        class="border-l-[3px] @if($currentStep == 'trip-details')border-sky-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'trip-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 3
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Trip Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4 hover:cursor-pointer" wire:click="changeStep('medical-details')">
                    <div
                        class="border-l-[3px] @if($currentStep == 'medical-details')border-sky-500 @else border-gray-500 @endif flex">
                        <div class="pl-2 py-1 flex flex-col justify-center">
                            <div
                                class="text-xs leading-4 font-semibold tracking-wide uppercase  @if($currentStep == 'medical-details')text-sky-500 @else text-gray-500 @endif ">
                                Step 4
                            </div>
                            <div class="text-sm leading-5 font-medium text-gray-900">Medical Details</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4 hover:cursor-pointer" wire:click="changeStep('summary')">
                    <div
                        class="border-l-[3px] @if($currentStep == 'summary')border-sky-500 @else border-gray-500 @endif flex">
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
                <div class="w-4/6">
                    <div class="pb-4 border-b border-gray-200">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Quote</h2>
                        <div class="text-sm leading-5 font-normal text-gray-500">Respite/Short Term Accommodation
                            includes
                            accommodation, food and activities anywhere in Australia!
                        </div>
                    </div>


                    <div class="block mt-6 border-b border-gray-200 pb-4">
                        <x-label>Number of Nights</x-label>
                        <x-input wire:model="numberOfNights" class="w-full mt-2"
                                 placeholder="Number of Nights"></x-input>
                    </div>

                    <div class="block mt-6 border-b border-gray-200 pb-4">
                        <x-label>You can plan your own STA, or have a Roar Agency Consultant plan it for you.</x-label>
                        <div class="flex flex-col mt-2">
                            <label>
                                <input type="radio" wire:model="supportWorkerPreference"
                                       value="Bring your own support worker">
                                Bring your own support worker
                            </label>
                            <label>
                                <input type="radio" wire:model="supportWorkerPreference"
                                       placeholder="Supported by Roar Agency">
                                Supported by Roar Agency
                            </label>
                        </div>
                    </div>

                    <div class="w-full mt-6 bg-sky-50 p-3">
                        <div class="text-sky-900 text-lg leading-6 font-medium">STA Cost Breakdown</div>
                        <div class="text-gray-700 text-sm leading-5 font-normal">${{$quoteAmount}} will be spent on
                            food,
                            accommodation, and activities. The remainder of the invoice is Support Worker and Roar
                            Agency
                            fee.
                        </div>
                    </div>


                    <div class="block mt-6 border-b border-gray-200 pb-4">
                        <x-label>Do you currently receive ongoing weekly supports from Roar Agency?</x-label>
                        <div class="flex flex-col mt-2">
                            <label>
                                <input type="radio" wire:model="receiveSupportFromRoar" value="Yes"/>
                                Yes
                            </label>
                            <label>
                                <input type="radio" wire:model="receiveSupportFromRoar" value="No"/>
                                No
                            </label>
                        </div>
                    </div>


                    <div class="border-t border-gray-200">
                        <div class="flex justify-between pt-4">
                            @if (!$isGuest)
                                <div
                                    class="hover:cursor-pointer inline-flex px-3 py-2 border border-gray-300 rounded items-center justify-center text-sm leading-5 font-medium text-gray-700">
                                    <div wire:click="cancel">Cancel</div>
                                </div>
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
                                <input type="radio" wire:model="currentUserRoleForTrip" value="participant"/>
                                Participant
                            </label>
                            <label>
                                <input type="radio" wire:model="currentUserRoleForTrip" value="plan-nominee"/>
                                Plan Nominee
                            </label>
                            <label>
                                <input type="radio" wire:model="currentUserRoleForTrip" value="support-coordinator"/>
                                Support Coordinator
                            </label>
                            <label>
                                <input type="radio" wire:model="currentUserRoleForTrip" value="support-worker"/>
                                Support Worker
                            </label>
                        </div>
                    </div>

                    <h2>Participant</h2>
                    <x-input wire:model="participantFirstName" placeholder="First Name"></x-input>
                    <x-input wire:model="participantLastName" placeholder="Last Name"></x-input>
                    <x-input wire:model="participantTitle" placeholder="Title"></x-input>
                    <x-input wire:model="participantPronouns" placeholder="Pronouns"></x-input>
                    <x-input wire:model="participantEmailAddress" placeholder="Email Address"></x-input>
                    <x-input wire:model="participantContact" placeholder="Contact"></x-input>
                    <x-input wire:model="participantCity" placeholder="City"></x-input>
                    <x-input wire:model="participantState" placeholder="State"></x-input>
                    <x-input wire:model="participantPostCode" placeholder="Post Code"></x-input>
                    <x-checkbox wire:model="participantCompanionCard">Companion Card</x-checkbox>
                    <x-checkbox wire:model="participantSmoker">Smoker</x-checkbox>


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
        </div>


        <div class="hidden">
            <!-- Participant Section -->


            <!-- Medical Details Section -->
            <h3>Medical Details</h3>
            <x-input wire:model="participantMedicalDetailsDiagnosis" placeholder="Diagnosis"></x-input>
            <x-input wire:model="participantMedicalDetailsMedicalConditions" placeholder="Medical Conditions"></x-input>
            <x-input wire:model="participantMedicalDetailsPhysicalSupportNeeds"
                     placeholder="Physical Support Needs"></x-input>
            <x-input wire:model="participantMedicalDetailsMedication" placeholder="Medication"></x-input>
            <x-input wire:model="participantMedicalDetailsMedicalAdministration"
                     placeholder="Medical Administration"></x-input>
            <x-input wire:model="participantMedicalDetailsAllergies" placeholder="Allergies"></x-input>
            <x-checkbox wire:model="participantMedicalDetailsBehaviourSupportPlanOrForensicOrder">Behaviour Support Plan
                or
                Forensic
                Order
            </x-checkbox>

            <!-- Plan Nominee Section -->
            <h3>Plan Nominee</h3>
            <x-input wire:model="participantPlanNomineeFirstName" placeholder="First Name"></x-input>
            <x-input wire:model="participantPlanNomineeLastName" placeholder="Last Name"></x-input>
            <x-input wire:model="participantPlanNomineeEmail" placeholder="Email"></x-input>
            <x-input wire:model="participantPlanNomineeContact" placeholder="Contact"></x-input>

            <!-- Support Coordinator Section -->
            <h3>Support Coordinator</h3>
            <x-input wire:model="participantSupportCoordinatorFirstName" placeholder="First Name"></x-input>
            <x-input wire:model="participantSupportCoordinatorLastName" placeholder="Last Name"></x-input>
            <x-input wire:model="participantSupportCoordinatorEmail" placeholder="Email"></x-input>
            <x-input wire:model="participantSupportCoordinatorContact" placeholder="Contact"></x-input>

            <!-- Appointed Guardian Section -->
            <h3>Appointed Guardian</h3>
            <x-input wire:model="participantAppointedGuardianFirstName" placeholder="First Name"></x-input>
            <x-input wire:model="participantAppointedGuardianLastName" placeholder="Last Name"></x-input>
            <x-input wire:model="participantAppointedGuardianEmail" placeholder="Email"></x-input>
            <x-input wire:model="participantAppointedGuardianContact" placeholder="Contact"></x-input>

            <!-- Emergency Contact Section -->
            <h3>Emergency Contact</h3>
            <x-input wire:model="participantEmergencyContactFirstName" placeholder="First Name"></x-input>
            <x-input wire:model="participantEmergencyContactLastName" placeholder="Last Name"></x-input>
            <x-input wire:model="participantEmergencyContactContactNumber" placeholder="Contact Number"></x-input>
            <x-input wire:model="participantEmergencyContactEmail" placeholder="Email"></x-input>
            <x-input wire:model="participantEmergencyContactRelationship" placeholder="Relationship"></x-input>

            <!-- Trip Section -->
            <h2>Trip</h2>
            <x-input wire:model="tripLocation" placeholder="Location"></x-input>
            <x-input wire:model="tripAccommodationProvider" placeholder="Accommodation Provider"></x-input>
            <x-input wire:model="tripStartDate" placeholder="Start Date"></x-input>
            <x-input wire:model="tripEndDate" placeholder="End Date"></x-input>

            <!-- Support Worker Section -->
            <h3>Support Worker</h3>
            <x-input wire:model="tripSupportWorkerFirstName" placeholder="First Name"></x-input>
            <x-input wire:model="tripSupportWorkerLastName" placeholder="Last Name"></x-input>
            <x-input wire:model="tripSupportWorkerEmail" placeholder="Email"></x-input>
            <x-input wire:model="tripSupportWorkerContact" placeholder="Contact"></x-input>

            <!-- Emotional Support Section -->
            <h3>Emotional Support</h3>
            <x-input wire:model="tripEmotionalSupportName" placeholder="Name"></x-input>
            <x-input wire:model="tripEmotionalSupportRelationship" placeholder="Relationship"></x-input>
            <x-input wire:model="tripEmotionalSupportDateOfBirth" placeholder="Date of Birth"></x-input>

            <!-- Accommodation Details Section -->
            <x-input wire:model="tripNumberOfBedrooms" placeholder="Number of Bedrooms"></x-input>
            <x-checkbox wire:model="tripAccommodationAccessible">Accommodation Accessible</x-checkbox>
            <x-input wire:model="tripAccommodationAccessibleDetails"
                     placeholder="Accommodation Accessible Details"></x-input>
            <x-input wire:model="tripAccommodationRequests" placeholder="Accommodation Requests"></x-input>

            <!-- Submit Button -->
            <button wire:click="submit">Submit</button>
        </div>
    </form>
</div>
