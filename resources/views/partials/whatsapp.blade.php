@php
    $waNumber = preg_replace('/\D/', '', (string) ($settings->whatsapp ?? ''));
    $waText = rawurlencode("Hi {$settings->name}! I found your portfolio and I'd like to chat.");
@endphp

@if ($waNumber)
    <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}"
       target="_blank" rel="noopener noreferrer"
       aria-label="Chat on WhatsApp"
       class="group fixed bottom-5 right-5 z-50 flex items-center gap-2">
        <span class="hidden sm:block bg-white text-[#1a3c2a] text-sm font-semibold px-3 py-2 rounded-full shadow-lg opacity-0 translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all">
            Chat with me
        </span>
        <span class="relative grid place-items-center w-14 h-14 rounded-full bg-[#25D366] text-white shadow-xl hover:scale-105 transition-transform">
            <span class="absolute inset-0 rounded-full bg-[#25D366] opacity-60 animate-ping"></span>
            <svg viewBox="0 0 32 32" class="relative w-7 h-7" fill="currentColor" aria-hidden="true">
                <path d="M16.04 4C9.4 4 4 9.4 4 16.04c0 2.12.56 4.18 1.6 6L4 28l6.1-1.6a12 12 0 0 0 5.94 1.52h.01c6.64 0 12.04-5.4 12.04-12.04C28.09 9.4 22.68 4 16.04 4Zm0 21.9h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.62.95.97-3.53-.24-.36a9.9 9.9 0 1 1 8.3 4.53Zm5.43-7.4c-.3-.15-1.76-.86-2.03-.96-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.21-.24-.58-.49-.5-.67-.51l-.57-.01c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35Z" />
            </svg>
        </span>
    </a>
@endif
