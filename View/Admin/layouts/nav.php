<nav class="navbar sticky-top navbar-light bg-light navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="mainServicesListed.php">
            <img src="../../Resources/img/logo_navbar.png" alt="logo-image" width="300" class="d-inline-block align-text-top">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link-style" href="mainServicesListed.php">Szolgáltatások</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-style" href="#">Időpontfoglalás</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-style" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-style" href="#">Vélemények jóváhagyása</a>
                </li>
            </ul>
            
            <div class="dropdown">
                <button class="dropbtn">
                    <span id="nav-username">
                    <i class="far fa-user"></i>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    } else {
                        echo "";
                    }
                    ?>
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a class="nav-link-style" href="./changeAdminPassword.php">
                    <i class="fas fa-key"></i>
                    Jelszó módosítása</a>
                    <a class="nav-link-style" href="./../../Resources/Session/Admin/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Kilépés</a>
                </div>
            </div> 
        </div>
    </div>
</nav>