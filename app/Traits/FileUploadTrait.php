<?php 

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, string $folder): string 
    {
        if(!Storage::disk('public')->exists($folder)){
            Storage::disk('public')->makeDirectory($folder);
        }

        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

        $file->storeAs($folder, $filename, 'public');

        return $folder . '/' . $filename;

    }

    public function deleteFile(string $filePath): bool 
    {
        if(Storage::disk('public')->exists($filePath)){
            return Storage::disk('public')->delete($filePath);
        }

        return false;
    }
}