<?php

namespace App\Services;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ImageService
{
    protected $directory;

    public function __construct()
    {
        $this->directory = public_path() . '/images/';
    }

    public function upload(UploadedFile $image)
    {
        $user = User::find(Auth::user()->id);

        $imageName = uniqid('logo_') . md5($user->email);
        $image = $image->move($this->directory, $imageName);

        return $image;
    }

    public function delete($name)
    {
        File::delete($this->directory . $name);
    }
}