<?php
if (isset($_SESSION["username"])) {
?>

<button onclick="location.href = 'http://localhost/PHP/view/Admin/mainServicesAdd.php';" id="addMainService">Új szolgáltatás hozzáadása</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Szolgáltatás neve</th>
      <th scope="col">Alkategória neve</th>
      <th scope="col" class="td-content-center">Ár</th>
      <th scope="col" class="td-content-center">Időtartam</th>
      <th scope="col" class="td-content-center">Új hozzáadása</th>
      <th scope="col" class="td-content-center">Módosítás</th>
      <th scope="col" class="td-content-center">Törlés</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $mainservices_ordinal_number = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
      <tr>
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
          <tr class="sc_<?php echo $row['id'] ?>" style="display: none;">
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

<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>