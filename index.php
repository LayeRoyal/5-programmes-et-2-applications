<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page D'accueil</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylemenu.css">
    <script src="toggle.js"></script>
</head>
<body>
<nav class="menu">
	<ul class="active">
		<li><a href="index.php?tab=exo1">EXERCICE 1</a></li>
		<li><a href="index.php?tab=exo2">EXERCICE 2</a></li>
		<li><a href="index.php?tab=exo3">EXERCICE 3</a></li>
		<li><a href="index.php?tab=exo4">EXERCICE 4</a></li>
        <li><a href="index.php?tab=exo5">EXERCICE 5</a></li>
        <li><a href="index.php?tab=app1">APLLICATION 1</a></li>
        <li><a href="index.php?tab=app2">APPLICATION 2</a></li>
        <li><a id="quizz" href="quizz/admin.php">QUIZZ</a></li>
    </ul>

	<a  class="toggle-nav" href="#">&#9776;</a>

</nav>  
<div class="contents">
<?php
$tb = isset($_GET['tab']) ? $_GET['tab'] : '';
switch($tb) { 
    case 'exo2': include('exo2.php'); break; 
    case 'exo3': include('exo3.php'); break;  
    case 'exo4': include('exo4.php'); break; 
    case 'exo5': include('exo5.php'); break; 
    case 'app1': include('app1_2/app1.php'); break; 
    case 'app2': include('app1_2/app2.php'); break;
    default:   include('exo1.php');break;
}
     
?>
</div>
</body>
</html>