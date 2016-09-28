<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 6</title>
<meta name="viewport" content="width=device-width, initial-scale=1" HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="querystyle.css">
<style>

</style>
</header>
<body>
  <?php
	$host = "localhost";
	$database = "WorldCupDB";
	$user = "root";
	$password = "Ivory~5229";
	$db = connectToDB($host, $user, $password, $database);
	$db->set_charset('utf8');
	$db->query('SET NAMES utf8');
	$scriptName = $_SERVER["PHP_SELF"];
	function connectToDB($host, $user, $password, $database) {
		$db = mysqli_connect($host, $user, $password, $database);
		if (mysqli_connect_errno()) {
			echo "Connect failed.\n".mysqli_connect_error();
			exit();
		}
		return $db;
	}	
  ?>
  <ul class = "topnav">
	<li class = "topli"><a class="active" href="main.php">Home</a></li>
	<li class = "topli"><a href="q1.php">World Cup</a></li>
	<li class = "topli"><a href="q2.php">Players</a></li>
	<li class = "topli"><a href="q3.php">Stars</a></li>
	<li class = "topli"><a href="q4.php">Team History</a></li>
	<li class = "topli"><a href="q5.php">Country Squads</a></li>
	<li class = "topli"><a href="q6.php">Interactive Map</a></li>
	<li class = "topli"><a href="q7.php">Awards</a></li>
	<li class = "topli"><a href="q8.php">Videos</a></li>
	<li class = "topli"><a href="q9.php">Head to Head</a></li>
  </ul>
  
  <div class = "side">
	<br><br><br>
	<?php
	if(!isset($_GET["q6view"])){
	  echo "Categories:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q6view">';
		  echo "<option value='appearances'>appearances</option>";
		  echo "<option value='hosted'>hosted</option>";
		  echo "<option value='championships'>championships</option>";
		  echo "<option value='top4'>top4</option>";
		  echo "<option value='points'>points</option>";
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit" value = "submit">';
	  echo '</form>';
	}else{
	  print_r("The category selected is <br>");
	  echo '<strong>'.$_GET["q6view"].'</strong>';
	  print_r("<br>");
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" value = "Select Again">';
	  echo '</form>';
	}
	?>
  </div>
	
  <div class = "content" style = "margin-left:17%">
	<br><br><br>
	<?php
	  if(!isset($_GET["q6view"])){
		print_r("Please select category.");
	  }else{
		if($_GET["q6view"] == 'appearances'){
		  echo "<script type='text/javascript' src='https://10az.online.tableau.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1004px; height: 836px;'><object class='tableauViz' width='1004' height='836' style='display:none;'><param name='host_url' value='https%3A%2F%2F10az.online.tableau.com%2F' /> <param name='site_root' value='&#47;t&#47;ivoyue' /><param name='name' value='worldcup&#47;appearance1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showShareOptions' value='true' /></object></div>";
		}elseif($_GET["q6view"] == 'hosted'){
		  echo "<script type='text/javascript' src='https://10az.online.tableau.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1004px; height: 836px;'><object class='tableauViz' width='1004' height='836' style='display:none;'><param name='host_url' value='https%3A%2F%2F10az.online.tableau.com%2F' /> <param name='site_root' value='&#47;t&#47;ivoyue' /><param name='name' value='worldcup&#47;host1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showShareOptions' value='true' /></object></div>";
		}elseif($_GET["q6view"] == 'championships'){
		  echo "<script type='text/javascript' src='https://10az.online.tableau.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1004px; height: 836px;'><object class='tableauViz' width='1004' height='836' style='display:none;'><param name='host_url' value='https%3A%2F%2F10az.online.tableau.com%2F' /> <param name='site_root' value='&#47;t&#47;ivoyue' /><param name='name' value='worldcup&#47;champion1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showShareOptions' value='true' /></object></div>";
		}elseif($_GET["q6view"] == 'top4'){
		  echo "<script type='text/javascript' src='https://10az.online.tableau.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1004px; height: 836px;'><object class='tableauViz' width='1004' height='836' style='display:none;'><param name='host_url' value='https%3A%2F%2F10az.online.tableau.com%2F' /> <param name='site_root' value='&#47;t&#47;ivoyue' /><param name='name' value='worldcup&#47;top81' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showShareOptions' value='true' /></object></div>";
		}elseif($_GET["q6view"] == 'points'){
		  echo "<script type='text/javascript' src='https://10az.online.tableau.com/javascripts/api/viz_v1.js'></script><div class='tableauPlaceholder' style='width: 1004px; height: 836px;'><object class='tableauViz' width='1004' height='836' style='display:none;'><param name='host_url' value='https%3A%2F%2F10az.online.tableau.com%2F' /> <param name='site_root' value='&#47;t&#47;ivoyue' /><param name='name' value='worldcup&#47;point1' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='showShareOptions' value='true' /></object></div>";
		}
	  }
	?>

	
	
  </div>

</body>
</html> 