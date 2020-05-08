<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$host = 'localhost'; // адрес сервера svdprow6.beget.tech
$database = 'svdprow6_triaks'; // имя базы данных
$user = 'svdprow6_triaks'; // имя пользователя
$password = '1MJ*2sHL'; // пароль

// global $link;
$link = mysqli_connect($host, $user, $password, $database)or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8") or die("Ошибка установки кодировки");

echo 'Подключились к базе.<br>';

$query ="SELECT `category_id` FROM `oc_category_to_store` WHERE 1";
$queryToStore ="SELECT `store_id` FROM `oc_store` WHERE 1";
$queryToProduct ="SELECT `product_id` FROM `oc_product_to_store` WHERE 1";
$queryToInfo ="SELECT `information_id` FROM `oc_information_to_store` WHERE 1";
//$insert ="INSERT INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ("$myrow['category_id']", '1')";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$resultStore = mysqli_query($link, $queryToStore) or die("Ошибка " . mysqli_error($link)); 
$resultProduct = mysqli_query($link, $queryToProduct) or die("Ошибка " . mysqli_error($link)); 
$resultInformation = mysqli_query($link, $queryToInfo) or die("Ошибка " . mysqli_error($link)); 

$cat = array();
$store  = array();
$product  = array();
$information  = array();

// while ($myrow = mysqli_fetch_array($result)){
// 	array_push($cat, $myrow['category_id']);
// // echo "ID - ".$myrow['category_id']."<br>";
// }

// while ($myrowStore = mysqli_fetch_array($resultStore)){
// 	array_push($store, $myrowStore['store_id']);
// }

// while ($myrowProduct = mysqli_fetch_array($resultProduct)){
// 	array_push($product, $myrowProduct['product_id']);
// }

// while ($myrowInfo = mysqli_fetch_array($resultInformation)){
// 	array_push($information, $myrowInfo['information_id']);
// }

function ReadDatabase($resultQuery, $MyArray, $Id){
	while ($myrow = mysqli_fetch_array($resultQuery)){
		array_push($MyArray, $myrow[$Id]);
	}
	 return $MyArray;
}
$product=ReadDatabase($resultProduct, $product, 'product_id');
$cat=ReadDatabase($result, $cat, 'category_id');
$store=ReadDatabase($resultStore, $store, 'store_id');
$information=ReadDatabase($resultInformation, $information, 'information_id');

print_r($information);
//Категориям присваиваем все магазины
// for ($i=0; $i <count($cat) ; $i++) { 

// for ($a=0; $a <count($store) ; $a++) { 
// 		$result_cat=$cat[$i];
// 		$result_store=$store[$a];
// 		$insert = "REPLACE INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('$result_cat', '$result_store')";
// 		$res_insert = mysqli_query($link, "$insert");
// 	}
// }

//Товарам присваиваем все магазины
// for ($b=0; $b <count($product) ; $b++) { 

// for ($c=0; $c <count($store) ; $c++) { 
// 		$result_product=$product[$b];
// 		$result_store=$store[$c];
// 		$insertToProduct = "REPLACE INTO `oc_product_to_store` (`product_id`, `store_id`) VALUES ('$result_product', '$result_store')";
// 		$res_insert_product = mysqli_query($link, "$insertToProduct");
// 	}
// }

function WriteDatabase($OC_Param, $OC_Store, $OC_Table, $OC_Column){
for ($b=0; $b <count($OC_Param) ; $b++) { 

for ($c=0; $c <count($OC_Store) ; $c++) { 
		$result_Param=$OC_Param[$b];
		$result_store=$OC_Store[$c];
		$insertToParam = "REPLACE INTO $OC_Table ($OC_Column, `store_id`) VALUES ('$result_Param', '$result_store')";
		global $link;
		$res_insert_Param = mysqli_query($link, "$insertToParam");
	}
}
}

// WriteDatabase($information, $store, 'oc_information_to_store', 'information_id'); 
// WriteDatabase($cat, $store, 'oc_category_to_store', 'category_id'); 









 // if ($insert) {
	//  	echo "===OK====";
	//  }
 


// do{
//     echo "ID - ".$myrow['category_id']."<br>";
// }
 // $insert = "REPLACE INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('$count', '1')";
// $count=$myrow['category_id'];
// while ($myrow = mysqli_fetch_array($result)){
// 	// echo "ID - ".$myrow['category_id']."<br>";
	
// 	echo $count;

	// $res_insert = mysqli_query($link, "REPLACE INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('275', '1')");


//}


// if($result)
// {
//     echo "ok_POLUCHILOS";

// }
	 // if ($res_insert) {
	 // 	echo "===OK====";
	 // }
	 echo mysqli_error($link);
mysqli_close($link);

// INSERT INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('60', '1');

// SELECT `category_id` FROM `oc_category_to_store` WHERE 1

?>