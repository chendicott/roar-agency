<x-app-layout>
    <div class="flex justify-between items-center max-w-7xl">
        <h2 class="text-3xl leading-9 font-semibold">Create User</h2>
    </div>
    <div class="mt-8 flow-root max-w-7xl">
        <form action="/admin/profile/create" method="POST">
            @csrf
            <div class="py-6 border-b border-gray-200 px-5">
                <div class="flex">
                    <div class="flex flex-col w-60">
                        <div class="text-sm text-gray-500">Name</div>
                    </div>
                    <div class="flex flex-col">
                        <x-input name="name" class="mt-1 w-full"/>
                        @error('name') <span
                            class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="py-6 border-b border-gray-200 px-5">
                <div class="flex">
                    <div class="flex flex-col w-60">
                        <div class="text-sm text-gray-500">Email</div>
                    </div>
                    <div class="flex flex-col">
                        <x-input name="email" type="email" class="mt-1 w-full"/>
                        @error('email') <span
                            class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="py-6 border-b border-gray-200 px-5">
                <div class="flex">
                    <div class="flex flex-col w-60">
                        <div class="text-sm text-gray-500">Is this user Roar Staff?</div>
                    </div>
                    <div class="flex flex-col">
                        <x-checkbox name="isAdmin"/>
                        @error('admin') <span
                            class="text-xs text-red-600 font-medium">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <x-button class="mt-6">Create User</x-button>
        </form>
    </div>
</x-app-layout>
