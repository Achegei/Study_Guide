@vite(['resources/css/app.css', 'resources/js/app.js']) @livewireStyles
@livewire('navigation-menu') @if (isset($header))
{{ $header }}
@endif
{{ $slot }}
@stack('modals') @livewireScripts @stack('scripts')