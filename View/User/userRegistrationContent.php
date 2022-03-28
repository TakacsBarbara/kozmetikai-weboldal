<div id="main" class="container">
    <div class="row wrapper">
        <div id="book-appointment" class="col-12 col-lg-10 col-xl-8">
            <div id="header">
                <span id="company-name">Regisztráció</span>
            </div>
            <div id="booking-frame-3" class="booking-frame registration">
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
                                <label for="birth-date" class="control-label">
                                    Születés dátuma
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" id="birth-date" class="required form-control" />
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
                                <input type="text" id="phone-number" onkeydown="phoneNumberFormatter()" maxlength="60" class="required form-control" autocomplete="off" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password" class="control-label">
                                    Jelszó
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" class="required form-control" maxlength="120" />
                                <small>Legalább 8 karakter hosszúnak kell lennie!</small>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="control-label">
                                    Jelszó megerősítése
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="confirm-password" class="required form-control" maxlength="120" />
                            </div>
                            <div class="form-group">
                                <label for="allergy" class="control-label">
                                    Allergia
                                </label>
                                <textarea name="allergy" id="allergy" class="form-control" cols="5" rows="2" maxlength="255" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="drug-allergy" class="control-label">
                                    Tartósan szedett gyógyszer
                                </label>
                                <textarea id="drug-allergy" class="form-control" id="drug-allergy" cols="5" rows="2" maxlength="255" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-12 regMessageContainer hidden">
                            <di id="regMessage">
                        </div>
                    </div>
                    <div class="col-12 reg-btn-container">
                        <button type="submit" id="user-registration-btn">Regisztrálok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function formatPhoneNumber(value) {
        if (!value) return value;
        const phoneNumber = value.replace(/[^\d]/g, '');
        const phoneNumberLength = phoneNumber.length;
        if (phoneNumberLength < 3) return phoneNumber;
        if (phoneNumberLength < 6) {
            return `(${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2,5)}`;
        }
        return `(${phoneNumber.slice(0, 2)}) ${phoneNumber.slice(2,5)}-${phoneNumber.slice(5, 8)}`;
    }

    function phoneNumberFormatter() {
        const inputField = document.getElementById('phone-number');
        const formattedInputValue = formatPhoneNumber(inputField.value);
        inputField.value = formattedInputValue;
    }
</script>