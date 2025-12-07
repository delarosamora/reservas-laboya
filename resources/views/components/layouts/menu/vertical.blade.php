<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="icon-base bx bx-chevron-left icon-sm d-flex align-items-center justify-content-center"></i>
        </a>
  </div>

  <div class="menu-divider mt-0"></div>
  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('dashboard') }}"><i class="menu-icon tf-icons bx bx-home"></i>{{ __('Dashboard') }}</a>
    </li>
    <li class="menu-item {{ request()->is('admin/bookings') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('admin.bookings.index') }}" wire:navigate><i class="menu-icon tf-icons bx bx-restaurant"></i> {{ __('Bookings') }}</a>
    </li>
    <li class="menu-item {{ request()->is('admin/members') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('admin.members.index') }}" wire:navigate><i class="menu-icon tf-icons bx bx-group"></i> {{ __('Members') }}</a>
    </li>
    <li class="menu-item {{ request()->is('admin/holidays') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('admin.holidays.index') }}" wire:navigate><i class="menu-icon tf-icons bx bx-party"></i> {{ __('Holidays') }}</a>
    </li>

    <!-- Settings -->
    <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate">{{ __('Settings') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.profile') }}" wire:navigate>{{ __('Profile') }}</a>
        </li>
        <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.password') }}" wire:navigate>{{ __('Password') }}</a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->

<script>
  // Toggle the 'open' class when the menu-toggle is clicked
  document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
    menuToggle.addEventListener('click', function() {
      const menuItem = menuToggle.closest('.menu-item');
      // Toggle the 'open' class on the clicked menu-item
      menuItem.classList.toggle('open');
    });
  });
</script>
