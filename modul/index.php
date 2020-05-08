<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Модуль мультимагазин пакетное изменение</title>
	<meta name="description" content="Расчет зарплаты в нашей организации">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" >
		
</head>
<body>

<?php include "BD_1.php" ?>

	<div class="container">
<div class="form-group">
    <label for="exampleFormControlSelect2">Категории сайта:</label>
    <select multiple size="30" class="form-control" name="formCategy[]" id="exampleFormControlSelect2">
    <?php 
     $count=1;
   foreach($description_category as $value)
	{
	echo "<option id='opt$count'>";
echo $value;
echo "</option>";
$count++;
}
    ?>
    </select>
  </div>


<label for='exampleFormControlSelect2'>Магазины:</label><br>
<?php
$a=1;
foreach($description_store_name as $value){
echo "<div class='custom-control custom-checkbox' id='store'>
  <input type='checkbox' name='cheks' class='custom-control-input' id='customCheck$a'><label class='custom-control-label' for='customCheck$a'>$value</label></div>";
$a++;
}
    ?>
<form action="dump.php" method="POST">
<input type="submit" name="backupDB" id="backupDB" value="backupDB" class="btn btn-danger float-right"></input>
</form>


<button class="btn btn-outline-primary" onclick="select_all()">Выделить все категории</button>
<button class="btn btn-outline-primary" onclick="NoSelect_all()">Снять выделение категорий</button>

<button class="btn btn-outline-primary" onclick="Store_all()">Выделить все Магазины/снять выделение</button>
<button id="js-button" class="btn btn-outline-primary">Получить текст</button>


	</div>
  <!-- Optional JavaScript -->
<script>
	function select_all()
{
    var selEl = document.getElementById('exampleFormControlSelect2');
    for(i=0; i<selEl.length; i++) {
        selEl.options[i].selected = true;
    }
}

function NoSelect_all()
{
    var selEl = document.getElementById('exampleFormControlSelect2');
    for(i=0; i<selEl.length; i++) {
        selEl.options[i].selected = false;
    }
}

function Store_all()
{
	var chkStore=document.getElementsByName('cheks');
    for(i=0; i<chkStore.length; i++) {
        chkStore[i].checked = chkStore[i].checked ? false : true;
     }

}


</script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
