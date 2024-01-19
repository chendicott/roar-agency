<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Please set a password for your account to activate it.') }}

        <form method="POST" action="{{ route('invite.accept', ['guid' => request()->route('guid')]) }}">
            @csrf

            <input type="hidden" name="signature" value="{{ request()->route('signature') }}">

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Set Password & Activate Account') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
