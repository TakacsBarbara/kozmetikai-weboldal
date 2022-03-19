<?php
if (isset($_SESSION["userId"])) {
    if (isset($_GET['id'])) {
        $sqlResApp = "SELECT szAlkat_id FROM idopontfoglalas WHERE id=" . $_GET['id'];
        $resultResApp = $conn->query($sqlResApp);
        $rowResApp = $resultResApp->fetch_array(MYSQLI_ASSOC);

        $subserviceId = $rowResApp["szAlkat_id"];

        $sqlSub = "SELECT * FROM szolgaltatas_alkategoria WHERE id=" . $subserviceId;
        $resultSub = $conn->query($sqlSub);
        $rowSub = $resultSub->fetch_array(MYSQLI_ASSOC);

        $subserviceName = $rowSub["megnevezes"];
        $mainserviceId = $rowSub["foKat_id"];

        $sqlMain = "SELECT szolgaltatas_neve FROM szolgaltatas_fokategoria WHERE id=" . $mainserviceId;
        $resultMain = $conn->query($sqlMain);
        $rowMain = $resultMain->fetch_array(MYSQLI_ASSOC);

        $mainserviceName = $rowMain["szolgaltatas_neve"];
    } else {
        $mainserviceName = null;
    }
?>

    <div class="container page-content-container">
        <div class="row">
            <div class="col-12">
                <div class="appointment-booking-page">
                    <div class="appointment-booking-title">
                        <h1>Online időpontfoglalás</h1>
                    </div>
                    <div class="appointment-booking-content">
                        <section class="appointment-booking-description col-12 col-lg-10 col-xl-8">
                            <div class="step-1">
                                <span>1. lépés: Kérlek válaszd ki, hogy melyik kategriában és azon belül melyik szolgáltatásra szeretnél időpontot foglalni.</span>
                            </div>
                            <div class="step-2">
                                <span>2. lépés: Válaszd ki a dátumot és az elérhető szabad időpontok közül a Neked megfelelőt.</span>
                            </div>
                            <div class="step-3">
                                <span>3. lépés: Nézd át az összesítő adatokat és ha minden rendben, foglald le az időpontot.</span>
                            </div>
                            <div class="step-4">
                                <span>4. lépés: Foglalt időpontjaim menüpontban láthatod a lefoglalt időpont státuszát, illetve emailben értesíteni foglak, ha jóváhagytam a foglalást.</span>
                            </div>
                            <div class="greeting">
                                <span>Szeretettel várlak szalonomba. 😊</span>
                            </div>
                        </section>
                        <section class="appointment-booking-widget">
                            <div id="main" class="container">
                                <div class="row wrapper">
                                    <div id="book-appointment" class="col-12 col-lg-10 col-xl-8">
                                        <div id="header">
                                            <span id="company-name">Lashes and More</span>

                                            <div id="steps">
                                                <div id="step-1" class="book-step active-step" title="Szolgáltatások">
                                                    <strong>1</strong>
                                                </div>

                                                <div id="step-2" class="book-step" title="Időpontok">
                                                    <strong>2</strong>
                                                </div>
                                                <div id="step-3" class="book-step" title="Foglalás megerősítése">
                                                    <strong>3</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SELECT SERVICE -->

                                        <div id="booking-frame-1" class="booking-frame">
                                            <div class="frame-container">
                                                <h2 class="frame-title">Szolgáltatások</h2>

                                                <div class="row frame-content">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="select-category">
                                                                <span id="select-category-text">Kategória</span>
                                                            </label>

                                                            <select id="select-category" class="form-control">
                                                                <option id="option-default" value="default" style="color:#666;" selected disabled>Válasszon kategóriát</option>
                                                                <?php
                                                                $sql = "SELECT szolgaltatas_neve FROM szolgaltatas_fokategoria";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                                    foreach ($row as $key => $value) {
                                                                        if ($mainserviceName == $value) {
                                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="select-service">
                                                                <span id="select-service-text">Szolgáltatás</span>
                                                            </label>

                                                            <select id="select-service" class="form-control">
                                                                <?php
                                                                if (isset($_GET['id'])) {

                                                                    $sql = "SELECT megnevezes FROM szolgaltatas_alkategoria WHERE foKat_id=" . $mainserviceId;
                                                                    $result = $conn->query($sql);

                                                                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                                        foreach ($row as $key => $value) {
                                                                            if ($subserviceName == $value) {
                                                                                echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                                            } else {
                                                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                                                            }
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div id="service-description"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="command-buttons">
                                                <span>&nbsp;</span>

                                                <button type="button" id="button-next-1" class="btn button-next btn-dark" data-step_index="1">
                                                    Tovább
                                                    <i class="fas fa-chevron-right ml-2"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- SELECT APPOINTMENT DATE -->

                                        <div id="booking-frame-2" class="booking-frame" style="display:none;">
                                            <div class="frame-container">

                                                <h2 class="frame-title">Foglalható időpontok</h2>

                                                <div class="row frame-content">
                                                    <div class="col-12 col-md-6">
                                                        <div id="datepicker" class="calendar test"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 free-appointments">
                                                        <div id="select-time-new">
                                                            <div class="form-group">
                                                                <span id="select-appointment">Szabad időpontok</span>
                                                            </div>

                                                            <div id="available-hours"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="command-buttons">
                                                <button type="button" id="button-back-2" class="btn button-back btn-previous-light" data-step_index="2">
                                                    <i class="fas fa-chevron-left mr-2"></i>
                                                    Vissza
                                                </button>
                                                <button type="button" id="button-next-2" class="btn button-next btn-dark" data-step_index="2">

                                                    Tovább
                                                    <i class="fas fa-chevron-right ml-2"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- APPOINTMENT DATA CONFIRMATION -->

                                        <div id="booking-frame-3" class="booking-frame" style="display:none;">
                                            <div class="frame-container booking-end-step">
                                                <h2 class="frame-title">Foglalás megerősítése</h2>
                                                <div class="row frame-content">
                                                    <div id="appointment-details" class="col-12 col-md-6"></div>
                                                    <div id="customer-details" class="col-12 col-md-6"></div>
                                                </div>
                                                <div class="row frame-content">
                                                    <div class="col-12 col-md-6 booking-service-container">
                                                        <h4>Szolgáltatás és időpont</h4>
                                                        <p id="res-service-name"></p>
                                                        <p id="res-appointment-date"></p>
                                                        <p id="res-service-price"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 booking-service-container">
                                                        <h4>Személyes adatok</h4>
                                                        <p id="user-name">Név: <?php echo $_SESSION["fullname"] ?> </p>
                                                        <p id="user-email">Email: <?php echo $_SESSION["email"] ?> </p>
                                                        <p id="user-phone">Telefonszám: <?php echo $_SESSION["phone"] ?> </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="command-buttons">
                                                <button type="button" id="button-back-3" class="btn button-back btn-previous-light" data-step_index="3">
                                                    <i class="fas fa-chevron-left mr-2"></i>
                                                    Vissza
                                                </button>
                                                <form id="book-appointment-form" style="display:inline-block" method="post">
                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                    ?> <button id="book-appointment-change" type="button" class="btn">Módosítom az időpontot</button>
                                                        <input type="hidden" id="changed-reserved-appointment-id-input" name="changed-appointment-id-input" value="<?php echo $_GET['id'] ?>">
                                                    <?php
                                                    } else {
                                                    ?> <button id="book-appointment-submit" type="button" class="btn">Lefoglalom az időpontot</button>
                                                    <?php
                                                    }
                                                    ?>
                                                    <input type="hidden" id="service-id-input" name="service-id-input" value="" />
                                                    <input type="hidden" id="appointment-date-input" name="appointment-date-input" value="" />
                                                    <input type="hidden" id="appointment-duration-start-input" name="appointment-duration-start-input" value="" />
                                                    <input type="hidden" id="appointment-duration-end-input" name="appointment-duration-end-input" value="" />
                                                </form>
                                            </div>
                                            <div id="dialog-success" title="Dialog Title" hidden="hidden"></div>
                                            <div id="dialog-fail" title="Dialog Title" hidden="hidden"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        <?php
    } else {
        echo '<script>window.location="http://localhost/PHP/View/User/userLogin.php?loginrequired=1"</script>';
    }
        ?>