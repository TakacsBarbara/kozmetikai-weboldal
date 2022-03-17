<div class="container-fluid">
    <div class="row">
        <div class="navbar-social-icons">
            <a href="https://www.facebook.com/lhegyijudit" target="blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/lashes_and_more_byhj/" target="blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" target="blank">
                <i class="fas fa-at"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="navbar-desktop navbar-desktop-logo-container col-2">
            <div class="container-fluid">
                <div id="navbar-brand" class="navbar-logo">
                    <a class="navbar-brand" href="homePage.php">
                        <img src="../../Resources/img/logo-250.png" alt="logo-image" class="d-inline-block align-text-top">
                    </a>
                </div>
            </div>
        </div>
        <div id="navbar" class="navbar-desktop col-10">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link-style" href="aboutPage.php">Bemutatkozás</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="aboutServicesPage.php">Szolgáltatások</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="appointmentBooking.php">Időpontfoglalás</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="priceListPage.php">Árak</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="galleryPage.php">Galéria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="blogListPage.php">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-style" href="contactPage.php">Kapcsolat</a>
                                </li>

                            </ul>
                        </div>
                        <div class="navbar-user-account">
                            <?php
                            if (isset($_SESSION["userId"])) { ?>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <i class="far fa-user"></i>
                                        Profilom
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        <a class="nav-link-style-drop" href="./userAppointmentsList.php">
                                            <i class="fas fa-calendar-alt"></i>
                                            Foglalt időpontjaim
                                        </a>
                                        <a class="nav-link-style-drop" href="./changeUserPassword.php">
                                            <i class="fas fa-key"></i>
                                            Jelszó módosítása
                                        </a>
                                        <a class="nav-link-style-drop" href="./../../Resources/Session/User/logoutHome.php">
                                            <i class="fas fa-sign-out-alt"></i>
                                            Kilépés
                                        </a>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <div class="sign-in">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <a href="./userLogin.php">Belépés</a>
                                </div>
                            <?php
                            }
                            ?>

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
                    <a class="nav-link-style" href="aboutPage.php">Bemutatkozás</a>


                    <a class="nav-link-style" href="aboutServicesPage.php">Szolgáltatások</a>


                    <a class="nav-link-style" href="appointmentBooking.php">Időpontfoglalás</a>


                    <a class="nav-link-style" href="priceListPage.php">Árak</a>


                    <a class="nav-link-style" href="galleryPage.php">Galéria</a>


                    <a class="nav-link-style" href="blogListPage.php">Blog</a>


                    <a class="nav-link-style" href="contactPage.php">Kapcsolat</a>

                    <?php
                    if (isset($_SESSION["userId"])) { ?>
                        <a class="nav-link-style dropbtn">
                            <i class="far fa-user"></i>
                            <span id="nav-item-profile">Profilom</span>
                        </a>
                        <a class="nav-link-style nav-link-style-drop" href="./userAppointmentsList.php">
                            <i class="fas fa-calendar-alt"></i>
                            Foglalt időpontjaim
                        </a>
                        <a class="nav-link-style nav-link-style-drop" href="./changeUserPassword.php">
                            <i class="fas fa-key"></i>
                            Jelszó módosítása
                        </a>
                        <a class="nav-link-style nav-link-style-drop" href="./../../Resources/Session/User/logoutHome.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Kilépés
                        </a>
                    <?php
                    } else { ?>
                        <a class="nav-link-style sign-in-mobile" href="./userLogin.php">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Belépés</span>
                        </a>
                    <?php
                    }
                    ?>

                </div>

                <!-- <a class="nav-link-style-drop" href="mainServicesListed.php">
                        <i class="fas fa-spa"></i>
                        Szolgáltatások</a>
                    <a class="nav-link-style-drop" href="manageAppointmentBooking.php">
                        <i class="fas fa-calendar-check"></i>
                        Időpontfoglalás
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
                    </a> -->
        </div>
        </nav>
    </div>
</div>
</div>

<script>
    $("#nav-menu-icon").click(() => {
        $(".topnav").toggleClass("responsive");
    })

    // window.onscroll = function() {
    //     makeSticky()
    // };

    // var navbar = document.getElementById("navbar");
    // var sticky = navbar.offsetTop;

    // function makeSticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky-nav")
    //     } else {
    //         navbar.classList.remove("sticky-nav");
    //     }
    // }
</script>