<?php
//Все файлы в KB
/*while (($line = fgets(STDIN)) != PHP_EOL) {
    $iterator = new DirectoryIterator(dirname(__FILE__));
    $kbyte = 3000;
    $mbyte = 1000000;
    for($i=0;$i < $line; $i++) {
        foreach ($iterator as $value) {
            if ($value->isFile()) {
                if ($value->getSize() > $kbyte && $value->getSize() < $mbyte) {
                    echo $value->getFilename() . ' ' . $value->getSize() . PHP_EOL;
                }
            }
        }
    }
}*/
$dir = new DirectoryIterator(dirname(__FILE__));
$rdir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), TRUE);
$kbyte = 3000;
$mbyte = 1000000;
while (($line = fgets(STDIN)) != PHP_EOL) {
    for($i=0;$i < $line; $i++) {
        foreach ($rdir as $file) {
            if ($rdir->getSize() > $kbyte && $rdir->getSize() < $mbyte && $file->isFile()) {
                echo $file->getFilename() . ' - ' . $rdir->getSize().' байт' . PHP_EOL;
            }
        }
    }
}