<?php
	require ('include/function.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		
		<link rel="stylesheet" type="text/css" href="include/style/style.css" media="all">
		
		<script src="http://script.aculo.us/prototype.js" type="text/javascript"></script>
		<script src="http://script.aculo.us/scriptaculous.js" type="text/javascript"></script>
	</head>
	<body>
			
			<div id="content">
			<div id="menu">
			
	<center><h3>RiotControl Tools</h3></center>

</div>

<table id="main" width="100%"><tr id="main"><td valign="center"><center>
<?php
  echo '<br/><br/>';
	echo '<center><span style="font-size:xx-small;">Orginal idea from Uhkis FreeNode#riotcontrol</span></center>';

	$link = connect();
	$region = Array(
		0 => "NA",
		1 => "EUW",
		2 => "EUNE",
	);

	echo "<br/><br/>";
  
	echo '
		<table width="100%" style="text-align:center;"><tr height="100%"><td width="50%" valign="top">
		<b>Automatically updated</b> (Size: <b>'.count(getSummoners()).'</b>) [ <a href="#" id="more_update_automatically">+</a> ]<br/>
		<div id="update_automatically" style="visibility:hidden;">';
		
	foreach( getSummoners() as $summoner) {
		$href = 'http://riotcontrol.mouth-serv.com/Summoner/'.$region[$summoner['region']].'/'.$summoner['account_id'];
		echo '<a href="'.$href.'">'.$summoner['summoner_name'].'</a><br/>';
	}
	
	echo '
		</div>
		</td><td width="50%" valign="top">
		<b>Others</b> (Size: <b>'.count(getSummoners(false)).'</b>) [ <a href="#" id="more_not_update_automatically">+</a> ]<br/>
		<div id="not_update_automatically" style="visibility:hidden;">';
		
	foreach( getSummoners(false) as $summoner) {
		$href = 'http://riotcontrol.mouth-serv.com/Summoner/'.$region[$summoner['region']].'/'.$summoner['account_id'];
		echo '<a href="'.$href.'">'.$summoner['summoner_name'].'</a><br/>';
	}
	echo '
		</div>
		</td></tr></table>';

	echo getScriptSummonerList();
?>

</center></td></tr></table>
</div>
</body>
</html>