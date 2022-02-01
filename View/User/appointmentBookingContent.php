<div id="main" class="container">
    <div class="row wrapper">
        <div id="book-appointment" class="col-12 col-lg-10 col-xl-8">
            <div id="header">
                <span id="company-name">Lashes and More</span>

                <div id="steps">
                    <div id="step-1" class="book-step active-step" title="Szolgáltatások">
                        <strong>1</strong>
                    </div>

                    <div id="step-2" class="book-step" title="Időpontok">
                        <strong>2</strong>
                    </div>
                    <div id="step-3" class="book-step" title="Adatok kitöltése">
                        <strong>3</strong>
                    </div>
                    <div id="step-4" class="book-step" title="Foglalás megerősítése">
                        <strong>4</strong>
                    </div>
                </div>
            </div>

            <!-- SELECT SERVICE -->

            <div id="booking-frame-1" class="booking-frame">
                <div class="frame-container">
                    <h2 class="frame-title">Szolgáltatások</h2>

                    <div class="row frame-content">
                        <div class="col">
                            <div class="form-group">
                                <label for="select-category">
                                    <span id="select-category-text">Kategória</span>
                                </label>

                                <select id="select-category" class="form-control">
                                    <option id="option-default" value="default" style="color:#666;" selected disabled>Válasszon kategóriát</option>
                                    <?php
                                    $sql = "SELECT szolgaltatas_neve FROM szolgaltatas_fokategoria";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                        foreach ($row as $key => $value) {
                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-service">
                                    <span id="select-service-text">Szolgáltatás</span>
                                </label>

                                <select id="select-service" class="form-control">
                                    <?php


                                    ?>
                                </select>
                            </div>

                            <div id="service-description"></div>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <span>&nbsp;</span>

                    <button type="button" id="button-next-1" class="btn button-next btn-dark" data-step_index="1">
                        Tovább
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- SELECT APPOINTMENT DATE -->

            <div id="booking-frame-2" class="booking-frame" style="display:none;">
                <div class="frame-container">

                    <h2 class="frame-title">Foglalható időpontok</h2>

                    <div class="row frame-content">
                        <div class="col-12 col-md-6">
                            <div id="datepicker" class="calendar test"></div>
                        </div>

                        <div class="col-12 col-md-6 free-appointments">
                            <div id="select-time-new">
                                <div class="form-group">
                                    <span id="select-appointment">Szabad időpontok</span>
                                </div>

                                <div id="available-hours">
                                    
                                    <!-- <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time selected-hour-time">11:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">12:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">13:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">14:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">13:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">14:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">13:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">14:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">13:15
                                            am</button>
                                        <button
                                            class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">14:15
                                            am</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <button type="button" id="button-back-2" class="btn button-back btn-previous-light" data-step_index="2">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Vissza
                    </button>
                    <button type="button" id="button-next-2" class="btn button-next btn-dark" data-step_index="2">

                        Tovább
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- ENTER CUSTOMER DATA -->

            <div id="booking-frame-3" class="booking-frame" style="display:none;">
                <div class="frame-container">

                    <h2 class="frame-title">Személyes adatok</h2>

                    <div class="row frame-content">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="last-name" class="control-label">
                                    Vezetéknév
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="last-name" class="required form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="first-name" class="control-label">
                                    Keresztnév
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="first-name" class="required form-control" maxlength="100" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="email" class="required form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    Telefonszám
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="phone-number" maxlength="60" class="required form-control" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="city" class="control-label">
                                    Város
                                </label>
                                <input type="text" id="city" class="form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="zip-code" class="control-label">
                                    Irányítószám
                                </label>
                                <input type="text" id="zip-code" class="form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="address" class="control-label">
                                    Utca, házszám
                                </label>
                                <input type="text" id="address" class="form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="notes" class="control-label">
                                    Megjegyzés
                                </label>
                                <textarea id="notes" maxlength="500" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <button type="button" id="button-back-3" class="btn button-back btn-previous-light" data-step_index="3">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Vissza
                    </button>
                    <button type="button" id="button-next-3" class="btn button-next btn-dark" data-step_index="3">

                        Tovább
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- APPOINTMENT DATA CONFIRMATION -->

            <div id="booking-frame-4" class="booking-frame" style="display:none;">
                <div class="frame-container">
                    <h2 class="frame-title">Foglalás megerősítése</h2>
                    <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-6"></div>
                        <div id="customer-details" class="col-12 col-md-6"></div>
                    </div>
                    <div class="row frame-content">
                        <div class="col-12 col-md-6 booking-service-container">
                            <h4>Szolgáltatás és időpont</h4>
                            <p>Szolgáltatás: </p>
                            <p>Időpont: </p>
                            <p>Ár: </p>
                        </div>
                        <div class="col-12 col-md-6 booking-service-container">
                            <h4>Személyes adatok</h4>
                            <p>Név: </p>
                            <p>Email: </p>
                            <p>Telefonszám: </p>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <button type="button" id="button-back-4" class="btn button-back btn-previous-light" data-step_index="4">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Vissza
                    </button>
                    <form id="book-appointment-form" style="display:inline-block" method="post">
                        <button id="book-appointment-submit" type="button" class="btn">
                            Lefoglalom az időpontot
                        </button>
                        <input type="hidden" id="service-name-input" name="service-name" value="" />
                        <input type="hidden" id="appointment-duration-start-input" name="appointment-duration-start-input" value="" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>