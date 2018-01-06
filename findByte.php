<?php

declare(strict_types = 1);
class FileSize
{
    private $newVar;

    public function __construct($path)
    {
        $filter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

        $this->newVar = $filter;
    }

    public function sizeFilter(int $size):array
    {
        $arr = [];
        $count = 0;


        while( $count < 10 && $this->newVar->valid()){
            $fileInfo = new SplFileInfo($this->newVar->current()->getPathname());

            $fileDir = $fileInfo->isDir();

            if(!$fileDir && $this->newVar->getSize() > $size){
                $arr[] = $fileInfo->getFilename() .' - ' . $fileInfo->getSize() ;
                $count++;
            }
            $this->newVar->next();
        }
        return $arr;
    }
}

