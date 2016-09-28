<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 1</title>
<meta name="viewport" content="width=device-width, initial-scale=1" HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="querystyle.css">
<style>

</style>
</header>
<body>
  <?php
	//session_start();
	//header('Content-Type: charset=utf-8'); 
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
	  if(!isset($_GET["q1year"]) && !isset($_GET["q1team"])){
		$optionq = "SELECT year FROM worldcup";
		$optionResult = mysqli_query($db, $optionq);
		#print_r($optionResult);
		$numRow = mysqli_num_rows($optionResult);
		#print_r($numRow);
		echo "Year:<br>";
		echo "<form action = '$scriptName' method = 'GET'>";
		  echo '<select name = "q1year">';
		  while ($optionRow = mysqli_fetch_array($optionResult, MYSQLI_ASSOC)) {
			foreach($optionRow as $key => $value):
			  echo "<option value='" . $value . "'>" . $value . "</option>";
			endforeach;
		  }
		  echo '</select>';
		  echo '<br>';
		  echo '<input type = "submit" value = "next">';
		echo '</form>';
	  }elseif(isset($_GET["q1year"]) && !isset($_GET["q1team"])){
		print_r("Year selected is <br>");
		echo "<strong>".$_GET['q1year']."</strong>";
		print_r("<br>");
		$optionq2 = sprintf("SELECT team from team where year = %s", $_GET["q1year"]);
		$optionResult2 = mysqli_query($db, $optionq2);
		#print_r($optionResult);
		$numRow2 = mysqli_num_rows($optionResult2);
		echo "Team:<br>";
		echo "<form action = '$scriptName' method = 'GET'>";
		  echo '<select name = "q1team">';
		  while ($optionRow2 = mysqli_fetch_array($optionResult2, MYSQLI_ASSOC)) {
			foreach($optionRow2 as $key => $value):
			  echo "<option value='" . $value . "'>" . $value . "</option>";
			endforeach;
		  }
		  echo '</select>';
		  echo '<br>';
		  echo '<input type = "submit">';
		echo '</form>';
		$_SESSION["q1year"] = $_GET["q1year"];
	  }else{
		print_r("Year selected is <br>");
		echo '<strong>'. $_SESSION["q1year"] .'</strong>';
		print_r("<br>");
		print_r("Team selected is <br>");
		echo '<strong>'. $_GET["q1team"] .'</strong>';
		print_r("<br>");
		echo "<form action = '$scriptName' method = 'GET'>";
		  echo '<input type = "submit" value = "Select Again" name = "q1again">';
		echo '</form>';
	  }
	?>
  </div>
  
  <div class = "content" style = "margin-left:17%">
	<br><br><br>
	<?php
	  if(isset($_SESSION["q1year"]) && isset($_GET["q1team"])){
		##q1
		$query1 = sprintf("SELECT host FROM worldcup WHERE year = %s", $_SESSION["q1year"]);
		$query1r = mysqli_query($db, $query1);
		$numRow = mysqli_num_rows($query1r);
		#print_r($query1r);
		if($query1r){
		  $query1Row = mysqli_fetch_array($query1r, MYSQLI_ASSOC);
		  echo "Host country is ";  
		  $query11 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $query1Row["host"]);
		  $query11r = mysqli_query($db, $query11);
		  #print_r($query11r);
		  $query11Row = mysqli_fetch_array($query11r, MYSQLI_ASSOC);
		  echo "<image src = '". $query11Row['flagurl']."'>";
		  echo '<strong> '.$query1Row["host"].'</strong>';
		  echo "<br>";
		}
		##q2
		$query2 = sprintf("SELECT team, rank FROM team WHERE year = %s ORDER BY rank", $_SESSION["q1year"]);
		$query2r = mysqli_query($db, $query2);
		#print_r($query2r);
		if($query2r){
		  echo "<br>Participants and their rank: ";
		  echo "<table cellspacing='10'>";
		  echo "<tr>";
			echo '<td></td>';
			echo '<td>Team</td>';
			echo '<td>Rank</td>';
		  echo "</tr>";
		  while($query2Row = mysqli_fetch_array($query2r, MYSQLI_ASSOC)){
			#print_r($query2Row["team"]);
			echo '<tr>';
			$query21 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $query2Row["team"]);
			$query21r = mysqli_query($db, $query21);
			#print_r($query21r);
			$query21Row = mysqli_fetch_array($query21r, MYSQLI_ASSOC);
			#print_r($query21Row);
			#print_r("<image src = '". $query21Row['flagurl']."'>");  
			  echo "<td><image src = '". $query21Row['flagurl']."'></td>";
			  echo '<td>'.$query2Row["team"].'</td>';
			  echo '<td>'.$query2Row["rank"].'</td>';
			echo '</tr>';
		  }
		  echo "</table>";
		}
		
		##q3
		echo '<div style = "position: absolute; left: 45%; top: 12.9%">';
		$query3 = sprintf('SELECT year, day, month, team1, team2, team1score, team2score, team1pen, team2pen FROM game WHERE year = %s AND (team1 LIKE "%s" OR team2 LIKE "%s")', $_SESSION["q1year"], $_GET["q1team"], $_GET["q1team"]);
		#print_r($query3);
		$query3r = mysqli_query($db, $query3);
		#print_r($query3r);
		if($query3r){
		  print_r("<br>Game results for ");
		  $query31 = sprintf('SELECT flagurl FROM historical WHERE country LIKE "%s"', $_GET["q1team"]);
		  $query31r = mysqli_query($db, $query31);
		  #print_r($query21r);
		  $query31Row = mysqli_fetch_array($query31r, MYSQLI_ASSOC);
		  echo "<image src = '". $query31Row['flagurl']."'>";
		  echo '<strong> '.$_GET["q1team"].'</strong>';
		  echo "<table cellspacing='10'>";
		  echo "<tr>";
			echo '<td>Date</td>';
			echo '<td>Team1 vs. Team2</td>';
			echo '<td>Score</td>';
			echo '<td>Penalty</td>';
		  echo "</tr>";
		  while($query3Row = mysqli_fetch_array($query3r, MYSQLI_ASSOC)){
			echo '<tr>';
		      echo '<td>'.$query3Row["year"].'.'.$query3Row["month"].'.'.$query3Row["day"].'</td>';
			  echo '<td>'.$query3Row["team1"].' vs. '.$query3Row["team2"].'</td>';
			  echo '<td>'.$query3Row["team1score"].' - '.$query3Row["team2score"].'</td>';
			  if($query3Row["team1pen"] == '' || $query3Row["team2pen"] == ''){
				echo '<td>'.''.'</td>';
			  }else{
				echo '<td>'.'('.$query3Row["team1pen"].' - '.$query3Row["team2pen"].')'.'</td>';
			  }
			echo '</tr>';
		  }
			#echo '<td>'.'<image  src = "logo/'.$_GET["q1year"].'.gif" width = "auto" height = "auto">'.'</td>';
		  echo "</table>";
		}
		echo "</div>";
		
	  }else{
		print_r("Please select year and team.");
	  }
	  
	  if(isset($_GET["q1again"])){
		unset($_SESSION["q1year"]);
	  }
	?>
  </div>

</body>
</html> 
