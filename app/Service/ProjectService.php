<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use App\Repository\ProjectRepositoryInterface;

class ProjectService
{
    const IMAGE_PATH = 'image/project';

    private $repository;

    public function __construct(ProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function register(Request $request)
    {
        $this->movePhoto($request->files->get('photo'));
        $this->repository->store($request->all());
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
