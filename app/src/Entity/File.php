<?php
declare(strict_types=1);

namespace App\Entity;


class File
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var string
     */
    private string $filename;

    /**
     * @var string
     */
    private string $extension;

    /**
     * @var int
     */
    private int $size;

    /**
     * @var string
     */
    private string $mimeType;

    /**
     * File constructor.
     * @param string $path
     * @param int $size
     * @param string $mimeType
     */
    public function __construct(string $path, int $size, string $mimeType)
    {
        $this->path = $path;
        $this->filename = pathinfo($path, PATHINFO_FILENAME);
        $this->extension = pathinfo($path, PATHINFO_EXTENSION);
        $this->size = $size;
        $this->mimeType = $mimeType;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

}