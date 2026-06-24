<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    /**
     * Store an uploaded file on the public disk and return its public URL.
     * Deletes the previous file when replacing. Returns $current if no new upload.
     */
    protected function storeUpload(Request $request, string $field, string $dir, ?string $current = null): ?string
    {
        if (! $request->hasFile($field)) {
            return $current;
        }

        if ($current) {
            $this->deleteUpload($current);
        }

        $path = $request->file($field)->store($dir, 'public');

        return Storage::disk('public')->url($path);
    }

    /**
     * Delete a previously stored public-disk file given its public URL.
     */
    protected function deleteUpload(?string $url): void
    {
        if (! $url) {
            return;
        }

        $prefix = '/storage/';
        $pos = strpos($url, $prefix);

        if ($pos !== false) {
            $relative = substr($url, $pos + strlen($prefix));
            Storage::disk('public')->delete($relative);
        }
    }
}
