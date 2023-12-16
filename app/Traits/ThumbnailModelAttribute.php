<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ThumbnailModelAttribute {
    public function getThumbnailAttribute() {
        return $this->image != null && Storage::disk('public')->exists($this->image) ? 'storage/'.$this->image : 'https://th.bing.com/th/id/OIP.g1K70P37u_RLgGQe4Ii5RQHaHa?w=192&h=192&c=7&r=0&o=5&dpr=1.3&pid=1.7';
    }
}