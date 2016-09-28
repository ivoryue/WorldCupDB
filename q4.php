<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 4</title>
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
	if(!isset($_GET["q4team"]) && !isset($_GET["q4year"])){
	  $optionq = "SELECT country FROM historical ORDER by country";
	  $optionResult = mysqli_query($db, $optionq);
	  #print_r($optionResult);
	  $numRow = mysqli_num_rows($optionResult);
	  #print_r($numRow);
	  echo "Team:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q4team">';
		while ($optionRow = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
		  foreach($optionRow as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit" value = "next">';
	  echo '</form>';
	}elseif(isset($_GET["q4team"]) && !isset($_GET["q4year"])){
	  $optionq2 = sprintf("SELECT year FROM team WHERE team LIKE '%s'", $_GET["q4team"]);
	  $optionResult2 = mysqli_query($db, $optionq2);
	  #print_r($optionResult);
	  $numRow2 = mysqli_num_rows($optionResult2);
	  #print_r($numRow2);
	  print_r("Team selected is <br>");
	  echo '<strong>'.$_GET["q4team"].'</strong>';
	  print_r("<br>");
	  echo "Year:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q4year">';
		while ($optionRow2 = mysqli_fetch_array($optionResult2, MYSQLI_ASSOC)) {
		  foreach($optionRow2 as $key => $value):
			echo "<option value='" . $value . "'>" . $value . "</option>";
		  endforeach;
		}
		echo '</select>';
		echo '<br>';
		echo '<input type = "submit">';
	  echo '</form>';
	  $_SESSION["q4team"] = $_GET["q4team"];
	}else{
	  print_r("Team selected is <br>");
	  echo '<strong>'. $_SESSION["q4team"] .'</strong>';
	  print_r("<br>");
	  print_r("Year selected is <br>");
	  echo '<strong>'. $_GET["q4year"] .'</strong>';
	  print_r("<br>");
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<input type = "submit" value = "Select Again" name = "q4again">';
	  echo '</form>';
	}
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%">
	<br><br><br>
	<?php
	  if(isset($_SESSION["q4team"]) && isset($_GET["q4year"])){
		$query1 = sprintf("SELECT continent, appearance, gf, ga, pts FROM historical WHERE country LIKE '%s'", $_SESSION["q4team"]);
		$query1r = mysqli_query($db, $query1);
		#print_r($query1r);
		if($query1r){
		  $query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC);
		  $query11 = sprintf('SELECT flagurl, flag2url FROM historical WHERE country LIKE "%s"', $_SESSION["q4team"]);
		  $query11r = mysqli_query($db, $query11);
		  #print_r($query21r);
		  $query11Row = mysqli_fetch_array($query11r, MYSQLI_ASSOC);
		  echo "<image src = '". $query11Row['flagurl']."'>";
		  echo ' <strong>'.$_SESSION["q4team"].'</strong> is located in <strong>'.$query1Row["continent"].'</strong>';
		  echo ", it's all-time World Cup achievement and rank in <strong>".$_GET['q4year']."</strong> is:";
		  #print_r($query1Row);
		  #print_r($_SESSION["q4team"]);
		  #print_r(" ");
		  echo "<table cellspacing = '10' align = 'center'>";
		  echo "<tr>";
			#echo '<td></td>';
			#echo '<td>Team</td>';
			echo '<td>Cup Participation(s)</td>';
			echo '<td>Total Goals For</td>';
			echo '<td>Total Goals Against</td>';
			echo '<td>Total Points</td>';
			echo '<td>Rank in '.$_GET["q4year"].'</td>';
		  echo "</tr>";
		  echo "<tr>";
			#echo "<td><image src = '". $query11Row['flagurl']."'></td>";
			#echo '<td>'.$_SESSION["q4team"].'</td>';
			echo '<td>'.$query1Row["appearance"].'</td>';
			echo '<td>'.$query1Row["gf"].'</td>';
			echo '<td>'.$query1Row["ga"].'</td>';
			echo '<td>'.$query1Row["pts"].'</td>';
		  #print_r(implode(' ', $query1Row));
		}
		
		$query2 = sprintf("SELECT rank FROM team WHERE team LIKE '%s' AND year = %s", $_SESSION["q4team"], $_GET["q4year"]);
		$query2r = mysqli_query($db, $query2);
		#print_r($query2r);
		if($query2r){
		  $query2Row = mysqli_fetch_array($query2r, MYSQLI_ASSOC);
		  #print_r("<br>");
		  #print_r($_SESSION["q4team"]);
		  #print_r($query2Row["rank"]);
		  echo '<td>'.$query2Row["rank"].'</td>';
		  echo '</tr>';
		}
		echo "</table>";
		#echo "<image style = 'margin-left = auto; margin-right = auto;' src = '". $query11Row['flag2url']."'>";
	  }else{
		print_r("Please select team and year.");
	  }
	  
	  if(isset($_GET["q4again"])){
		unset($_SESSION["q4team"]);
	  }
	?>
  </div>

</body>
</html> 