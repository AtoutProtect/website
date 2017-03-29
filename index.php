<?php


require "webdefinition.php";/*Fichier a appeler uniquement dans l'index ainsi que les scripts php appelés par ajax */



include('public/header.php');

	if(isset($_GET['Page']) && !empty($_GET['Page'])){
		$page=$_GET['Page'];
		if(file_exists("controller/".$page.".php")){
			include("controller/".$page.".php");
		}
		else{
			include("public/view_404.php");
		}

	}
	else{

		include('controller/home.php');

	}

include('public/footer.php');

?>


