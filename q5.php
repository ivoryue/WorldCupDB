<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 5</title>
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
	if(!isset($_GET["q5team"]) && !isset($_GET["q5year"])){
	  $optionq = "SELECT country FROM historical ORDER by country";
	  $optionResult = mysqli_query($db, $optionq);
	  #print_r($optionResult);
	  $numRow = mysqli_num_rows($optionResult);
	  #print_r($numRow);
	  echo "Team:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q5team">';
		while ($optionRow = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
		  foreach($optionRow as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit" value = "next">';
	  echo '</form>';
	}elseif(isset($_GET["q5team"]) && !isset($_GET["q5year"])){
	  $optionq2 = sprintf("SELECT year FROM team WHERE team LIKE '%s'", $_GET["q5team"]);
	  $optionResult2 = mysqli_query($db, $optionq2);
	  #print_r($optionResult);
	  $numRow2 = mysqli_num_rows($optionResult2);
	  #print_r($numRow2);
	  print_r("Team selected is <br>");
	  echo '<strong>'.$_GET["q5team"].'</strong>';
	  print_r("<br>");
	  echo "Year:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q5year">';
		echo "<option value='Allyears'>All years</option>";
		while ($optionRow2 = mysqli_fetch_array($optionResult2, MYSQLI_ASSOC)) {
		  foreach($optionRow2 as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit">';
	  echo '</form>';
	  $_SESSION["q5team"] = $_GET["q5team"];
	}else{
	  print_r("Team selected is <br>");
	  echo '<strong>'. $_SESSION["q5team"] .'</strong>';
	  print_r("<br>");
	  print_r("Year selected is <br>");
	  echo '<strong>'. $_GET["q5year"] .'</strong>';
	  print_r("<br>");
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" value = "Select Again" name = "q5again">';
	  echo '</form>';
	}
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%;">
	<br><br><br>
	<?php
	  if(isset($_SESSION["q5team"]) && isset($_GET["q5year"])){
		#echo $_GET["q5year"];
		if($_GET["q5year"] == 'Allyears'){
		$query1 = sprintf("SELECT * FROM player WHERE team LIKE '%s' ORDER BY year", $_SESSION["q5team"]);
		$query1r = mysqli_query($db, $query1);
		#print_r($query1r);
		  if($query1r){
			echo 'Players that represented ';
			$query11 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $_SESSION["q5team"]);
			$query11r = mysqli_query($db, $query11);
			#print_r($query11r);
			$query11Row = mysqli_fetch_array($query11r, MYSQLI_ASSOC);
			echo "<image src = '". $query11Row['flagurl']."'>";
			echo '<strong> '.$_SESSION["q5team"].'</strong>: <br>';
			echo "<table align = 'center'>";
			  echo "<tr>";
				echo '<td>Year</td>';
				#echo '<td>Team</td>';
				echo '<td>Name</td>';
				echo '<td>Date of Birth</td>';
				echo '<td>Age</td>';
				echo '<td>Goals</td>';
				echo '<td>Penalty Goals</td>';
			  echo "</tr>";
			while($query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC)){
			  echo '<tr>';
				echo '<td>'.$query1Row["year"].'</td>';
				#echo '<td>'.$query1Row["team"].'</td>';
				echo '<td>'.$query1Row["name"].'</td>';
				echo '<td>'.$query1Row["bday"].' '.$query1Row["bmonth"].' '.$query1Row["byear"].'</td>';
				echo '<td>'.$query1Row["age"].'</td>';
				$query12 = sprintf('SELECT goal, pengoal FROM goal WHERE year = %s and name LIKE "%s"', $query1Row["year"], $query1Row["name"]);
				#print_r($query12);
				$query12r =  mysqli_query($db, $query12);
				$numRow12 = mysqli_num_rows($query12r);
				#print_r($query12r);
				#print_r('<br>');
				if($query12r && $numRow12 > 0){
				  $query12Row = mysqli_fetch_array($query12r, MYSQLI_ASSOC);
				  echo '<td>'.$query12Row["goal"].'</td>';
				  echo '<td>'.$query12Row["pengoal"].'</td>';
				}else{
				  echo '<td>0</td>';
				  echo '<td>0</td>';
				}
			  echo '</tr>';
			}
			echo "</table>";
		  }
	  }else{
		$query2 = sprintf("SELECT * FROM player WHERE team LIKE '%s' and year = %s", $_SESSION["q5team"], $_GET["q5year"]);
		$query2r = mysqli_query($db, $query2);
		#print_r($query1r);
		  if($query2r){
			echo 'Players that represented ';
			$query21 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $_SESSION["q5team"]);
			$query21r = mysqli_query($db, $query21);
			#print_r($query11r);
			$query21Row = mysqli_fetch_array($query21r, MYSQLI_ASSOC);
			echo "<image src = '". $query21Row['flagurl']."'>";
			echo '<strong> '.$_SESSION["q5team"].'</strong>';
			echo ' in<strong> '.$_GET["q5year"].'</strong>: ';
			echo "<table align = 'center'>";
			  echo "<tr>";
				#echo '<td>Year</td>';
				#echo '<td>Team</td>';
				#echo '<td>Year</td>';
				echo '<td>Name</td>';
				echo '<td>Date of Birth</td>';
				echo '<td>Age</td>';
				echo '<td>Goals</td>';
				echo '<td>Penalty Goals</td>';
			  echo "</tr>";
			while($query2Row = mysqli_fetch_array($query2r, MYSQLI_ASSOC)){
			  echo '<tr>';
				#echo '<td>'.$query2Row["year"].'</td>';
				#echo '<td>'.$query1Row["team"].'</td>';
				echo '<td>'.$query2Row["name"].'</td>';
				echo '<td>'.$query2Row["bday"].' '.$query2Row["bmonth"].' '.$query2Row["byear"].'</td>';
				echo '<td>'.$query2Row["age"].'</td>';
				$query22 = sprintf('SELECT goal, pengoal FROM goal WHERE year = %s and name LIKE "%s"', $query2Row["year"], $query2Row["name"]);
				#print_r($query12);
				$query22r =  mysqli_query($db, $query22);
				$numRow22 = mysqli_num_rows($query22r);
				#print_r($query12r);
				#print_r('<br>');
				if($query22r && $numRow22 > 0){
				  $query22Row = mysqli_fetch_array($query22r, MYSQLI_ASSOC);
				  echo '<td>'.$query22Row["goal"].'</td>';
				  echo '<td>'.$query22Row["pengoal"].'</td>';
				}else{
				  echo '<td>0</td>';
				  echo '<td>0</td>';
				}
			  echo '</tr>';
			}
			echo "</table>";
		  }
	  }
	  }else{
		print_r("Please select team and year.");
	  }
	  
	  if(isset($_GET["q5again"])){
		unset($_SESSION["q5team"]);
	  }
	?>
  </div>

</body>
</html> 