<?php
if (isset($_SESSION["username"])) {
?>
  <div class="appointment-management-container">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div id="datepicker" class="calendar test"></div>
        </div>
        <div class="col-9">
          <div class="reserved-appointments-table-container">
            <h2>Lefoglalt időpontok listája</h2>

          </div>
        </div>
      </div>
    </div>


  <?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
  ?>