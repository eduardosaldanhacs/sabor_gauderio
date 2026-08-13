<div
    x-data="{ open: @entangle('show'), version: @entangle('notificationId'), timer: null }"
    x-effect="
        version;
        if (open) {
            clearTimeout(timer);
            timer = setTimeout(() => open = false, 3000);
        }
    "
>
    <div
        x-cloak
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="cart-toast cart-toast-{{ $type }}"
        role="status"
        aria-live="polite"
        aria-atomic="true"
    >
        <i class="fa-solid {{ $type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }}" aria-hidden="true"></i>
        <span>{{ $title }}</span>
        <button type="button" x-on:click="open = false" aria-label="Fechar mensagem">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>
    </div>
</div>
