<?php require_once "partials/head.php" ?>
<?php require_once 'partials/nav.php'; ?>
<?php require_once 'partials/banner.php'; ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1>Hello 
      <?php 
      if(isset($_SESSION['user'])){
      echo explode("@", $_SESSION['user']['email'])[0];
    } else {
      echo "Guest";
    } ?></h1>
  </div>
</main>
</div>
<?php require_once 'partials/footer.php'; ?>