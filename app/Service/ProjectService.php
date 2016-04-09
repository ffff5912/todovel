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
    public function movePhoto(array $files)
    {
        $filtered = array_filter($files, function($file) {
            return $file instanceof UploadedFile === true;
        });

        foreach ($filtered as $file) {
            $file->move(self::IMAGE_PATH, $file->getClientOriginalName());
        }
    }
}
