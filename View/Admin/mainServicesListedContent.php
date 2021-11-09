<?php
if (isset($_SESSION["username"])) {
?>
<div class="table-background"> 
  <div class="new-mainservice-btn-container">
    <button class="new-mainservice-btn" onclick="location.href = 'http://localhost/PHP/view/Admin/mainServicesAdd.php';" id="addMainService">
      <i class="fas fa-plus-circle new-mainservice-plus-icon"></i>
      <span class="new-mainservice-text">Új kategória hozzáadása</span> 
    </button>
  </div>
  <div class="table-container">
    <table class="table table-striped">
      <colgroup>
        <col style="width: 50px;"> <!--2rem-->
        <col style="width: 270px;"> <!--15rem-->
        <col style="width: 370px;"> <!--20rem-->
        <col style="width: 130px;"> <!--7rem-->
        <col style="width: 130px;"> <!--7rem-->
        <col style="width: 170px;"> <!--9.5rem-->
        <col style="width: 130px;"> <!--7rem-->
        <col style="width: 70px;"> <!-- 4rem -->
      </colgroup>
      <thead>
        <tr>
          <th scope="col" class="table-header">#</th>
          <th scope="col" class="table-header">Kategória neve</th>
          <th scope="col" class="table-header">Szolgáltatás neve</th>
          <th scope="col" class="table-header td-content-center">Ár</th>
          <th scope="col" class="table-header td-content-center">Időtartam</th>
          <th scope="col" class="table-header td-content-center">Új szolgáltatás</th>
          <th scope="col" class="table-header td-content-center">Módosítás</th>
          <th scope="col" class="table-header td-content-center">Törlés</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $mainservices_ordinal_number = 1;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
          <tr class="main-service-row">
            <th scope="row"><?php echo $mainservices_ordinal_number ?> </th>
            <td class="mainServices" colspan="4">
              <a id="<?php echo $row['id'] ?>" href="#"><?php echo $row["szolgaltatas_neve"] ?>
            </a>
            <i id="arrow_<?php echo $row['id'] ?>" class="fas fa-chevron-down"></i>
            </td>
            <td class="td-content-center">
              <a href="./subServicesAdd.php?id=<?php echo $row["id"] ?>">
                <i class="fas fa-plus"></i>
              </a>
            </td>
            <td class="td-content-center">
              <a href="./mainServicesEdit.php?id=<?php echo $row["id"] ?>"> 
                <i class="fas fa-pencil-alt"></i>
              </a>
            </td>
            <td class="td-content-center">
              <a href="./mainServicesDelete.php?id=<?php echo $row["id"] ?>">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
            <?php
            foreach ($row_2_t as $row_number => $row_2) {
              if ($row["id"] == $row_2["foKat_id"]) {
            ?>
              <!-- style="display:none;" a 32. sorban lévő tr style-ja -->
              <tr class="sc_<?php echo $row['id'] ?> sub-service-row" style="display: none;">
                <td></td>
                <td></td>
                <td> <?php echo $row_2["megnevezes"] ?> </td>
                <td class="td-content-right"> <?php echo $row_2["ar"] . " Ft" ?> </td>
                <td class="td-content-right"> <?php echo $row_2["idotartam"] . " perc" ?></td>
                <td></td>
                <td class="td-content-center">
                  <a href="./subServicesEdit.php?id=<?php echo $row_2["id"] ?>">            
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                </td>
                <td class="td-content-center">
                  <a href="./subServicesDelete.php?id=<?php echo $row_2["id"] ?>">
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

<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>