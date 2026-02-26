<div>
    @if ($show)
        <div
            x-data="{ open: @entangle('show') }"
            x-init="setTimeout(() => $wire.show = false, 3000)"
            x-show="open"
            x-transition
            class="alert-message {{ $type }}"
        >
            {{ $title }}
        </div>
    @endif
</div>