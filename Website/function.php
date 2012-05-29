<?php

  function connect() {
	$config = parse_ini_file( 'config.ini', true);
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

?>

