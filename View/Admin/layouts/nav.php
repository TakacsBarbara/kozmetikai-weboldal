<nav class="navbar sticky-top navbar-light bg-light navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminLogin.php">
                <img src="../../Resources/img/logo_navbar.png" alt="logo-image" width="300" class="d-inline-block align-text-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="mainServicesListed.php">Szolgáltatások</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Időpontfoglalás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vélemények jóváhagyása</a>
                    </li>

                </ul>
                <span>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    } else {
                        echo "";
                    }

                    ?>
                </span>



                <button type="button" class="btn btn-info">
                    <a href="./../../Resources/Session/Admin/logout.php">Kilépés</a>
                </button>
            </div>
        </div>
    </nav>