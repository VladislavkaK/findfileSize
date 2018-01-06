<?php
require_once dirname(__FILE__) . "/findByte.php";

$it = new FileSize('.');

do{
    $answer = $it->sizeFilter(1024);
    print_r( $answer);
}while(fgets(STDIN) == "n\n");