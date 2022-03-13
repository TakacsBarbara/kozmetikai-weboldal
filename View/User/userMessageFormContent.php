<?php
if (isset($_GET['loginrequired']) && $_GET['loginrequired'] == 1) {
    echo "<div id='login-message-container'><p id='required-login-message'>Kérem jelentkezzen be!</p></div>";
}
?>

<div class="container user-login-form-style">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 user-msg-form">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="user-msg-name" class="form-label">Név<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="user-msg-name">
                </div>
                <div class="mb-3">
                    <label for="user-email-address" class="form-label">Email cím<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="user-email-address">
                </div>
                <div class="mb-3">
                    <label for="user-phone" class="form-label">Telefonszám<span class="text-danger">*</span></label>
                    <input type="phone" class="form-control" id="user-phone">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Üzenet<span class="text-danger">*</span></label>
                    <textarea id="user-msg" class="form-control" cols="30" rows="10" maxlength="750" style="resize: none;"></textarea>
                </div>
                <div id="resultMessage"></div>
                <div class="mb-3" id="user-send-msg-btn-container">
                    <button type="button" class="user-login-btn" id="user-send-msg-btn">Küldés</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>