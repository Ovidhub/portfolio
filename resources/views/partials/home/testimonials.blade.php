@if ($testimonials->isNotEmpty())
<section id="testimonials" class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; Testimonials</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#1a3c2a] mt-2">What Happy Clients <span class="text-[#f5a623]">Say About Me</span></h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $testimonial)
                <figure data-reveal class="bg-gray-50 rounded-2xl p-8 relative border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="absolute top-6 right-6 w-12 h-12 bg-[#f5a623]/20 rounded-full flex items-center justify-center">
                        <x-icon name="quote" class="w-6 h-6 text-[#f5a623]" />
                    </div>

                    <div class="flex gap-1 mb-6" aria-label="{{ $testimonial->rating }} out of 5 stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-[#f5a623]' : 'text-gray-300' }}" viewBox="0 0 24 24" fill="{{ $i <= $testimonial->rating ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        @endfor
                    </div>

                    <blockquote class="text-gray-600 mb-8 leading-relaxed italic">&ldquo;{{ $testimonial->content }}&rdquo;</blockquote>

                    <figcaption class="flex items-center gap-4">
                        <div class="w-14 h-14 {{ $testimonial->color }} rounded-full flex items-center justify-center text-white font-bold text-lg">{{ $testimonial->avatar }}</div>
                        <div>
                            <div class="font-bold text-[#1a3c2a]">{{ $testimonial->name }}</div>
                            <div class="text-gray-500 text-sm">{{ $testimonial->role }}</div>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@endif
