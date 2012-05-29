<?php

  function connect() {
    $link = mysql_connect( 'localhost', 'riotcontrol', 'riotpass567');
    mysql_select_db( 'riotcontrol', $link);
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

