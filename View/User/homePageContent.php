<div class="">
  <h1>Home Page</h1>
</div>

<?php
if (isset($_SESSION["userId"])) {
?>
  <a class="" href="./../../Resources/Session/User/logout.php">
    Kilépés
  </a>

<?php
}
?>