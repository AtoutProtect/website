<?php


require "webdefinition.php";/*Fichier a appeler uniquement dans l'index ainsi que les scripts php appelés par ajax */

if(isset($_POST['deconnection']) && $_POST['deconnection']==1){
	session_destroy();
	header("Location: ".URL);
}

if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=null;
}

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


