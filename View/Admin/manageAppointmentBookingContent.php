<?php
if (isset($_SESSION["username"])) {
?>
  <div class="appointment-management-container">
    <div class="title">
      <h1>Lefoglalt időpontok listája</h1>
    </div>
    <div class="am-container">
      <div class="row">
        <div class="col-12 datepicker-container">
          <div id="datepicker" class="calendar test"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="reserved-appointments-table-container">
            <div class="table-container">
              <div id="reservations-list-modal" class="modal-user hidden">
                <h4 id="modal-message"></h4>
              </div>
              <table class="table">
                <colgroup>
                  <col style="width: 40px;">
                  <col style="width: 200px;">
                  <col style="width: 300px;">
                  <col style="width: 90px;">
                  <col style="width: 90px;">
                  <col style="width: 180px;">
                  <col style="width: 300px;">
                </colgroup>
                <thead>
                  <tr>
                    <th scope="col" class="table-header">#</th>
                    <th scope="col" class="table-header">Vendég neve</th>
                    <th scope="col" class="table-header td-content-center">Szolgáltatás</th>
                    <th scope="col" class="table-header td-content-center" colspan="2">Lefoglalt időpont</th>
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