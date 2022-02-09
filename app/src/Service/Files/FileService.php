<?php
declare(strict_types=1);

namespace App\Service\Files;


use App\Entity\File;
use DomainException;

class FileService
{
    /**
     * @param UploadFileInfo $info
     * @return File
     */
    public function upload(UploadFileInfo $info): File
    {
        if ($info->error != UPLOAD_ERR_OK) {
            throw new DomainException('Cannot upload file');
        }

    }
}