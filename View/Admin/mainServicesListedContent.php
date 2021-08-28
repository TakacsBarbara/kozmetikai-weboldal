
    
    
<?php
    //include "../../Model/Admin/queries.php"; // így sikerült megoldani, displayContent() metódussal nem include-olta be

    echo "<br>Tartalom Szolgáltatások: ";
    print_r($row);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Szolgáltatás neve</th>
    </tr>
    <?php foreach($row) { 
      $id = 1;?>
      <tr>
        <td scope="col"><?php echo $id ?></td>
        <td scope="col"><?php echo $row["szolgaltatas_neve"]?></td>
      </tr>
    <?php ++$id;
      } ?>
  </thead>
  
</table>