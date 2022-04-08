<div class="container page-content-container">
  <div class="row">
    <div class="col-12">
      <div class="guestbook-page">
        <div class="guestbook-title">
          <h1>Vendégkönyv</h1>
        </div>
        <div class="guestbook-content">
          <section class="guestbook-section">
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ A választás véletlenszerű volt, de a legjobbhoz kerültem. Már az első alkalomnál éreztem, hogy megnyugszom a kezeid alatt.
                  Nem csak a szakmai tehetséged és profizmusod, ami miatt vissza járok hozzád Győrből, hanem a békesség, amit magadból sugárzol. ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.03.31 9:43</div>
                  <div class="opinion-name">Vivien</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Judit nagyon kedves, barátságos és cuki. Bármiről lehet beszélgetni vele és szép, tartós munkákat csinál. ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.03. 15:22</div>
                  <div class="opinion-name">Laura</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Váltani szerettem volna és az egyik barátnőm Juditot ajánlotta. Életem legjobb döntése volt, lassan már 2 éve hozzá járok.
                  3 hét után is olyan a pillám, mintha új lenne! A szemöldökömből pedig csodát varázsolt. Azt szeretném, hogy nyugdíjas koromban is ő rakja a pilláim. ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.05. 11:06</div>
                  <div class="opinion-name">Petra</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Tiszta környezet! Szeretetre méltó, kedves fogadtatás vár és nem utolsó sorban mindig azt kapom, amit szeretnék! ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.05 16:53</div>
                  <div class="opinion-name">Viktória</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Kolleganőm csoda szempilláit néztem mindig, aztán egy nap azt mondtam nekem is ilyen kell, így elmentem Judithoz,
                  aki a legelső szempillásom, aki ilyen szakértelemmel tanácsokat adott mi és hogyan is állna jól nekem.
                  Imádom ahogy dolgozik és azóta csoda pillogóim vannak mindig. Arckezeléseket is szakszerűen készíti.
                  Tündéri lány, mindig van egy kedves szava és imádja a munkáját. ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.06 18:07</div>
                  <div class="opinion-name">Edina</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Még tanuló korodban (ha jól emlékszem) “kerültem” hozzád. Nagyon örülök neki, mert sokadig voltál aki csinálta a pillám,
                  de messze a legügyesebb. Mindig megfelelő hosszúságú (és természetesen minőségű) pillákat kaptam, így a reggeli rutinból megsporólva
                  nekem a sminkelést. Alig várom, hogy újra tudjak menni és csodaszép pilláim legyenek, amit mindenki megdícsér. ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.08 19:02</div>
                  <div class="opinion-name">Ramóna</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-10 col-lg-8 opinion-container">
                <div class="opinion">
                  „ Olyan szerencsés ember vagyok, aki a munkásságod kezdete előtte is már ismert téged, ezáltal már fejlődésed kezdete óta látom azt,
                  hogy te ezt szakmát tiszta szívből csinálod. Amikor elkezdted kitanulni a szakmát, már akkor szorgalmas voltál és alázatos, ami a mai napig látszik a munkáidon.
                  Egy szép, igényes szalonban dolgozol, ahol az ember relaxálhat is, ha szeretne. Mindezek mellett nem szabad figyelmen kívűl hagyni azt, hogy napra kész vagy
                  a legújabb trendekkel. Fejleszted magad folyamatosan, ami a sikeredben meg is mutatkozik. Kész vagy új dolgokat kipróbálni! Határozott nő vagy és
                  ezt tükrözi a munkád is! ”
                </div>
                <div class="date-name-container">
                  <div class="opinion-date">2022.04.09 10:22</div>
                  <div class="opinion-name">Viktória</div>
                </div>
              </div>
            </div>

            <?php
            foreach ($opinions as $row => $opinion) {
            ?>
              <div class="row">
                <div class="col-12 col-md-10 col-lg-8 opinion-container">
                  <div class="opinion">
                    <?php echo '„ ' . $opinion["ertekeles"] . ' ”'; ?>
                  </div>
                  <div class="date-name-container">
                    <div class="opinion-date">
                      <?php
                      $date = date_create($opinion["hozzaszolas_datuma"]);
                      echo date_format($date, "Y.m.d. H:i");
                      ?>
                    </div>
                    <div class="opinion-name"><?php echo $opinion["keresztnev"]; ?></div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </section>
          <section id="monnd-el-a-velmenyed" class="tell-your-opinion">
            <div class="title">
              <h2>Mondd el véleményed!</h2>
              <h5>Véleményed fontos számomra, ezért kérlek írd meg rólam értékelésed.</h5>
            </div>
            <div class="opinion-form">
              <div id="resultMessage"></div>
              <div class="row">
                <div class="col-12 col-md-8 user-opinion-form">
                  <form method="POST" action="">
                    <div class="mb-3">
                      <label for="email-address" class="form-label">Értékelés</label>
                      <textarea id="user-opinion-message" class="form-control" placeholder="Értékelés szövege" cols="50" rows="5" maxlength="750" style="resize: none;"></textarea>
                    </div>
                    <?php
                    if (isset($_SESSION["userId"])) {
                    ?>
                      <button type="button" class="user-login-btn user-opinion-send-btn" id="user-opinion-btn">Küldés</button>
                    <?php
                    } else { ?>
                      <a href="userLogin.php"><button type="button" class="user-login-btn user-opinion-login-btn" id="user-login">Belépés</button></a>
                    <?php
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>