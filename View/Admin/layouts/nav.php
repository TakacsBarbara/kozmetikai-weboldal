<div class="container-fluid">
    <div class="row">
        <div class="navbar-desktop col-12">
            <nav class="navbar sticky-top navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="mainServicesListed.php">
                        <img src="../../Resources/img/logo_navbar.png" alt="logo-image" width="300" class="d-inline-block align-text-top">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link-style" href="mainServicesListed.php">Szolgáltatások</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="manageAppointmentBooking.php">Időpontfoglalás</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="guestBook.php">Vélemények jóváhagyása</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <i class="far fa-user"></i>
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                <a class="nav-link-style-drop" href="./changeAdminPassword.php">
                                    <i class="fas fa-key"></i>
                                    Jelszó módosítása
                                </a>
                                <a class="nav-link-style-drop" href="./adminRegistration.php">
                                    <i class="fas fa-user-plus"></i>
                                    Új felhasználó
                                </a>
                                <a class="nav-link-style-drop" href="./../../Resources/Session/Admin/logout.php">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Kilépés
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="navbar-mobile">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="mainServicesListed.php">
                        <img src="../../Resources/img/logo_navbar.png" alt="logo-image" width="300" class="d-inline-block align-text-top">
                    </a>
                    <i id="nav-menu-icon" class="fas fa-bars"></i>
                </div>
                <div class="topnav">
                    <a class="nav-link-style-drop" href="mainServicesListed.php">
                        <i class="fas fa-spa"></i>
                        Szolgáltatások</a>
                    <a class="nav-link-style-drop" href="manageAppointmentBooking.php">
                        <i class="fas fa-calendar-check"></i>
                        Időpontfoglalás
                    </a>
                    <a class="nav-link-style-drop" href="guestBook.php">
                        <i class="fas fa-comment"></i>
                        Vélemények jóváhagyása
                    </a>
                    <a class="nav-link-style-drop" href="./changeAdminPassword.php">
                        <i class="fas fa-key"></i>
                        Jelszó módosítása
                    </a>
                    <a class="nav-link-style-drop" href="./adminRegistration.php">
                        <i class="fas fa-user-plus"></i>
                        Új felhasználó
                    </a>
                    <a class="nav-link-style-drop" href="./../../Resources/Session/Admin/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Kilépés
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
    $("#nav-menu-icon").click(() => {
        $(".topnav").toggleClass("responsive");
    })
</script>