<div>
    @if ($show)
        <div
            x-data="{ open: @entangle('show') }"
            x-init="setTimeout(() => $wire.show = false, 3000)"
            x-show="open"
            x-transition
            class="alert alert-{{ $type }}"
            style="position: fixed; bottom: 0; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"
        >
            {{ $title }}
        </div>
    @endif
</div>