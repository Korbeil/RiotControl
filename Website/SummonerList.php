<?php
	require ('include/function.php');

	include_once( 'include/page/header.php');
	include_once( 'include/page/menu_top.php');
?>
	<center><h3>RiotControl Tools</h3></center>
<?php
	include_once( 'include/page/menu_bottom.php');

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
  
	include_once( 'include/page/footer.php');
?>