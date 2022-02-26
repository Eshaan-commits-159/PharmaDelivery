<?php

$username= $_SESSION["user_id"];
	
?>

<header class="header" id="header">
    <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
   
    <!-- <div class="header__img">
        <p ><b><?php   ?></b></p>
    </div> -->
    <div class="header__username">
    	<p><b><?php  echo "User: ",$username;   ?></p>
    </div>
</header>