<?php

/*
echo json_encode('hola');
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )
*/

require_once './vendor/autoload.php';

/*
This library is used to validate: https://github.com/FormHandler/FormHandler
TODO: Use a more standard one
*/

use FormGuide\Handlx\FormHandler;

$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['contactName','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('message')->maxLength(6000);
//$validator->field('image')->filetype('sometimes|mimes:jpeg,jpg,png,pdf,docx,odt|max:100000');

$pp->attachFiles(['stampFile']);


$pp->sendEmailTo('frangoro@gmail.com');

echo $pp->process($_POST);