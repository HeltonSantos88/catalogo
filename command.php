<?php

echo "**************\n";
echo "** Terminal **\n";
echo "**************\n";

$var = mktime(0, 0, 0, 4, 22,1500);
echo date("d/m/Y H:i:s", $var). "\n\n"; 

$data = new DateTime();
$data->setDate(1500, 4, 22) ;
echo $data->format('d/m/Y');        

var_dump($data);