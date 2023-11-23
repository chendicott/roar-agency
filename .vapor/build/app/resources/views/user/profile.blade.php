<x-app-layout class="flex w-full">
    <div class="flex w-full">
        <div class="w-3/4">
            <div class="max-w-6xl">
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
