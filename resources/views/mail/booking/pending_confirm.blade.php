<x-mail::message>
# {{ __('Booking pending confirm') }}

{{ __('Dear') }} {{ $notifiable->name }}

{{ __('We have received your booking request. It is currently under review. We will notify you as soon as it has been confirmed.') }}

<x-mail::table>
| {{ __('Date') }}                         | {{ __('Shift') }}              | {{ __('Number of guests') }}        |
| :--------------------------------------: | :----------------------------: | :---------------------------------: |
| {{ $notifiable->date->format('d/m/Y') }} | {{ $notifiable->shift->time }} | {{ $notifiable->number_of_guests }} |
</x-mail::table>

{{ __('Best regards') }},<br>
{{ config('app.name') }}
</x-mail::message>
