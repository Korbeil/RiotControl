<html>
  <head>
    <script src="http://script.aculo.us/prototype.js" type="text/javascript"></script>
    <script src="http://script.aculo.us/scriptaculous.js" type="text/javascript"></script>
    <script type="text/javascript">
      var update_automatically = false;
      var not_update_automatically = false;
      
	  function globalFunc( string = "") {
	    if( eval(string+'update_automatically')) {
		  eval(string+'update_automatically = false;');
		  Effect.BlindUp(string+'update_automatically');
		  $('more_'+string+'update_automatically').innerHTML = '+';
	    } else {
		  eval(string+'update_automatically = true;');
		  Effect.BlindDown(string+'update_automatically');
		  $(string+'update_automatically').setStyle( { visibility:'visible' } );
		  $('more_'+string+'update_automatically').innerHTML = '-';
		}
	  }
    </script>
  </head>
  <body>
<?php
  require ('function.php');

  $link = connect();
  $region = Array(
    0 => "NA",
    1 => "EUW",
    2 => "EUNE",
  );

  echo '<center><span style="font-size:xx-small;">Orginal idea from Uhkis FreeNode#riotcontrol</span></center>';

  echo "<br/><br/>";
  
  echo '<table width="100%" style="text-align:center;"><tr height="100%"><td width="50%" valign="top">';
  echo '<b>Automatically updated</b> (Size: <b>'.count(getSummoners()).'</b>) [ <a href="#" id="more_update_automatically">+</a> ]<br/>';

  echo '<div id="update_automatically" style="visibility:hidden;">';
  foreach( getSummoners() as $summoner) {
    $href = 'http://riotcontrol.mouth-serv.com/Summoner/'.$region[$summoner['region']].'/'.$summoner['account_id'];
    echo '<a href="'.$href.'">'.$summoner['summoner_name'].'</a><br/>';
  }
  echo '</div>';

  echo '</td><td width="50%" valign="top">';
  echo '<b>Others</b> (Size: <b>'.count(getSummoners(false)).'</b>) [ <a href="#" id="more_not_update_automatically">+</a> ]<br/>';

  echo '<div id="not_update_automatically" style="visibility:hidden;">';
  foreach( getSummoners(false) as $summoner) {
    $href = 'http://riotcontrol.mouth-serv.com/Summoner/'.$region[$summoner['region']].'/'.$summoner['account_id'];
    echo '<a href="'.$href.'">'.$summoner['summoner_name'].'</a><br/>';
  }
  echo '</div>';
  echo '</td></tr></table>';

?>
    <script type="text/javascript">
      Effect.BlindUp('update_automatically');
      Effect.BlindUp('not_update_automatically');
      
      Event.observe( 'more_update_automatically', 'click', function() { globalFunc(); });
      Event.observe( 'more_not_update_automatically', 'click', function() { globalFunc( 'not_'); });
    </script>
  </body>
</html>

