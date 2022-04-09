<?php
if (isset($_SESSION["username"])) {
?>
  <div class="container page-content-container">
    <div class="row">
      <div class="col-12">
        <div class="guestbook-page">
          <div class="guestbook-title">
            <h1>Vélemények</h1>
          </div>
          <div class="guestbook-content">
            <section class="guestbook-section">
              <?php
              foreach ($opinions as $row => $opinion) {
              ?>
                <div class="row">
                  <div id="<?php echo 'resultMessage-' . $opinion['id'] ?>"></div>
                  <div class="col-12 col-md-10 col-lg-8 opinion-container">
                    <div class="date-name-container">
                      <div class="opinion-name"><?php echo "Véleményt írta: " . $opinion["vezeteknev"] . " " . $opinion["keresztnev"]; ?></div>
                      <div class="opinion-email"><?php echo "Email cím: " . $opinion["email"]; ?></div>
                      <div class="opinion-date">
                        <?php
                        $date = date_create($opinion["hozzaszolas_datuma"]);
                        echo "Hozzászólás időpontja: " . date_format($date, "Y.m.d. H:i");
                        ?>
                      </div>
                    </div>
                    <div class="opinion">
                      <?php echo '„ ' . $opinion["ertekeles"] . ' ”'; ?>
                    </div>
                    <div class="control-btn-container">
                      <button id="<?php echo $opinion["id"]; ?>" class="btn-change opinion-confirmation">Jóváhagyás</button>
                      <button id="<?php echo $opinion["id"]; ?>" class="btn-delete opinion-delete">Törlés</button>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
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