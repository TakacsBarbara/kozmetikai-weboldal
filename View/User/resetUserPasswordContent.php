<div class="container user-forgot-password-style">
  <div class="row">
    <div class="col-3"></div>
    <?php
    // if ($_GET['key'] && $_GET['token']) {
      if ($_GET['token']) {

      // $email = $_GET['key'];
      $token = $_GET['token'];
      // $query = mysqli_query($conn, "SELECT * FROM `vendegek` WHERE `reset_link_token`='" . $token . "' and `email`='" . $email . "';");
      $query = mysqli_query($conn, "SELECT * FROM `vendegek` WHERE `reset_link_token`='" . $token . "';");
      $curDate = date("Y-m-d H:i:s");

      if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);

        if ($row['exp_date'] >= $curDate) { ?>

          <div class="col-6 user-forgot-password-form">
            <!-- <form method="POST" action="./../../Controller/User/updateForgetPassword.php"> -->
            <form method="POST" action="">
              <!-- <input type="hidden" id="reset-password-email" name="email" value=""> -->
              <input type="hidden" id="reset_link_token" name="reset_link_token" value="<?php echo $token; ?>">
              <div class="mb-3">
                <label for="new-password" class="form-label forgotpswd-email-label">Jelszó</label>
                <input type="password" id="new-password" name='password' class="form-control">
              </div>
              <div class="mb-3">
                <label for="new-cpassword" class="form-label forgotpswd-email-label">Jelszó újra</label>
                <input type="password" id="new-cpassword" name='cpassword' class="form-control">
              </div>
              <div id="resultMessage"></div>
            </form>
            <button type="button" name="new-password" id="user-forgot-pswd-btn" class="user-forgot-pswd-btn">Küldés</button>
          </div>
        <?php
        } else {
          echo "Lejárt!"; ?>
          <p>A jelszó megváltoztatásának határideje lejárt!</p>
    <?php
        }
      }
    }
    ?>
    <div class="col-3"></div>
  </div>
</div>