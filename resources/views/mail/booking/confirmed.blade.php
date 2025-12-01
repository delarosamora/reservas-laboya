<x-mail::message>
# {{ __('Booking confirmed') }}

{{ __('Dear') }} {{ $notifiable->name }}

{{ __('We are pleased to inform you that your booking has been confirmed. Thank you for choosing our services. Please feel free to contact us if you need any further assistance.') }}

<x-mail::table>
| {{ __('Date') }}                         | {{ __('Shift') }}              | {{ __('Number of guests') }}        | {{ __('Status') }}              |
| :--------------------------------------: | :----------------------------: | :---------------------------------: | :-----------------------------: |
| {{ $notifiable->date->format('d/m/Y') }} | {{ $notifiable->shift->time }} | {{ $notifiable->number_of_guests }} | {{ $notifiable->status->name }} |
</x-mail::table>

{{ __('Best regards') }},<br>
{{ config('app.name') }}
</x-mail::message>
