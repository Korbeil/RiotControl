<?php

  function connect() {
	$config = parse_ini_file( 'config/config.ini', true);
    $link = mysql_connect( $config['mysql']['hostname'], $config['mysql']['username'], $config['mysql']['password']);
    mysql_select_db( $config['mysql']['database'], $link);
    return $link;
  }

  function getSummoners( $auto_update = true) {
    global $link;

    if( $auto_update) {
      $sql = "SELECT * FROM summoner WHERE update_automatically = 1";
    } else {
      $sql = "SELECT * FROM summoner WHERE update_automatically = 0";
    }
    $data = mysql_query( $sql, $link);
    $array = Array();

    while( $current = mysql_fetch_array( $data)) {
      $array[] = $current;
    }

    return $array;
  }

	function getScriptSummonerList() {
		return "
			<script type=\"text/javascript\">
				var update_automatically = false;
				var not_update_automatically = false;
				  
				function globalFunc( string) {
					if( typeof string == \"undefined\") {
						string = '';
					}
				  
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
				
				Effect.BlindUp('update_automatically');
				Effect.BlindUp('not_update_automatically');
				  
				Event.observe( 'more_update_automatically', 'click', function() { globalFunc(); });
				Event.observe( 'more_not_update_automatically', 'click', function() { globalFunc( 'not_'); });
			</script>
		";
	}

?>

