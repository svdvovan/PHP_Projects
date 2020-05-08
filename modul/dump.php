<?php
require_once "BD_1.php";
use Ifsnop\Mysqldump as IMysqldump;
if ($_POST["backupDB"] =='backupDB')
    {

error_reporting(E_ALL);

include_once(dirname(__FILE__) . '/mysqldump-php-master/src/Ifsnop/Mysqldump/Mysqldump.php');



try {
    $dump = new IMysqldump\Mysqldump("mysql:host=$host;dbname=$database", $user, $password);
    $dump->start('dump'.date('mdyHis').'.sql');
} catch (\Exception $e) {
    echo 'mysqldump-php error: ' . $e->getMessage();
}
echo "Создание дампа БД закончено в директорию:".dirname(__FILE__).'/dump'.date('mdyHis').'.sql';
}
?>