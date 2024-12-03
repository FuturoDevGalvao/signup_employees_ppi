<?php

namespace App\Models;

use Dotenv\Exception\InvalidPathException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function deleteFileOnDeleteRegister(string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        throw new InvalidPathException("A imagem para o o caminho $path não existe.");
    }

    public static function saveImage(UploadedFile $fileImage)
    {
        $nameImage = 'image' . '-' . uniqid() . '.' . $fileImage->getClientOriginalExtension();
        return $fileImage->storeAs('uploads', $nameImage);
    }
}
