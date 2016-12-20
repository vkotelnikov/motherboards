<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="categoriescss.css">
	<style type="text/css">
		a{color: black}
		a:visited{
			color: black;
		}
		a:hover{
			color: #aaa;
			background-color: :#123;
		}
		
	</style>


	<script>
function checkForm(form)
{
	
	var one = false;
	var three = false;
	var manuf = document.getElementById("manuf");
	
		for (var i = 0; i < 4; i++) {
			if(manuf.options[i]!=""){
				one = true;
			break;
		}
		};

		if (form.USB.value==""){
			 alert("Введите количество USB портов")
			 return;
		}else {
				three=true;
			}
		if(one && three)
			form.total.value = true;
		return;
}
	
function addcat(form){
		if (form.catname.value=="") 
		{
			alert("Введите название категории!")
			return;
		}
		if (form.filename.value=="")
		{
			alert("Введите имя файла!")
			return;
		}

		var list = document.getElementById("list1");
		var newDiv = document.createElement("li");
		newDiv.innerHTML = "<a href=" + form.filename.value + 
						   " target=\"objects\">" + form.catname.value + "</a> <input type=\"button\" onclick=\"del(this)\" value=\"Удалить\"/>";
		list.appendChild(newDiv);
	}		

	function del(toDel){
		var toDel_parent = toDel.parentNode;
		toDel_parent.parentNode.removeChild(toDel_parent);
		return;
	}

	function changeStyle(form){
	switch(form.selectStyle.value){
		case "0":
				document.body.className="mystyle2";
				for (var i = 0; i < 4; i++) {
				document.getElementsByTagName('a')[i].style.cssText="color: #0000ff";
			}
				window.parent.frames[0].document.body.className="mystyle2";
				window.parent.frames[1].document.body.className="mystyle2";
				break;
		case "1":
				document.body.className="mystyle3";
				for (var i = 0; i < 4; i++) {
				document.getElementsByTagName('a')[i].style.cssText="color: #red";
			}
				window.parent.frames[0].document.body.className="mystyle3";
				window.parent.frames[1].document.body.className="mystyle3";
				break;
		case "2":
		for (var i = 0; i < 4; i++) {
				document.getElementsByTagName('a')[i].style.cssText="color: black";
			}
				document.body.className="mystyle";
				window.parent.frames[0].document.body.className="mystyle";
				window.parent.frames[1].document.body.className="mystyle";
				break;
	}
	}


	</script>
</head>

<body class="mystyle">
Производитель
	<OL START="1" id="list1">
		<li><a href="asus/asusobjects.html" target="objects"> ASUS</a></li>
		<li><a href="msi/msiobjects.html" target="objects"> MSI</a></li>
		<li><a href="gigabyte/gigabyteobjects.html" target="objects"> GIGABYTE</a></li>
		<li><a href="asrock/asrockobjects.html" target="objects"> AsRock</a></li>
	</OL>

	<form name="catadd" method="get">
	Введите название производителя
	<input type="text" name="catname" size="16">
	<br>
	Введите имя файла
	<input type="text" name="filename" size="16">
	<input type="button" name="catnamebtn" value="OK" onclick="addcat(this.form)">
	</form>
<br>

<form name="choice" method="POST">
Выберите производителя<br>
	<select size="4" name="manufacturer[]" id="manuf" multiple>
		<option value="ASUS">
			ASUS
		</option>
		<option value="MSI">
			MSI
		</option>
		<option value="GIGABYTE">
			GIGABYTE
		</option>
		<option value="AsRock">
			AsRock
		</option>
	</select><br>

	Выберите тип памяти<br>
	<select name="memory[]">
		<option value="DDR2">
			DDR2
		</option>
		<option value="DDR3">
			DDR3
		</option>
	</select><br>

	Выберите форм фактор<br>
	<input type="radio" name="boardform" value="ATX"> ATX<br>
	<input type="radio" name="boardform" value="ATX+" checked> ATX+<br>
	<input type="radio" name="boardform" value="BTX"> BTX<br>
	<input type="radio" name="boardform" value="mini-ATX"> mini-ATX<br>
	
	Введите количество USB портов<br>
	<input type="text" name="USB" size="8" maxlength="2">
<br>
	<input type="hidden" name="total" value="false">
	<input type="submit" value="OK" onclick="checkForm(form)">
</form>
<BR>

<?php

if($_POST["total"]) 
{
	echo ("Производитель:");
	foreach ($_POST['manufacturer'] as $keys=>$values)
	switch($values)
	{
	case "ASUS":
		echo(" ASUS"); break;
	case "MSI":
		echo(" MSI"); break;
	case "GIGABYE":
		echo(" GIGABYTE"); break;	
	case "AsRock":
		echo(" AsRock"); break;
	}

	echo "<br/>Тип памяти: ";
	foreach ($_POST['memory'] as $key => $value) {
		switch ($value) {
			case 'DDR2':
				echo "DDR2";
				break;
			case 'DDR3':
				echo "DDR2";
				break;
		}
	}

	echo "<br/>Форм-фактор: ";
	foreach ($_POST as $key => $value) {
		switch ($value) {
			case 'ATX':
				echo "ATX";
				break;
			case 'ATX+':
				echo "ATX+";
				break;
			case 'BTX':
				echo "BTX";
				break;
			case 'mini-ATX':
				echo "mini-ATX";
				break;
		}
	}

	echo "<br/>Количество USB портов: ";
	echo ($_POST['USB']);

}
?>
	

<br>


<a href="index.html" target="_parent"  >    Перейти на главную</a> <br>
<!--  -->
<form name="styleForm" method="get">
<select name="selectStyle">
	<option value="0">1</option>
	<option value="1">2</option>
	<option value="2">3</option>
</select>
<input type="button" name="stylecat" value="Сменить стиль" onclick="changeStyle(this.form)">
</form>


</body>
</html>