<div class="container page-content-container">
  <div class="row">
    <div class="col-12">
      <div class="price-list-page">
        <div class="price-list-title">
          <h1>Aktuális árak</h1>
        </div>
        <div class="price-list-content">
          <section class="price-list-section col-12 col-md-10 col-lg-8">
            <?php
            while ($mainServices = $result->fetch_array(MYSQLI_ASSOC)) { ?>
              <h2 class="price-list-main-services"> <?php echo $mainServices["szolgaltatas_neve"]; ?> </h2>

              <?php
              foreach ($subServices as $row => $value) {
                if ($mainServices["id"] == $value["foKat_id"]) { ?>
                  <div class="row">
                    <div class="col-12 col-lg-9">
                      <div class="price-list-service name">
                        <span class="price-list-service-name"><?php echo $value["megnevezes"]; ?></span>
                        <br>
                        <span>
                          <i class="fas fa-hourglass-half"></i>
                          <?php echo $value["idotartam"] . " perc"; ?>
                        </span>
                      </div>
                    </div>
                    <div class="col-12 col-md-3">
                      <div class="price-list-service price">
                        <span class="price-list-service-price"><?php echo $value["ar"] . " Ft"; ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom"></div>
              <?php
                }
              } ?>
              <div class="pearl-img-container">
                <img src="./../../Resources/img/pearl-border.png" alt="pearls" class="pearls">
              </div>
            <?php
            }
            ?>
          </section>
          <div class="book-appointment-button-container">
            <p>Ha valamelyik szolgáltatásom felkeltette érdeklődésed, foglalj időpontot online!</p>
            <a href="./appointmentBooking.php" id="new-appointment-btn">Időpontot foglalok</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>