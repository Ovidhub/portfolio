<section id="contact" class="py-20 px-4 bg-[#1a3c2a]">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12">
            {{-- Info --}}
            <div data-reveal class="space-y-8">
                <div>
                    <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; Get In Touch</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mt-2">Let's Work <span class="text-[#f5a623]">Together</span></h2>
                    <p class="text-gray-400 mt-4 text-lg">Have a project in mind? Let's discuss how we can bring your ideas to life.</p>
                </div>

                <div class="space-y-6">
                    <a href="mailto:{{ $settings->email }}" class="flex items-center gap-4 group">
                        <span class="w-14 h-14 bg-[#f5a623]/20 rounded-full flex items-center justify-center"><x-icon name="mail" class="w-6 h-6 text-[#f5a623]" /></span>
                        <span>
                            <span class="block text-gray-400 text-sm">Email</span>
                            <span class="block text-white font-semibold group-hover:text-[#f5a623] transition-colors">{{ $settings->email }}</span>
                        </span>
                    </a>
                    @if ($settings->phone)
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}" class="flex items-center gap-4 group">
                            <span class="w-14 h-14 bg-[#f5a623]/20 rounded-full flex items-center justify-center"><x-icon name="phone" class="w-6 h-6 text-[#f5a623]" /></span>
                            <span>
                                <span class="block text-gray-400 text-sm">Phone</span>
                                <span class="block text-white font-semibold group-hover:text-[#f5a623] transition-colors">{{ $settings->phone }}</span>
                            </span>
                        </a>
                    @endif
                    @if ($settings->address)
                        <div class="flex items-center gap-4">
                            <span class="w-14 h-14 bg-[#f5a623]/20 rounded-full flex items-center justify-center"><x-icon name="map-pin" class="w-6 h-6 text-[#f5a623]" /></span>
                            <span>
                                <span class="block text-gray-400 text-sm">Location</span>
                                <span class="block text-white font-semibold">{{ $settings->address }}</span>
                            </span>
                        </div>
                    @endif
                </div>

                <div class="flex gap-4 pt-4">
                    @foreach ($settings->socials ?? [] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" title="{{ $social['platform'] }}" class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-[#f5a623] hover:text-[#1a3c2a] transition-colors font-bold text-xs">{{ \Illuminate\Support\Str::substr($social['platform'], 0, 1) }}</a>
                    @endforeach
                </div>
            </div>

            {{-- Form --}}
            <div data-reveal class="bg-white rounded-2xl p-8 md:p-10">
                @if (session('contact_success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-2">
                        <x-icon name="check" class="w-5 h-5" />
                        {{ session('contact_success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-[#1a3c2a] font-semibold mb-2">First Name</label>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="John" class="w-full px-4 py-3 rounded-xl border @error('first_name') border-red-400 @else border-gray-200 @enderror focus:border-[#f5a623] focus:ring-2 focus:ring-[#f5a623]/20 outline-none transition-all">
                            @error('first_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="last_name" class="block text-[#1a3c2a] font-semibold mb-2">Last Name</label>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Doe" class="w-full px-4 py-3 rounded-xl border @error('last_name') border-red-400 @else border-gray-200 @enderror focus:border-[#f5a623] focus:ring-2 focus:ring-[#f5a623]/20 outline-none transition-all">
                            @error('last_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-[#1a3c2a] font-semibold mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl border @error('email') border-red-400 @else border-gray-200 @enderror focus:border-[#f5a623] focus:ring-2 focus:ring-[#f5a623]/20 outline-none transition-all">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="subject" class="block text-[#1a3c2a] font-semibold mb-2">Subject</label>
                        <input id="subject" type="text" name="subject" value="{{ old('subject') }}" placeholder="Project Discussion" class="w-full px-4 py-3 rounded-xl border @error('subject') border-red-400 @else border-gray-200 @enderror focus:border-[#f5a623] focus:ring-2 focus:ring-[#f5a623]/20 outline-none transition-all">
                        @error('subject')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="message" class="block text-[#1a3c2a] font-semibold mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Tell me about your project..." class="w-full px-4 py-3 rounded-xl border @error('message') border-red-400 @else border-gray-200 @enderror focus:border-[#f5a623] focus:ring-2 focus:ring-[#f5a623]/20 outline-none transition-all resize-none">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="w-full bg-[#1a3c2a] text-white py-4 rounded-xl font-semibold flex items-center justify-center gap-3 hover:bg-[#2d5a3d] transition-colors group">
                        Send Message
                        <span class="bg-[#f5a623] rounded-full p-1 group-hover:scale-110 transition-transform"><x-icon name="send" class="w-4 h-4 text-[#1a3c2a]" /></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
