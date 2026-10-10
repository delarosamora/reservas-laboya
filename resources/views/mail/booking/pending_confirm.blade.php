<x-mail::message>
# {{ __('Booking pending confirm') }}

{{ __('Dear') }} {{ $notifiable->name }}

{{ __('We have received your booking request, but it is NOT confirmed, probably due to the number of guests is elevated.') }}

<x-mail::table>
| {{ __('Date') }}                         | {{ __('Shift') }}              | {{ __('Number of guests') }}        | {{ __('Status') }}              | {{ __('Code') }}        |
| :--------------------------------------: | :----------------------------: | :---------------------------------: | :-----------------------------: | :---------------------: |
| {{ $notifiable->date->format('d/m/Y') }} | {{ $notifiable->shift->time }} | {{ $notifiable->number_of_guests }} | {{ $notifiable->status->name }} | {{ $notifiable->code }} |
</x-mail::table>

{{ __('Best regards') }},<br>
{{ config('app.name') }}
</x-mail::message>
