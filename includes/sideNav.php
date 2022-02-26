
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="index.php" class="nav__logo" <?php if($active=='index') echo"active"; ?>>
                <img src="assets/img/logo.svg" style="height: 30px; width: 30px;">
                <span class="nav__logo-name">PharmaDelivery</span>
            </a>

            <div class="nav__list">
                <a href="ward.php" class="nav__link  " <?php if($active=='ward') echo"active"; ?>>
                <i class='bx bx-camera nav__icon' ></i>
                    <span class="nav__name">Scan Here</span>
                </a>

                <a href="patient.php" class="nav__link  " <?php if($active=='patient') echo"active"; ?>>
                    <i class='bx bx-female nav__icon' ></i>
                    <span class="nav__name">Nurse Login</span>
                </a>

                <a href="delivered.php" class="nav__link " <?php if($active=='delivered') echo"active"; ?>>
                <i class='bx bx-task nav__icon' ></i>
                    <span class="nav__name">Delivered</span>
                </a>
                <a href="allDetails.php" class="nav__link " <?php if($active=='allDetails') echo"active"; ?>>
                <i class='bx bx-list-ol nav__icon' ></i>
                    <span class="nav__name">All Details</span>
                </a>
				
            </div>
        </div>

        <a href="includes/logout.php" class="nav__link">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name logout_btn">Log Out</span>
        </a>

	  
			

    </nav>
</div>