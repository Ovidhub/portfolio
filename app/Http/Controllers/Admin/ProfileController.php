<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use HandlesUploads;

    public function edit()
    {
        return view('admin.profile.edit', [
            'settings' => SiteSetting::current(),
        ]);
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::current();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:150'],
            'location' => ['nullable', 'string', 'max:150'],
            'tagline' => ['nullable', 'string', 'max:150'],
            'hero_intro' => ['nullable', 'string', 'max:1000'],
            'about_bio' => ['nullable', 'string', 'max:2000'],
            'stat_projects' => ['nullable', 'string', 'max:20'],
            'stat_clients' => ['nullable', 'string', 'max:20'],
            'stat_experience' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'about_image' => ['nullable', 'image', 'max:4096'],
            'og_image' => ['nullable', 'image', 'max:4096'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:8192'],
            'social_platform' => ['nullable', 'array'],
            'social_platform.*' => ['nullable', 'string', 'max:50'],
            'social_url' => ['nullable', 'array'],
            'social_url.*' => ['nullable', 'string', 'max:255'],
        ]);

        $data['hero_image'] = $this->storeUpload($request, 'hero_image', 'profile', $settings->hero_image);
        $data['about_image'] = $this->storeUpload($request, 'about_image', 'profile', $settings->about_image);
        $data['og_image'] = $this->storeUpload($request, 'og_image', 'profile', $settings->og_image);

        if ($request->hasFile('cv')) {
            $this->deleteUpload($settings->cv_path);
            $path = $request->file('cv')->store('cv', 'public');
            $data['cv_path'] = Storage::disk('public')->url($path);
        }

        // Rebuild socials from paired inputs.
        $platforms = $request->input('social_platform', []);
        $urls = $request->input('social_url', []);
        $socials = [];
        foreach ($platforms as $i => $platform) {
            $platform = trim((string) $platform);
            $url = trim((string) ($urls[$i] ?? ''));
            if ($platform !== '' && $url !== '') {
                $socials[] = ['platform' => $platform, 'url' => $url];
            }
        }
        $data['socials'] = $socials;

        unset($data['social_platform'], $data['social_url'], $data['cv']);

        $settings->update($data);

        return redirect()->route('admin.profile.edit')->with('status', 'Profile updated.');
    }
}
