<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="categoriescss.css">
	<link rel="stylesheet" type="text/css" href="objectscss.css">
	<link rel="stylesheet" type="text/css" href="descriptionscss.css">

<style type="text/css">
	.inline{
		display: inline-block;
		/*float: left;*/
		width: 60%;
	}
	.back{
	background: white;
	}
</style>

<script>
function checkForm(form)
{
	//manuf.options[i]!=""
	var one = false;
	var three = false;
	var manuf = document.getElementById("manuf");
	//manuf.options.selectedIndex;
		for (var i = 0; i < 4; i++) {

			if(manuf.option[i].selected){
				one = true;
				alert("ADASDASD");
			break;
		}
		if(!one){
			alert("Âûáåðèòå ïðîèçâîäèòåëÿ!");
			return;
		}

		if (form.USB.value==""){
			 alert("Ââåäèòå êîëè÷åñòâî USB ïîðòîâ")
			 return;
		}else {
				three=true;
				alert("ADASDASD"); 
			}
		if(one && three){
			form.total.value = true;
		}
		return;
	}
}

	
function addcat(form){
		if (form.catname.value=="") 
		{
			alert("Ââåäèòå íàçâàíèå êàòåãîðèè!")
			return;
		}
		if (form.filename.value=="")
		{
			alert("Ââåäèòå èìÿ ôàéëà!")
			return;
		}

		var list = document.getElementById("list1");
		var newDiv = document.createElement("li");
		newDiv.innerHTML = "<a href=" + form.filename.value + 
						   " target=\"objects\">" + form.catname.value + "</a> <input type=\"button\" onclick=\"del(this)\" value=\"Óäàëèòü\"/>";
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
				document.getElementById("categories").className='catmystyle2';
				document.getElementById("objects").className='objmystyle2';
				document.getElementById("descriptions").className='desmystyle2';
				break;
		case "1":
				document.getElementById("categories").className='catmystyle3';
				document.getElementById("objects").className='objmystyle3';
				document.getElementById("descriptions").className='desmystyle3';
				break;
		case "2":
				document.getElementById("categories").className='catmystyle';
				document.getElementById("objects").className='objmystyle';
				document.getElementById("descriptions").className='desmystyle';
				break;		
		}
	}


	</script>
     
	<title>Lab6</title>
</head>
<!-- <frameset cols="60%,*">
	<frameset rows="50%,50%">
		<frame src="objects.html" name="objects" scrolling="no" noresize>
		<frame src="descriptions.html" name="descriptions" noresize>
	</frameset>
	<frame src="categories.php" name="categories" scrolling="yes">
</frameset> -->
<body>
<div class="back">
	<div class="inline">
		<div class="objmystyle" id="objects">
			<?php
				$C = $_GET["C"];
				switch ($C) {
					case "1": include("asus/asusobjects.html"); break;
					case "2": include("msi/msiobjects.html"); break;
					case "3": include("gigabyte/gigabyteobjects.html"); break;
					case "4": include("asrock/asrockobjects.html"); break;
					default: include("objects.html");
				}
			?>
		</div>	
			<div class="desmystyle" id="descriptions">
<?php
			$O = $_GET["O"];
			switch ($O) {
			  case "1-1": include("asus/lga1150description.html"); break;
			  case "1-2": include("asus/lga1151description.html"); break;
			  case "1-3": include("asus/lga1155description.html"); break;
			  case "1-4": include("asus/am1description.html"); break;
			  case "1-5": include("asus/am2description.html"); break;
			  case "1-6": include("asus/am3+description.html"); break;
			  case "2-1": include("msi/lga1151description.html"); break;
			  case "2-2": include("msi/lga1155description.html"); break;
			  case "2-3": include("msi/am3+description.html"); break;
			  case "3-1": include("gigabyte/lga1155description.html"); break;
			  case "3-2": include("gigabyte/am1description.html"); break;
			  case "3-3": include("gigabyte/am2description.html"); break;
			  case "3-4": include("gigabyte/am3+description.html"); break;
			  case "4-1": include("asrock/lga1151description.html"); break;
			  case "4-2": include("asrock/lga1155description.html"); break;
			  case "4-3": include("asrock/am2description.html"); break;
			  case "4-4": include("asrock/am3+description.html"); break;
			  default: include("descriptions.html");
			}
?>
			</div>
	</div>
	<div class="catmystyle" id="categories">
		Ïðîèçâîäèòåëü
	<OL START="1" id="list1">
		<li><a href="index.php?C=1"> ASUS</a></li>
		<li><a href="index.php?C=2"> MSI</a></li>
		<li><a href="index.php?C=3"> GIGABYTE</a></li>
		<li><a href="index.php?C=4"> AsRock</a></li>
	</OL>

	<form name="catadd" method="get">
	Ââåäèòå íàçâàíèå ïðîèçâîäèòåëÿ
	<input type="text" name="catname" size="16">
	<br>
	Ââåäèòå èìÿ ôàéëà
	<input type="text" name="filename" size="16">
	<input type="button" name="catnamebtn" value="OK" onclick="addcat(this.form)">
	</form>
<br>

<form name="choice" method="POST">
Âûáåðèòå ïðîèçâîäèòåëÿ<br>
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

	Âûáåðèòå òèï ïàìÿòè<br>
	<select name="memory[]">
		<option value="DDR2">
			DDR2
		</option>
		<option value="DDR3">
			DDR3
		</option>
	</select><br>

	Âûáåðèòå ôîðì ôàêòîð<br>
	<input type="radio" name="boardform" value="ATX"> ATX<br>
	<input type="radio" name="boardform" value="ATX+" checked> ATX+<br>
	<input type="radio" name="boardform" value="BTX"> BTX<br>
	<input type="radio" name="boardform" value="mini-ATX"> mini-ATX<br>
	
	Ââåäèòå êîëè÷åñòâî USB ïîðòîâ<br>
	<input type="text" name="USB" size="8" maxlength="2">
<br>
	<input type="hidden" name="total" value="false">
	<input type="submit" value="OK" onclick="checkForm(form)">
</form>
<BR>

<?php
echo($_POST['total']);
$tot = $_POST["total"];
if(tot==true){
	echo ("Ïðîèçâîäèòåëü:");
	foreach ($_POST['manufacturer'] as $key=>$value){
	switch($value){
	case 'ASUS':
		echo(" ASUS"); break;
	case 'MSI':
		echo(" MSI"); break;
	case 'GIGABYTE':
		echo(" GIGABYTE"); break;	
	case 'AsRock':
		echo(" AsRock"); break;
		}
	}

	echo "<br/>Òèï ïàìÿòè: ";
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

	echo "<br/>Ôîðì-ôàêòîð: ";
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

	echo "<br/>Êîëè÷åñòâî USB ïîðòîâ: ";
	echo ($_POST['USB']);

}
?>
	

<br>


<a href="index.php?C=99&O=99">    Ïåðåéòè íà ãëàâíóþ</a> <br>
<!--  -->
<form name="styleForm" method="get">
<select name="selectStyle">
	<option value="0">1</option>
	<option value="1">2</option>
	<option value="2">3</option>
</select>
<input type="button" name="stylecat" value="Ñìåíèòü ñòèëü" onclick="changeStyle(this.form)">
</form>

	</div>
</div>
</body>

</html>
