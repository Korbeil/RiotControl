<?php
	include_once( 'include/page/header.php');
  
  /*
	echo '<center><h3>RiotControl Tools</h3></center>';
	include_once( 'include/page/menu_bottom.php');
	echo '<br/><br/>';
	echo '<a href="SummonerList.php">Summoner List</a>';
	*/
?>

<div class="container">
  <br/>
  <div class="well">

  <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
      <li><a href="#items" data-toggle="tab">Items</a></li>
      <li><a href="#champions" data-toggle="tab">Champions</a></li>
      <li class="pull-right">
        <div class="input-append">
          <input type="search" class="span3" placeholder="Search" name="search" id="search"><a class="btn add-on" href="#"><i class="icon-search"></i></a>
        </div>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="home">
        <p>Home pane</p>
      </div>
      <div class="tab-pane" id="items">
        <p>Items pane</p>
      </div>
      <div class="tab-pane" id="champions">
        <p>Champions pane</p>
      </div>
    </div>
  </div>
</div>

<?php
	
	include_once( 'include/page/footer.php');
?>
