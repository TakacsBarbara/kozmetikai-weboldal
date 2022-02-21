<div id="user-appointments-table-container">

    <h1>Foglalásaim</h1>
    <div id="reservations-list-modal" class="modal-user hidden">
        <h4 id="modal-message"></h4>
    </div>
    <div class="table-container">
        <table class="table ">
            <colgroup>
                <col style="width: 40px;">
                <!--2rem-->
                <col style="width: 250px;">
                <!--20rem-->
                <col style="width: 90px;">
                <!--7rem-->
                <col style="width: 90px;">
                <!--7rem-->
                <col style="width: 140px;">
                <!--9.5rem-->
                <col style="width: 130px;">
                <!--7rem-->
                <col style="width: 140px;"> <!-- 4rem -->
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
                            echo date_format($date, "Y.m.d") . ' ' . date_format($time, 'H:i');
                            ?>
                        </td>
                        <td class="td-content-center">
                            <?php echo $reservation["jovahagyva"] ? "Lefoglalva" : "Jóváhagyásra vár" ?>
                        </td>
                        <td class="td-content-center">
                            <button type="button" class="btn-change reserved-appointment-change" value="<?php echo $reservation["id"] ?>">Módosítás</button>
                            <button type="button" class="btn-delete reserved-appointment-delete" value="<?php echo $reservation["id"] ?>">Törlés</button>
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
</div>

<a href="./appointmentBooking.php">Vissza</a>