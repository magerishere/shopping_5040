<?php

namespace App\Services;


use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService
{

    /**
     * Create a new UploadService service.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param HasMedia $model
     * @param UploadedFile $uploadedFile
     * @param string $collectionName
     * @return Media
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function uploadFile(HasMedia $model, UploadedFile $uploadedFile, string $collectionName = 'default', string $diskName = 'public', bool $removeOlder = true): Media
    {
        if ($removeOlder) {
            $model->clearMediaCollection($collectionName);
        }
        return $model->addMedia($uploadedFile)->toMediaCollection($collectionName, $diskName);
    }

}
