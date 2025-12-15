@PwaHead
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


@props([
    'pageTitle',
])


<title>@yield('title') | {{ config('app.name')  }}</title>

<meta name="description" content="{{ __('Online booking system for :x. Book easily and receive instant confirmation.', ['x' => config('app.name')]) }}" />
<!-- laravel CRUD token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Canonical SEO -->
<meta property="og:title" content="{{ config('app.name')  }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ config('app.url') }}" />
<meta property="og:image" content="{{ config('variables.ogImage') ? config('variables.ogImage') : '' }}" />
<meta property="og:description" content="{{ __('Online booking system for :x. Book easily and receive instant confirmation.', ['x' => config('app.name')]) }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<link rel="canonical" href="{{ config('app.url')  }}">
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />


<!-- Include Styles -->
@include('partials.styles')

@livewireStyles
