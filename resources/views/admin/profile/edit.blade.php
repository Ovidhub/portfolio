@extends('layouts.admin')

@section('title', 'Profile & SEO')
@section('heading', 'Profile & SEO Settings')

@section('content')
    @php $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none'; @endphp

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-3xl">
        @csrf @method('PUT')

        {{-- Identity --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h2 class="font-bold text-[#1a3c2a]">Identity</h2>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Name</label>
                    <input type="text" name="name" value="{{ old('name', $settings->name) }}" class="{{ $input }}" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Title</label>
                    <input type="text" name="title" value="{{ old('title', $settings->title) }}" class="{{ $input }}" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Location</label>
                    <input type="text" name="location" value="{{ old('location', $settings->location) }}" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Tagline / Badge</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $settings->tagline) }}" class="{{ $input }}">
                </div>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Hero Intro</label>
                <textarea name="hero_intro" rows="2" class="{{ $input }}">{{ old('hero_intro', $settings->hero_intro) }}</textarea>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">About Bio</label>
                <textarea name="about_bio" rows="4" class="{{ $input }}">{{ old('about_bio', $settings->about_bio) }}</textarea>
            </div>
            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Projects Stat</label>
                    <input type="text" name="stat_projects" value="{{ old('stat_projects', $settings->stat_projects) }}" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Clients Stat</label>
                    <input type="text" name="stat_clients" value="{{ old('stat_clients', $settings->stat_clients) }}" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Experience Stat</label>
                    <input type="text" name="stat_experience" value="{{ old('stat_experience', $settings->stat_experience) }}" class="{{ $input }}">
                </div>
            </div>
        </div>

        {{-- Images --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h2 class="font-bold text-[#1a3c2a]">Images & CV</h2>
            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Hero Image</label>
                    @if ($settings->hero_image)<img src="{{ $settings->hero_image }}" class="w-20 h-24 object-cover rounded-lg mb-2" alt="">@endif
                    <input type="file" name="hero_image" accept="image/*" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">About Image</label>
                    @if ($settings->about_image)<img src="{{ $settings->about_image }}" class="w-20 h-24 object-cover rounded-lg mb-2" alt="">@endif
                    <input type="file" name="about_image" accept="image/*" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">OG / Social Image</label>
                    @if ($settings->og_image)<img src="{{ $settings->og_image }}" class="w-28 h-16 object-cover rounded-lg mb-2" alt="">@endif
                    <input type="file" name="og_image" accept="image/*" class="{{ $input }}">
                </div>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">CV / Resume (PDF/DOC)</label>
                @if ($settings->cv_path)<a href="{{ $settings->cv_path }}" target="_blank" class="text-[#f5a623] text-sm font-semibold block mb-2">Current CV &#8599;</a>@endif
                <input type="file" name="cv" accept=".pdf,.doc,.docx" class="{{ $input }}">
            </div>
        </div>

        {{-- Contact --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h2 class="font-bold text-[#1a3c2a]">Contact</h2>
            <div class="grid sm:grid-cols-3 gap-5">
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $settings->email) }}" class="{{ $input }}" required>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $settings->phone) }}" class="{{ $input }}">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">WhatsApp <span class="text-gray-400 text-sm">(floating chat button)</span></label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}" class="{{ $input }}" placeholder="+234 905 671 9522">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1.5">Address</label>
                    <input type="text" name="address" value="{{ old('address', $settings->address) }}" class="{{ $input }}">
                </div>
            </div>

            <div x-data="{ socials: {{ \Illuminate\Support\Js::from(old('social_platform') ? collect(old('social_platform'))->map(fn($p, $i) => ['platform' => $p, 'url' => old('social_url')[$i] ?? ''])->values() : ($settings->socials ?: [])) }} }">
                <label class="block font-medium text-gray-700 mb-1.5">Social Links</label>
                <template x-for="(social, index) in socials" :key="index">
                    <div class="flex gap-2 mb-2">
                        <input type="text" :name="`social_platform[${index}]`" x-model="social.platform" placeholder="LinkedIn" class="{{ $input }} flex-1">
                        <input type="text" :name="`social_url[${index}]`" x-model="social.url" placeholder="https://..." class="{{ $input }} flex-[2]">
                        <button type="button" @click="socials.splice(index, 1)" class="px-3 text-red-400 hover:text-red-600"><x-icon name="x" class="w-4 h-4" /></button>
                    </div>
                </template>
                <button type="button" @click="socials.push({ platform: '', url: '' })" class="text-sm text-[#1a3c2a] font-semibold hover:text-[#f5a623] flex items-center gap-1"><x-icon name="plus" class="w-4 h-4" /> Add social link</button>
            </div>
        </div>

        {{-- SEO --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h2 class="font-bold text-[#1a3c2a]">SEO Defaults</h2>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $settings->meta_title) }}" class="{{ $input }}" maxlength="60">
                <p class="text-xs text-gray-400 mt-1">Recommended under 60 characters.</p>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Meta Description</label>
                <textarea name="meta_description" rows="2" class="{{ $input }}" maxlength="160">{{ old('meta_description', $settings->meta_description) }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Recommended under 160 characters.</p>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $settings->meta_keywords) }}" class="{{ $input }}">
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save Changes</button>
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
