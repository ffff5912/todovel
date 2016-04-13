<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectService
{
    const IMAGE_PATH = 'image/project';

    public function __construct()
    {
    }

    /**
     * @param  array  $files
     */
    public function movePhoto($file)
    {
        if (false === $this->validFile($file)) {
            return;
        }

        return $file->move(self::IMAGE_PATH, $file->getClientOriginalName());
    }

    private function validFile($file)
    {
        if (false === $file instanceof UploadedFile) {
            return false;
        }

        return $file->isValid();
    }
}
