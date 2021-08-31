
    
    
<?php
    //echo "<br>Tartalom Szolgáltatások: ";
    //print_r ($row = $result -> fetch_array(MYSQLI_ASSOC));
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Szolgáltatás neve</th>
    </tr>    
  </thead>
  <tbody>
    <?php
      $services_ordinal_number = 1;
      while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        ?>
      <tr>
        <th scope="row"><?php echo $services_ordinal_number ?> </th>
        <td> <?php echo $row["szolgaltatas_neve"] ?> </td>
      </tr>
    <?php 
      $services_ordinal_number++;
      } 
    ?>
  </tbody>
  
</table>