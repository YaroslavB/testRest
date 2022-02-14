<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\Files\FileService;
use App\Service\Files\UploadFileInfo;
use JsonException;

class FilesController
{
    /**
     * @var FileService
     */
    private FileService $fileService;

    /**
     * FilesController constructor.
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    /**
     * @return string
     * @throws JsonException
     */
    public function upload(): string
    {

        $info = new UploadFileInfo();
        $info->size = $_FILES['files']['size'];
        $info->mimeType = $_FILES['files']['type'];
        $info->filename = $_FILES['files']['name'];
        $info->error = $_FILES['files']['error'];
        $info->tpm = $_FILES['files']['tmp_name'];
        $file = $this->fileService->upload($info);

        return json_encode([
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'ext' => $file->getExtension()
        ], JSON_THROW_ON_ERROR);
    }
}