<div class="container user-forgot-password-style">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-12 col-md-6 user-forgot-password-form">
      <form method="POST" action="./../../Controller/User/passwordResetToken.php">
        <div class="mb-3">
          <label for="forgot-password-email" class="form-label forgotpswd-email-label">Kérem adja meg email címét</label>
          <input type="email" class="form-control" id="forgot-password-email" name="email">
          <small id="emailMessage">A megadott email címre a rendszer egy linket küld. Rákattintva az oldal átirányítja, majd új jelszót állíthat be.</small>
          <div class="mb-2">
            <div id="forgotPasswordMessage"></div>
          </div>
          <input type="submit" name="password-reset-token" class="user-forgot-pswd-btn" id="user-forgotpswd-btn">
        </div>
      </form>
    </div>
    <div class="col-3"></div>
  </div>
</div>