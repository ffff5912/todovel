<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoService
{
    const IMAGE_PATH = 'image/project';

    public function __construct()
    {
    }

    /**
     * @param  UploadedFile  $file
     */
    public function move(UploadedFile $file)
    {
        return $file->move(self::IMAGE_PATH, $file->getClientOriginalName());
    }
}
