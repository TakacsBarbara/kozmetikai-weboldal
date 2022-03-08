<?php
if (isset($_SESSION["username"])) {
?>
  <div class="appointment-management-container">
    <div class="am-container">
      <div class="row">
        <div class="col-3 datepicker-container">
          <div id="datepicker" class="calendar test"></div>
        </div>
        <div class="col-9">
          <div class="reserved-appointments-table-container">
            <h2>Lefoglalt időpontok listája</h2>
            <div class="table-container">
              <div id="reservations-list-modal" class="modal-user hidden">
                <h4 id="modal-message"></h4>
              </div>
              <table class="table">
                <colgroup>
                  <col style="width: 40px;">
                  <col style="width: 200px;">
                  <col style="width: 300px;">
                  <col style="width: 140px;">
                  <col style="width: 80px;">
                  <col style="width: 80px;">
                  <col style="width: 200px;">
                </colgroup>
                <thead>
                  <tr>
                    <th scope="col" class="table-header">#</th>
                    <th scope="col" class="table-header">Vendég neve</th>
                    <th scope="col" class="table-header td-content-center">Szolgáltatás</th>
                    <th scope="col" class="table-header td-content-center" colspan="3">Lefoglalt időpont</th>
                    <th scope="col" class="table-header td-content-center">Státusz</th>
                    <th scope="col" class="table-header td-content-center"></th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
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