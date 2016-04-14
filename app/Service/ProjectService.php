<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use App\Repository\ProjectRepositoryInterface;
use App\Service\PhotoService;

class ProjectService
{
    const IMAGE_PATH = 'image/project';

    private $repository;
    private $photo_service;

    public function __construct(ProjectRepositoryInterface $repository, PhotoService $photo_service)
    {
        $this->repository = $repository;
        $this->photo_service = $photo_service;
    }

    public function register(Request $request)
    {
        $file = $request->files->get('photo');
        if ($this->validFile($file)) {
            $this->photo_service->move($file);
        }

        $this->repository->store($request->all());
    }

    private function validFile($file)
    {
        if (false === $file instanceof UploadedFile) {
            return false;
        }

        return $file->isValid();
    }
}
