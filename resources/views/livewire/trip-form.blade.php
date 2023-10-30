<div>
    <form wire:submit.prevent="submitForm">
        <div class="container mx-auto">
            <div class="flex w-3/5 p-4">
                <div class="space-y-12 sm:space-y-16 ">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Quote</h2>
                        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Respite/Short Term Accommodation
                            includes accommodation, food and activities anywhere in Australia!</p>

                        {{-- Quote - how many nights --}}
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="nights" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">How
                                many nights would you like to go for?</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <select id="nights" name="nights"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="1 night">1 night</option>
                                    <option value="2 nights">2 nights</option>
                                    <option value="3 nights">3 nights</option>
                                    <option value="4 nights">4 nights</option>
                                    <option value="5 nights">5 nights</option>
                                    <option value="6 nights">6 nights</option>
                                    <option value="7 nights">7 nights</option>
                                    <option value="7+ nights">7+ nights</option>
                                </select>
                            </div>
                        </div>


                        <fieldset>
                            <legend class="sr-only">You can plan your own STA, or have a Roar Agency Consultant plan it
                                for you.
                            </legend>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:py-6">
                                <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">You can
                                    plan your own STA, or have a Roar Agency Consultant plan it for you.
                                </div>
                                <div class="mt-4 sm:col-span-2 sm:mt-0">
                                    <div class="max-w-lg space-y-6">

                                        <div class="-space-y-px rounded-md bg-white">
                                            <!-- Checked: "z-10 border-sky-200 bg-sky-50", Not Checked: "border-gray-200" -->
                                            <label
                                                class="rounded-tl-md rounded-tr-md relative flex cursor-pointer border p-4 focus:outline-none">
                                                <input type="radio" name="privacy-setting" value="Public access"
                                                       class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-600 active:ring-2 active:ring-offset-2 active:ring-sky-600"
                                                       aria-labelledby="privacy-setting-0-label"
                                                       aria-describedby="privacy-setting-0-description">
                                                <span class="ml-3 flex flex-col">
        <!-- Checked: "text-sky-900", Not Checked: "text-gray-900" -->
        <span id="privacy-setting-0-label" class="block text-sm font-medium">Bring your own support worker</span>
                                                    <!-- Checked: "text-sky-700", Not Checked: "text-gray-500" -->
        <span id="privacy-setting-0-description"
              class="block text-sm">You can add your support worker to the trip later</span>
      </span>
                                            </label>
                                            <!-- Checked: "z-10 border-sky-200 bg-sky-50", Not Checked: "border-gray-200" -->
                                            <label class="relative flex cursor-pointer border p-4 focus:outline-none">
                                                <input type="radio" name="privacy-setting"
                                                       value="Bring your own support worker"
                                                       class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-600 active:ring-2 active:ring-offset-2 active:ring-sky-600"
                                                       aria-labelledby="privacy-setting-1-label"
                                                       aria-describedby="privacy-setting-1-description">
                                                <span class="ml-3 flex flex-col">
        <!-- Checked: "text-sky-900", Not Checked: "text-gray-900" -->
        <span id="privacy-setting-1-label" class="block text-sm font-medium">Supported by Roar Agency</span>
                                                    <!-- Checked: "text-sky-700", Not Checked: "text-gray-500" -->
        <span id="privacy-setting-1-description" class="block text-sm">Roar Agency will provide you with a support worker</span>
      </span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="sr-only">Do you currently receive ongoing weekly supports from Roar Agency?
                            </legend>
                            <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Do you
                                    currently receive ongoing weekly supports from Roar Agency?
                                </div>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="max-w-lg">
                                        <div class="mt-6 space-y-6">
                                            <div class="flex items-center gap-x-3">
                                                <input id="ongoing_supports" name="push-notifications" type="radio"
                                                       class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                <label for="ongoing_supports"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                            </div>
                                            <div class="flex items-center gap-x-3">
                                                <input id="ongoing_supports" name="push-notifications" type="radio"
                                                       class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                <label for="ongoing_supports"
                                                       class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="space-y-12 sm:space-y-16 ">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Trip Participant Details</h2>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Participants Details</p>


                            <!-- Trip Participants Details -->
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">First Name</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="first_name" id="first_name" autocomplete="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Last Name</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="first_name" id="first_name" autocomplete="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Preferred Title</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <select id="title" name="title"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="pronouns" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Preferred Pronouns</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <select id="title" name="pronouns"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="He">He</option>
                                        <option value="She">She</option>
                                        <option value="They">They</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Email Address</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="contact" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Contact Number</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="number" name="contact" id="contact" autocomplete="contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <fieldset>
                                <legend class="sr-only">Do you have a companion card?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Do you have a companion card?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="companion_card" name="companion_card" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="companion_card"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="companion_card" name="companion_card" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="companion_card"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="sr-only">Are you a participant of this trip?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Are you a participant of this trip?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="trip_participant" name="trip_participant" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="companion_card"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="trip_participant" name="trip_participant" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="trip_participant"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Plan Details / STA Details -->
                            <fieldset>
                                <legend class="sr-only">Do you have a plan nominee?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Do you have a plan nominee?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="plan_nominee" name="trip_participant" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="plan_nominee"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="plan_nominee" name="trip_participant" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="plan_nominee"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="nominee_name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Plan nominee name</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="nominee_name" id="nominee_name" autocomplete="nominee_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="nominee_contact" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Plan nominee contact</label>
                                <div class="mt-2 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="nominee_contact" id="nominee_contact" autocomplete="nominee_contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <fieldset>
                                <legend class="sr-only">Do you have a support coordinator?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Do you have a support coordinator?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="support_coordinator" name="support_coordinator" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="support_coordinator"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="plan_nominee" name="support_coordinator" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="support_coordinator"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="sr-only">Do you have an appointed guardian?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Do you have an appointed guardian?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="appointed_guardian" name="appointed_guardian" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="appointed_guardian"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="appointed_guardian" name="appointed_guardian" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="appointed_guardian"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="sr-only">Plan managed
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Plan managed
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="plan_management" name="plan_management" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="plan_management"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="plan_management" name="plan_management" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="plan_management"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="sr-only">Are you a smoker?
                                </legend>
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:py-6">
                                    <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Are you a smoker?
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg">
                                            <div class="mt-6 space-y-6">
                                                <div class="flex items-center gap-x-3">
                                                    <input id="smoker" name="smoker" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="smoker"
                                                           class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input id="smoker" name="smoker" type="radio"
                                                           class="h-4 w-4 border-gray-300 text-sky-600 focus:ring-sky-600">
                                                    <label for="smoker"
                                                           class="block text-sm font-medium leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="space-y-12 sm:space-y-16 ">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Trip Details</h2>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Participants Details</p>

                            <!-- Trip Details -->
                            <label for="location">Preferred Location</label>
                            <input type="text" id="location" name="location">

                            <label for="accommodation_provider">Preferred Accommodation Provider</label>
                            <input type="text" id="accommodation_provider" name="accommodation_provider">

                            <label for="sta_start_date">Preffered STA Start Date</label>
                            <input type="date" id="sta_start_date" name="sta_start_date">

                            <label for="sta_end_date">Preferred STA End Date</label>
                            <input type="date" id="sta_end_date" name="sta_end_date">

                            <label for="worker_first_name">Support Worker First Name</label>
                            <input type="text" id="worker_first_name" name="worker_first_name">

                            <label for="worker_last_name">Support Worker Last Name</label>
                            <input type="text" id="worker_last_name" name="worker_last_name">

                            <label for="worker_contact">Support Worker Contact Number</label>
                            <input type="text" id="worker_contact" name="worker_contact">

                            <!-- Emotional Support -->
                            <label>Do you need emotional support?</label>
                            <input type="radio" name="emotional_support" value="yes"> Yes
                            <input type="radio" name="emotional_support" value="no"> No

                            <label for="support_name">Emotional support name</label>
                            <input type="text" id="support_name" name="support_name">

                            <label for="support_relationship">Emotional support relationship</label>
                            <input type="text" id="support_relationship" name="support_relationship">

                            <label for="support_dob">Emotional support DOB</label>
                            <input type="text" id="support_dob" name="support_dob">

                            <!-- Accommodations -->
                            <label for="bedrooms">Number of bedrooms</label>
                            <select id="bedrooms" name="bedrooms">
                                <!-- You can populate options here. -->
                            </select>

                            <label>Do you require the accommodation to be accessible or have specific
                                modifications?</label>
                            <input type="radio" name="accessibility" value="yes"> Yes
                            <input type="radio" name="accessibility" value="no"> No

                            <label for="accessibility_requirements">Please specify accessibility or modification
                                requirements?</label>
                            <textarea id="accessibility_requirements" name="accessibility_requirements"></textarea>

                            <label for="other_requests">Do you have any other requests</label>
                            <textarea id="other_requests" name="other_requests"></textarea>

                            <!-- Participant medical details -->
                            <h3>Medical Information</h3>

                            <label for="diagnoses">Diagnoses</label>
                            <input type="text" id="diagnoses" name="diagnoses">

                            <label for="medical_conditions">Medical conditions</label>
                            <input type="text" id="medical_conditions" name="medical_conditions">

                            <label for="physical_support">Physical support needs</label>
                            <input type="text" id="physical_support" name="physical_support">

                            <label>Do you require medication?</label>
                            <input type="radio" name="require_medication" value="yes"> Yes
                            <input type="radio" name="require_medication" value="no"> No

                            <label for="medications">Medications</label>
                            <input type="text" id="medications" name="medications">

                            <label>Medication Administration</label>
                            <input type="radio" name="medication_administration" value="self_administered"> Self
                            administered
                            <input type="radio" name="medication_administration" value="help_needed"> Need help with
                            administering medicine

                            <label>Do you have any alergies?</label>
                            <input type="radio" name="have_allergies" value="yes"> Yes
                            <input type="radio" name="have_allergies" value="no"> No

                            <label for="allergies_list">List alergies</label>
                            <input type="text" id="allergies_list" name="allergies_list">

                            <label>Do you have a behaviour support plan in place?</label>
                            <input type="radio" name="support_plan" value="yes"> Yes
                            <input type="radio" name="support_plan" value="no"> No

                            <!-- Emergency Contact Information -->
                            <h3>Emergency Contact Information</h3>

                            <label for="emergency_first_name">Emergency Contact First Name</label>
                            <input type="text" id="emergency_first_name" name="emergency_first_name">

                            <label for="emergency_last_name">Emergency Contact Last Name</label>
                            <input type="text" id="emergency_last_name" name="emergency_last_name">

                            <label for="emergency_contact">Emergency Contact number</label>
                            <input type="text" id="emergency_contact" name="emergency_contact">

                            <label for="emergency_email">Emergency Contact Email</label>
                            <input type="email" id="emergency_email" name="emergency_email">

                            <label for="emergency_relationship">Emergency Contact Relationship to Participant</label>
                            <input type="text" id="emergency_relationship" name="emergency_relationship">

                            <!-- Submit button or other controls -->
                            <button type="submit">Submit</button>
                        </div>
                        <div class="flex p-4">

                        </div>
                    </div>
                </div>
    </form>
</div>
