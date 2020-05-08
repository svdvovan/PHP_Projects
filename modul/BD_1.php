<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "connectBD.php";

$link = mysqli_connect($host, $user, $password, $database)or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8") or die("Ошибка установки кодировки");

echo "Подключились к базе <b> $database </b> <br>";
echo "<br>";
$query ="SELECT `category_id` FROM `oc_category_to_store` WHERE 1";
$queryToStore ="SELECT `store_id` FROM `oc_store` WHERE 1";
$queryToProduct ="SELECT `product_id` FROM `oc_product_to_store` WHERE 1";
$queryToInfo ="SELECT `information_id` FROM `oc_information_to_store` WHERE 1";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$resultStore = mysqli_query($link, $queryToStore) or die("Ошибка " . mysqli_error($link)); 
$resultProduct = mysqli_query($link, $queryToProduct) or die("Ошибка " . mysqli_error($link)); 
$resultInformation = mysqli_query($link, $queryToInfo) or die("Ошибка " . mysqli_error($link)); 

$cat = array();
$store  = array();
$product  = array();
$information  = array();

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

// print_r($information);

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




// $query_description_category ="SELECT `name` FROM `oc_category_description` WHERE 1";
// $result_description_category = mysqli_query($link, $query_description_category) or die("Ошибка " . mysqli_error($link)); 
// $description_category  = array();
// $description_category=ReadDatabase($result_description_category, $description_category, 'name');
// foreach($description_category as $value)
// {
// echo $value, "<br>";
// }

$query_description_category ="SELECT `name` FROM `oc_category_description` WHERE 1";
$result_description_category = mysqli_query($link, $query_description_category) or die("Ошибка " . mysqli_error($link)); 
$description_category  = array();
$description_category=ReadDatabase($result_description_category, $description_category, 'name');

$query_store_name ="SELECT `name` FROM `oc_store` WHERE 1";
$result_store_name = mysqli_query($link, $query_store_name) or die("Ошибка " . mysqli_error($link)); 
$description_store_name  = array();
$description_store_name =ReadDatabase($result_store_name, $description_store_name, 'name');

 // print_r($description_store_name);

// print_r($description_category );
	 echo mysqli_error($link);
mysqli_close($link);
?>