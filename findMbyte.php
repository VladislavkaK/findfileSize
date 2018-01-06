<?php
//Все файлы в MB
/*while (($line = fgets(STDIN)) != PHP_EOL) {
    $iterator = new DirectoryIterator(dirname(__FILE__));
    $mbyte = 1000000;
    $gbyte = 1000000000;
    for($i=0;$i < $line; $i++) {
        foreach ($iterator as $value) {
            if ($value->isFile()) {
                if ($value->getSize() > $mbyte && $value->getSize() < $gbyte) {
                    echo $value->getFilename() . ' ' . $value->getSize() . PHP_EOL;
                }
            }
        }
    }
}*/
$dir = new DirectoryIterator(dirname(__FILE__));
$rdir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), TRUE);
$mbyte = 1000000;
$gbyte = 1000000000;
while (($line = fgets(STDIN)) != PHP_EOL) {
    for($i=0;$i < $line; $i++) {
        foreach ($rdir as $file) {
            if ($rdir->getSize() > $mbyte && $rdir->getSize() < $gbyte && $file->isFile() ) {
                echo $file->getFilename() . ' - ' . $rdir->getSize().' байт' . PHP_EOL;
            }
        }
    }
}