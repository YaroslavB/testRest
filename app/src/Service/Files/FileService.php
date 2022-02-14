<?php
declare(strict_types=1);

namespace App\Service\Files;


use App\Entity\File;
use DomainException;

class FileService
{
    private string $uploadDir;

    /**
     * FileService constructor.
     * @param string $uploadDir
     */
    public function __construct(string $uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }


    /**
     * @param UploadFileInfo $info
     * @return File
     */
    public function upload(UploadFileInfo $info): File
    {
        if ($info->error != UPLOAD_ERR_OK) {
            throw new DomainException('Upload Error :(');
        }

        $extension = pathinfo($info->filename, PATHINFO_EXTENSION);
        $uniq = uniqid('', true);

        if (!move_uploaded_file($info->tpm, "$this->uploadDir/" . $path = "{$uniq}.$extension")) {
            throw new DomainException('Cannot upload file');
        }
        return new File($path, $info->size, $info->mimeType);
    }
}