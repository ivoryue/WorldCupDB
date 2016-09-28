<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 7</title>
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
	if(!isset($_GET["q7year"])){
	  $optionq = "SELECT year FROM worldcup";
	  $optionResult = mysqli_query($db, $optionq);
	  #print_r($optionResult);
	  $numRow = mysqli_num_rows($optionResult);
	  #print_r($numRow);
	  echo "Year:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q7year">';
		while ($optionRow = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
		  foreach($optionRow as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit">';
	  echo '</form>';
	}else{
	  print_r("Year selected is <br>");
	  echo '<strong>'.$_GET["q7year"].'</strong>';
	  print_r("<br>");
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" value = "Select Again">';
	  echo '</form>';
	}
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%;">
	<br><br><br>
	<?php
	  if(isset($_GET["q7year"])){
		print_r("The player(s) that won awards in ");
		echo '<strong>'.$_GET["q7year"].'</strong> are:<br>';
		##q1
		$query1 = sprintf("SELECT GBallCountry,GBall,GBootCountry,GBoot,GGloveCountry,GGlove FROM worldcup WHERE year = %s", $_GET["q7year"]);
		$query1r = mysqli_query($db, $query1);
		$numRow = mysqli_num_rows($query1r);
		#print_r($query1r);
		if($query1r){
		  echo "<table cellspacing = '10'>";
		  $query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC);
		  #print_r($query1Row);
		  echo "<br>";
		  echo "<tr>";
			echo '<td>Team</td>';
			echo '<td>Name</td>';
			echo '<td>Award</td>';
		  echo "</tr>";
		  if($query1Row["GBall"] != ''){
		  echo '<tr>';
		    echo '<td>'.$query1Row["GBallCountry"].'</td>';
			echo '<td>'.$query1Row["GBall"].'</td>';
			echo '<td>Golden Ball</td>';
		  echo '</tr>';
		  }
		  if($query1Row["GBoot"] != ''){
		  echo '<tr>';
		    echo '<td>'.$query1Row["GBootCountry"].'</td>';
			echo '<td>'.$query1Row["GBoot"].'</td>';
			echo '<td>Golden Boot</td>';
		  echo '</tr>';
		  }

		  echo '<tr>';
		    echo '<td>'.$query1Row["GGloveCountry"].'</td>';
			echo '<td>'.$query1Row["GGlove"].'</td>';
			echo '<td>Golden Glove</td>';
		  echo '</tr>';
		  
		  echo "</table>";
		}
		
	  }else{
		print_r("Please select year.");
	  }
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%; position: absolute; left: 38%; top: 0%">
	<br><br><br>
	<?php
	  if(isset($_GET["q7year"])){
		echo '<image  src = "logo/'.$_GET["q7year"].'.gif" width = "auto" height = "auto">'; 
	  }
	?>
  </div>

</body>
</html> 