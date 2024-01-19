@component('mail::message')
{{ __('You have been added as a user on a new trip with Roar Agency', []) }}

{{ __('To finish setting up your account, please press the button below.') }}

@component('mail::button', ['url' => \Illuminate\Support\Facades\URL::signedRoute('invite.accept', ['guid' => $invite->invite_guid])] )
{{ __('Accept Invitation') }}
@endcomponent

@endcomponent
