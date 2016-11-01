<?php

namespace helpers;

class ZipArchive extends \ZipArchive
{
    /**
     * @var array
     */
    protected $files = [];
    /**
     * @param array $files
     * @param bool $distillSubdirectories
     * @return static
     */
    public function setFiles($files = [], $distillSubdirectories = true)
    {
        $this->files = array_combine(
            $this->validFiles((array) $files),
            $this->getNames($this->validFiles((array) $files), $distillSubdirectories)
        );
        return $this;
    }
    /**
     * @param string $destination
     * @param bool $overwrite
     * @return bool
     */
    public function write($destination = '', $overwrite = false)
    {
        $writeMode = $overwrite ? self::OVERWRITE : self::CREATE;
        if (! $this->canOverwrite($destination, $overwrite) || ! $this->hasFiles()) {
            return false;
        }
        if ($this->open($destination, $writeMode) !== true) {
            return false;
        }
        foreach ($this->files as $file => $name) {
            $this->addFile($file, $name);
        }
        $this->close();
        return file_exists($destination);
    }
    /**
     * @param array $files
     * @return array
     */
    protected function validFiles(array $files)
    {
        return array_filter($files, function ($file) {
            return file_exists($file);
        });
    }
    /**
     * @param array $files
     * @param bool $distillSubdirectories
     * @return array
     */
    protected function getNames($files, $distillSubdirectories)
    {
        return array_map(function ($file) use ($distillSubdirectories) {
            return $distillSubdirectories ? basename($file) : $file;
        }, $files);
    }
    /**
     * @param string $destination
     * @param bool $overwrite
     * @return bool
     */
    protected function canOverwrite($destination, $overwrite)
    {
        return $overwrite || ! file_exists($destination);
    }
    /**
     * @return bool
     */
    protected function hasFiles()
    {
        return ! empty($this->files);
    }
}