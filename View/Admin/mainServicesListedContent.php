<?php
if (isset($_SESSION["username"])) {
?>
  <div class="container page-content-container">
    <div class="row">
      <div class="col-12">
        <div class="admin-services-page">
          <div class="admin-services-title">
            <h1>Szolgáltatások</h1>
          </div>
          <div class="admin-services-content">

            <section class="admin-services-section admin-services-mobil col-12 col-sm-8 col-md-6">
              <div class="new-mainservice-btn-container">
                <button class="new-mainservice-btn" onclick="location.href = 'http://localhost/PHP/view/Admin/mainServicesAdd.php';" id="addMainService">
                  <i class="fas fa-plus-circle new-mainservice-plus-icon"></i>
                  <span class="new-mainservice-text">Új kategória hozzáadása</span>
                </button>
              </div>
              <div id="listed-mainservices-table-container">
                <?php
                $mainservices_ordinal_number = 1;
                while ($mainServicesMobil = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                  <div class="main-service-row">
                    <div class="mainServicesMobil">
                      #<?php echo $mainservices_ordinal_number ?>
                      <a id="<?php echo $mainServicesMobil['id'] ?>" href="#"><?php echo $mainServicesMobil["szolgaltatas_neve"] ?>
                      </a>
                      <i id="arrow_mobil_<?php echo $mainServicesMobil['id'] ?>" class="fas fa-chevron-down"></i>
                      <div class="main-services-settings">
                        <a href="./subServicesAdd.php?id=<?php echo $mainServicesMobil["id"] ?>">
                          <i class="fas fa-plus"></i>
                        </a>
                        <a href="./mainServicesEdit.php?id=<?php echo $mainServicesMobil["id"] ?>">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="./mainServicesDelete.php?id=<?php echo $mainServicesMobil["id"] ?>">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </div>
                    </div>
                    <?php
                    foreach ($subServicesMobil as $row_number => $subServiceMobil) {
                      if ($mainServicesMobil["id"] == $subServiceMobil["foKat_id"]) {
                    ?>

                        <!-- style="display:none;" a 32. sorban lévő tr style-ja -->
                        <div class="sc_<?php echo $mainServicesMobil['id'] ?> sub-service-row" style="display: none;">
                          <p> <?php echo $subServiceMobil["megnevezes"] ?> </p>
                          <p class="td-content-right"> <?php echo $subServiceMobil["ar"] . " Ft" ?> </p>
                          <p class="td-content-right"> <?php echo $subServiceMobil["idotartam"] . " perc" ?></p>
                          <p class="td-content-right">
                            <a href="./subServicesEdit.php?id=<?php echo $subServiceMobil["id"] ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="./subServicesDelete.php?id=<?php echo $subServiceMobil["id"] ?>">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </p>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  <?php
                  $mainservices_ordinal_number++;
                }
                  ?>
                  </div>
            </section>

            <section class="admin-services-section admin-services-desktop col-12">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="table-background">
                      <div class="new-mainservice-btn-container">
                        <button class="new-mainservice-btn" onclick="location.href = 'http://localhost/PHP/view/Admin/mainServicesAdd.php';" id="addMainService">
                          <i class="fas fa-plus-circle new-mainservice-plus-icon"></i>
                          <span class="new-mainservice-text">Új kategória hozzáadása</span>
                        </button>
                      </div>
                      <div id="listed-mainservices-table-container">
                        <div>
                          <table class="table ">
                            <colgroup>
                              <col style="width: 20px;">
                              <col style="width: 300px;">
                              <col style="width: 380px;">
                              <col style="width: 130px;">
                              <col style="width: 130px;">
                              <col style="width: 70px;">
                            </colgroup>
                            <thead>
                              <tr>
                                <th scope="col" class="table-header">#</th>
                                <th scope="col" class="table-header">Kategória neve</th>
                                <th scope="col" class="table-header">Szolgáltatás neve</th>
                                <th scope="col" class="table-header td-content-center">Ár</th>
                                <th scope="col" class="table-header td-content-center">Időtartam</th>
                                <th scope="col" class="table-header td-content-center">Lehetőségek</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $mainservices_ordinal_number = 1;
                              while ($mainServicesDesktop = $resultDesktop->fetch_array(MYSQLI_ASSOC)) {
                              ?>
                                <tr class="main-service-row">
                                  <th scope="row"><?php echo $mainservices_ordinal_number ?> </th>
                                  <td class="mainServices" colspan="4">
                                    <a id="<?php echo $mainServicesDesktop['id'] ?>" href="#"><?php echo $mainServicesDesktop["szolgaltatas_neve"] ?>
                                    </a>
                                    <i id="arrow_<?php echo $mainServicesDesktop['id'] ?>" class="fas fa-chevron-down"></i>
                                  </td>
                                  <td class="td-content-right">
                                    <a href="./subServicesAdd.php?id=<?php echo $mainServicesDesktop["id"] ?>">
                                      <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="./mainServicesEdit.php?id=<?php echo $mainServicesDesktop["id"] ?>">
                                      <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="./mainServicesDelete.php?id=<?php echo $mainServicesDesktop["id"] ?>">
                                      <i class="fas fa-trash-alt"></i>
                                    </a>
                                  </td>
                                  <?php
                                  foreach ($subServicesDesktop as $row_number => $subServiceDesktop) {
                                    if ($mainServicesDesktop["id"] == $subServiceDesktop["foKat_id"]) {
                                  ?>
                                      <!-- style="display:none;" a 32. sorban lévő tr style-ja -->
                                <tr class="sc_<?php echo $mainServicesDesktop['id'] ?> sub-service-row" style="display: none;">
                                  <td></td>
                                  <td></td>
                                  <td> <?php echo $subServiceDesktop["megnevezes"] ?> </td>
                                  <td class="td-content-right"> <?php echo $subServiceDesktop["ar"] . " Ft" ?> </td>
                                  <td class="td-content-right"> <?php echo $subServiceDesktop["idotartam"] . " perc" ?></td>
                                  <td class="td-content-right">
                                    <a href="./subServicesEdit.php?id=<?php echo $subServiceDesktop["id"] ?>">
                                      <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="./subServicesDelete.php?id=<?php echo $subServiceDesktop["id"] ?>">
                                      <i class="fas fa-trash-alt"></i>
                                    </a>
                                  </td>
                                </tr>
                            <?php
                                    }
                                  }
                            ?>
                            </tr>

                          <?php
                                $mainservices_ordinal_number++;
                              }
                          ?>
                            </tbody>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>