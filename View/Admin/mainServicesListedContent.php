<?php
//echo "<br>Tartalom Szolgáltatások: ";
//print_r ($row = $result -> fetch_array(MYSQLI_ASSOC));
?>
<button onclick="location.href = 'http://localhost/PHP/view/Admin/mainServices.php';" id="addMainService">Új szolgáltatás hozzáadása</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Szolgáltatás neve</th>
      <th scope="col">Alkategória neve</th>
      <th scope="col">Ár</th>
      <th scope="col">Időtartam</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $mainservices_ordinal_number = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
      <tr>
        <th scope="row"><?php echo $mainservices_ordinal_number ?> </th>
        <td class="mainServices" colspan="4"> <a id="<?php echo $row['id'] ?>" href="#"><?php echo $row["szolgaltatas_neve"] ?> </a> </td>
        <td><a href="./subServicesAdd.php?id=<?php echo $row["id"] ?>"> Új alkategória ➕</a></td>
        <td><a href="./mainServicesEdit.php?id=<?php echo $row["id"] ?>"> Módosítás ✏</a></td>
        <td><a href="./mainServicesDelete.php?id=<?php echo $row["id"] ?>"> Törlés 🗑</a></td>
        <?php
        foreach ($row_2_t as $row_number => $row_2) {
          if ($row["id"] == $row_2["foKat_id"]) {
        ?>
        <!-- style="display:none;" a 32. sorban lévő tr style-ja -->
          <tr class="sc_<?php echo $row['id'] ?>" style="display: none;">
            <td></td>
            <td></td>
            <td> <?php echo $row_2["megnevezes"] ?> </td>
            <td> <?php echo $row_2["ar"] . " Ft" ?> </td>
            <td colspan="2" > <?php echo $row_2["idotartam"] . " perc" ?></td>
            <td><a href="./subServicesEdit.php?id=<?php echo $row_2["id"] ?>"> Módosítás ✏</a></td>
            <td><a href="./subServicesDelete.php?id=<?php echo $row_2["id"] ?>"> Törlés 🗑</a></td>
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