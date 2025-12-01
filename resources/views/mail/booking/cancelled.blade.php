<x-mail::message>
# {{ __('Booking cancelled') }}

{{ __('Dear') }} {{ $notifiable->name }}

{{ __('We would like to inform you that your booking has been canceled. Should you require further assistance or wish to make a new booking, we will be happy to help.') }}

<x-mail::table>
| {{ __('Date') }}                         | {{ __('Shift') }}              | {{ __('Number of guests') }}        |
| :--------------------------------------: | :----------------------------: | :---------------------------------: |
| {{ $notifiable->date->format('d/m/Y') }} | {{ $notifiable->shift->time }} | {{ $notifiable->number_of_guests }} |
</x-mail::table>

{{ __('Best regards') }},<br>
{{ config('app.name') }}
</x-mail::message>
