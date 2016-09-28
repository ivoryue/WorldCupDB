<?php
	session_start();
	header('Content-Type: charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
<header>  
<title>Query Page 8</title>
<meta name="viewport" content="width=device-width, initial-scale=1" HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="querystyle2.css">
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
	if(!isset($_GET["q8year"])){
	  $optionq = "SELECT year FROM worldcup";
	  $optionResult = mysqli_query($db, $optionq);
	  #print_r($optionResult);
	  $numRow = mysqli_num_rows($optionResult);
	  #print_r($numRow);
	  echo "Year:<br>";
	  echo "<form action = '$scriptName' method = 'GET'>";
		echo '<select name = "q8year">';
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
	  echo '<strong>'.$_GET["q8year"].'</strong>';
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
	  if(isset($_GET["q8year"])){
		echo '<table align = "center" width = "600">';
		  echo '<tr><td>';
		if($_GET["q8year"] == 1930){
		  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/P4ZkR-US3e8" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The stadium gates were opened at 8 am (6 hours before the game commenced) and by noon the stadium of full. Montevideo was buzzing as Uruguay - the hosts - took on Argentina in a replay of the 1928 Olympic final in the first World Cup since the formation of FIFA. I own absolutely none of the material - audio is "Break the Spell" by All Mankind and the video belongs to FIFA. <br>Uruguay 4-2 Argentina';
		}
		if($_GET["q8year"] == 1934){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/5LrsBxaf1ok" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1934 FIFA World Cup Final was the deciding match of the 1934 FIFA World Cup. It was contested by Italy and Czechoslovakia. Italy won the game 2-1.';
		}
		if($_GET["q8year"] == 1938){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/cwGdFmwMGSM" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1938 FIFA World Cup Final was the deciding match of the 1938 FIFA World Cup. It was contested by Italy and Hungary. Italy won the game 4-2 to win the last tournament before World War II.';
		}
		if($_GET["q8year"] == 1950){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/tO4UY0wYTu4" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>Uruguay vs Brazil was the decisive match of the final group stage at the 1950 FIFA World Cup. Unlike other World Cups, the 1950 winner was determined by a final group stage, with the final four teams playing in round-robin format, instead of a knockout stage. With Brazil one point ahead of Uruguay going into the match, Uruguay needed a win while Brazil needed only to avoid defeat to claim the title of world champions.<br>Uruguay 2-1 Brazil';
		}
		if($_GET["q8year"] == 1954){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/bfjxgT6SDYk" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1954 FIFA World Cup Final, also known as the Miracle of Bern, was the final match of the 1954 FIFA World Cup, the fifth FIFA World Cup. The game saw the underdogs West Germany beat the largely favoured Hungary 3–2.';
		}
		if($_GET["q8year"] == 1958){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/Syncd5yq8o4" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1958 FIFA World Cup Final contested by Brazil and Sweden. Brazil won the World Cup 5-2 by defeating Sweden, and thus won the trophy for the first time.';
		}
		if($_GET["q8year"] == 1962){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/jedEN2AELts" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1962 FIFA World Cup Final was contested by Czechoslovakia and Brazil. Brazil won the game 3-1 to record their second consecutive World Cup victory. Both teams had played each other during the group stage which ended in a goalless draw. ';
		}
		if($_GET["q8year"] == 1966){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/zzxEIPZ56ic" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1966 FIFA World Cup Final was the final match in the 1966 FIFA World Cup, the eighth football World Cup and one of the most controversial finals ever. <br>England 4-2 West Germany';
		}
		if($_GET["q8year"] == 1970){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/3_3nRplehGk" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1970 FIFA World Cup contested by Brazil and Italy, marked the first time that two former world champions met in a final. <br> Brazil 4-1 Italy';
		}
		if($_GET["q8year"] == 1974){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/DsnK_4IWBWc" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1974 FIFA World Cup Final was contested by the Netherlands and West Germany, with the West Germans winning 2–1.';
		}
		if($_GET["q8year"] == 1978){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/rmXdIyRwAfU" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1978 FIFA World Cup Final was contested by hosts Argentina and the Netherlands. The match was won by the Argentines in extra time by a score of 3–1.';
		}
		if($_GET["q8year"] == 1982){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/1LVCew73zTQ" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1982 FIFA World Cup Final was contested between Italy and West Germany. Final Score: Italy 3-1 Germany';
		}
		if($_GET["q8year"] == 1986){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/GazBbe2yepw" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1986 FIFA World Cup Final was contested by Argentina and West Germany. Argentina won the match 3–2 in normal time.';
		}
		if($_GET["q8year"] == 1990){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/saey6eRFmwU" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1990 FIFA World Cup Final was a football match played between West Germany and Argentina. The game was won by West Germany, with a late penalty kick taken by Andreas Brehme being the games only goal.';
		}
		if($_GET["q8year"] == 1994){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/YH6Sq2l7sTo" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>In 1994 FIFA World Cup Final, Brazil beat Italy 3–2 on penalties to claim their fourth World Cup title when the match finished 0–0 after extra time. This meant that Brazil surpassed Italy and Germany as the tournaments most successful nation.';
		}
		if($_GET["q8year"] == 1998){
		  echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/QZqp5m-NMaQ" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 1998 FIFA World Cup Final was contested by Brazil and France. France won the match 3–0 to claim the World Cup for the first time, with the timing of the match two days before Bastille Day adding to the significance of the victory.';
		}
		if($_GET["q8year"] == 2002){
		  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/eVp9a_cdE7A" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 2002 FIFA World Cup Final was contested by Germany and Brazil. It was the first World Cup meeting between the two sides. Brazil won the match 2–0, winning a record fifth title.';
		}
		if($_GET["q8year"] == 2006){
		  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/N5sTnWkEv-U" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 2006 FIFA World Cup Final was contested by Italy and France. Italy beat France on penalties after the match finished 1–1 after extra time. pen(5-3)';
		}
		if($_GET["q8year"] == 2010){
		  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/4f8MumI2dZ4" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo '<br>The 2010 FIFA World Cup was contested by Spain and Netherlands. Spain defeated the Netherlands 1–0 with a goal from Andrés Iniesta four minutes from the end of extra time.';
		}
		if($_GET["q8year"] == 2014){
		  echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/FifISKfvn6g" frameborder="0" allowfullscreen></iframe>';
		  echo '</td></tr><tr><td>';
		  echo "<br>The 2014 FIFA World Cup Final was contested by Germany and Brazil. Germany defeated Argentina 1–0 in extra time, with the only goal being scored by Mario Götze. The match was the third final between the two countries, a World Cup record, after their 1986 and 1990 matches, and billed as the world's best player (Lionel Messi) versus the world's best team (Germany).";
		}
		echo '</td></tr>';
		echo '</table>';
	  }else{
		print_r("Please select year.");
	  }
	?>
  </div>

</body>
</html> 