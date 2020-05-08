<?php
if(isset($_POST))
    {

$staj_php = $_POST["staj"];
$oklad = (int) $_POST["oklad"];
$rang = $_POST["rang"];
$type_worker = $_POST["type_worker"];


switch ($type_worker) {
		case 'nepro':
		$type_worker=0.4;
		break;
	default:
		$type_worker=0.5;
		break;
}

switch ($staj_php) {
		case '1_staj':
		$staj_php=0;
			break;
		case '2_staj':
		$staj_php=0.03;
			break;
		case '3_staj':
		$staj_php=0.05;
				break;
		case '4_staj':
		$staj_php=0.07;
			break;
	default:
		$staj_php=0.1;
		break;
}

switch ($rang) {
		case '1_rang':
		$rang=0.5;
			break;
		case '2_rang':
		$rang=0.6;
			break;
		case '3_rang':
		$rang=0.7;
				break;
		case '4_rang':
		$rang=0.8;
			break;
		case '5_rang':
		$rang=0.9;
			break;
	default:
		$rang=1;
		break;
}

// тарифнаф оплата + доплата за стаж
$TO = ($oklad + ($oklad*$staj_php))   ;
//СД
$SD = $TO * $rang;
//Размер премии
$PR=($TO + $SD)*$type_worker;
//Полная
$result = $TO+ $SD + $PR;


$pensiya = $result - ($result*0.13);
$pensiya =round($pensiya, 2);
$pensiya_pfr=$result*0.13;
$pensiya_pfr =round($pensiya_pfr, 2);
$staj_php_out = $oklad*$staj_php;
$pr_sd = $SD+ $PR;


// echo "<p> Тарифная оплата (оклад + надбавка за стаж): $TO руб.</p>";
// echo "<p> Надбавка за стаж: $staj_php_out руб.</p>";
// echo "<p> СД: $SD руб.</p>";
// echo "<p> Премия: $PR руб.</p>";
// echo "<p> Премия + СД : $pr_sd руб.</p>";



// echo "<h2> Ваша зарплата: $result руб.</h2><br>";
// echo "<h2> Ваша зарплата -13%: $pensiya руб.</h2><br>";
// echo "<h3> В пенсионный фонд ушло: $pensiya_pfr руб.</h3><br>";

// echo "<p><a href='index.html'>Назад</a></p>";


    }
 // учитывать ли кол-во дней ?
   
?>
<!DOCTYPE html>
<html>
<head lang="en">
	 <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>My_landingpage</title>

</head>

<body>
	<div class="container">
			<div class="page-header">
  <h1>Результат</h1>
</div>
<br><br>

<div class="alert alert-dark" role="alert">
  Тарифная оплата (оклад + надбавка за стаж): <b><?=$TO; ?></b> руб.
</div>
<div class="alert alert-dark" role="alert">
  Надбавка за стаж:  <b><?=$staj_php_out; ?></b> руб.
</div>
<div class="alert alert-dark" role="alert">
 СД: <b><?=$SD; ?></b> руб.
</div>
<div class="alert alert-dark" role="alert">
 Премия: <b><?=$PR; ?></b> руб.
</div>
<div class="alert alert-dark" role="alert">
 Премия + СД: <b><?=$pr_sd; ?></b> руб.
</div>


<div class="alert alert-primary" role="alert">
  Ваша зарплата: <b><?=$result; ?></b> руб.
</div>
<div class="alert alert-primary" role="alert">
  Ваша зарплата -13% НДФЛ: <b><?=$pensiya; ?></b> руб.
</div>
<div class="alert alert-dark" role="alert">
 сумма НДФЛ: <b><?=$pensiya_pfr; ?></b> руб.
</div>

<br>
<br>
<a class="btn btn-primary btn-lg btn-block" href="index.html" role="button">Вернуться</a>
<!-- <button class="btn btn-primary btn-lg btn-block">Посчитать</button>
</div> -->


  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

