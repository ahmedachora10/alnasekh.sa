<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFileService {
    protected string $driver ='local';

    public function store(UploadedFile $file, string $destination) : string|null {

        if(!$file->isValid()) {
            return null;
        }

        $name = $this->name($file->getClientOriginalExtension());
        $file->storeAs($destination, $name);

        return $name ?? null;
    }

    public function update(UploadedFile $file, ?string $oldFileName = null, string $destination) : string|null {
        $name = $this->store($file, $destination);

        if(!is_null($name)) {
            $this->delete($destination . $oldFileName);
        }

        return $name;
    }

    public function delete(string $filePath = ''): bool {
        if(Storage::disk($this->driver)->exists($filePath)) {
            Storage::disk($this->driver)->delete($filePath);
            return true;
        }

        return false;
    }

    public function setDriver($driverName) : self {
        $this->driver = $driverName;
        return $this;
    }

    private function name($extension) {
        return uniqid() . '_' . date('Y-m-d-H-i-s') . '.' . $extension;
    }
}