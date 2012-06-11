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
    
    <!-- menu -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
      <li><a href="#summoner" data-toggle="tab">Summoners</a></li>
      <li><a href="#database" data-toggle="tab">Database</a></li>
      <li><a href="#about" data-toggle="tab">About</a></li>
      
      <li class="pull-right">
        <div class="input-append">
          <input type="search" class="span3" placeholder="Search" name="search" id="search"><a class="btn add-on" href="#"><i class="icon-search"></i></a><button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        	<ul class="dropdown-menu">
        		<li><a href="#">Summoner</a></li>
        		<li><a href="#">Champion</a></li>
        		<li><a href="#">Item</a></li>
          	</ul>
        </div>
      </li>
      
    </ul>
    
    <!-- content -->
    <div class="tab-content">
      <div class="tab-pane active" id="home">
        <p>Home pane</p>
      </div>
      <div class="tab-pane" id="summoner">
    	<?php include_once( 'include/tab-panes/Summoner.php'); ?>
      </div>
      <div class="tab-pane" id="database">
        <p>Database pane</p>
      </div>
      <div class="tab-pane" id="about">
        <p>About pane</p>
      </div>
    </div>
  
  </div>
</div>

<?php
	include_once( 'include/page/footer.php');
?>
