<?php
if (isset($_SESSION["userId"])) {
?>
    <div class="container page-content-container">
        <div class="row">
            <div class="col-12">
                <div class="user-bookings-page">
                    <div class="user-bookings-title">
                        <h1>Foglalásaim</h1>
                    </div>
                    <div class="user-bookings-content">
                        <section class="user-bookings-section user-bookings-mobil col-12">
                            <?php
                            $mainservices_ordinal_number = 1;
                            foreach ($reservations as $row => $reservation) {
                            ?>
                                <div class="row">
                                    <div class="user-booking-service col-12">
                                        <?php echo "#" . $mainservices_ordinal_number . " " . $reservation["megnevezes"] ?>
                                    </div>
                                    <?php
                                    $date = date_create($reservation["idopont_datuma"]);
                                    $time = date_create($reservation["idopont_kezdete"]);
                                    ?>
                                    <div class="user-booking-date col-12">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo date_format($date, "Y.m.d.") . ' ' . date_format($time, 'H:i'); ?>
                                    </div>
                                    <div class="col-12">
                                        <i class="fas fa-money-bill-wave"></i>
                                        <?php echo $reservation["ar"] . " Ft" ?>
                                    </div>
                                    <div class="col-12">
                                        <i class="fas fa-hourglass-half"></i>
                                        <?php echo $reservation["idotartam"] . " perc" ?>
                                    </div>
                                    <div class="col-12">
                                        <i class="fas fa-bell"></i>
                                        <?php if ($reservation["jovahagyva"] == 0) {
                                            echo "Jóváhagyásra vár";
                                        } else if ($reservation["jovahagyva"] == 1) {
                                            echo "Lefoglalva";
                                        } else if ($reservation["jovahagyva"] == 2) {
                                            echo "Lemondva";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-12">
                                        <a id="change-btn-ref" href="./appointmentBooking.php?id=<?php echo $reservation["id"] ?>" class="btn-change"><i class="fas fa-pencil-alt" title="Módosítás"></i></a>
                                        <a id="<?php echo $reservation["id"] ?>" class="btn-delete reserved-appointment-delete"><i class="fas fa-trash-alt" title="Törlés"></i></a>
                                    </div>
                                </div>
                            <?php
                                ++$mainservices_ordinal_number;
                            }
                            ?>
                            <a href="./appointmentBooking.php" id="new-appointment-btn">Új időpontot foglalok</a>
                        </section>
                        <section class="user-bookings-section user-bookings-desktop col-12">
                            <div id="user-appointments-table-container">
                                <div id="reservations-list-modal" class="modal-user hidden">
                                    <h4 id="modal-message"></h4>
                                </div>
                                <div class="table-container">
                                    <table class="table ">
                                        <colgroup>
                                            <col style="width: 40px;">
                                            <col style="width: 210px;">
                                            <col style="width: 110px;">
                                            <col style="width: 110px;">
                                            <col style="width: 160px;">
                                            <col style="width: 150px;">
                                            <col style="width: 100px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="table-header">#</th>
                                                <th scope="col" class="table-header">Szolgáltatás neve</th>
                                                <th scope="col" class="table-header td-content-center">Ár</th>
                                                <th scope="col" class="table-header td-content-center">Időtartam</th>
                                                <th scope="col" class="table-header td-content-center">Lefoglalt időpont</th>
                                                <th scope="col" class="table-header td-content-center">Státusz</th>
                                                <th scope="col" class="table-header td-content-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $mainservices_ordinal_number = 1;
                                            foreach ($reservations as $row => $reservation) {
                                            ?>
                                                <tr class="">
                                                    <th scope="row"><?php echo $mainservices_ordinal_number ?> </th>
                                                    <td class="reserved-service-name">
                                                        <?php echo $reservation["megnevezes"] ?>
                                                    </td>
                                                    <td class="td-content-center">
                                                        <?php echo $reservation["ar"] . " Ft" ?>
                                                    </td>
                                                    <td class="td-content-center">
                                                        <?php echo $reservation["idotartam"] . " perc" ?>
                                                    </td>
                                                    <td class="td-content-center listed-reserved-appointment">
                                                        <?php
                                                        $date = date_create($reservation["idopont_datuma"]);
                                                        $time = date_create($reservation["idopont_kezdete"]);
                                                        echo date_format($date, "Y.m.d.") . ' ' . date_format($time, 'H:i');
                                                        ?>
                                                    </td>
                                                    <td class="td-content-center">
                                                        <?php if ($reservation["jovahagyva"] == 0) {
                                                            echo "Jóváhagyásra vár";
                                                        } else if ($reservation["jovahagyva"] == 1) {
                                                            echo "Lefoglalva";
                                                        } else if ($reservation["jovahagyva"] == 2) {
                                                            echo "Lemondva";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="td-content-center">
                                                        <a id="change-btn-ref" href="./appointmentBooking.php?id=<?php echo $reservation["id"] ?>" class="btn-change"><i class="fas fa-pencil-alt"></i></a>
                                                        <a id="<?php echo $reservation["id"] ?>" class="btn-delete reserved-appointment-delete"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                </tr>
                                            <?php
                                                $mainservices_ordinal_number++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="./appointmentBooking.php" id="new-appointment-btn">Új időpontot foglalok</a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    header("Location: ./userLogin.php?loginrequired=1");
}
?>