<?php require_once __DIR__ . "/../partials/head.php" ?>
<?php require_once __DIR__ . "/../partials/nav.php"; ?>
<?php require_once __DIR__ . "/../partials/banner.php"; ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="/laracast/index.php/notes" class="text-blue-500 underline cursor-pointer">go back...</a>
    <h1 class="mt-6"><?= $note['body'] ?></h1>

    <form method="POST">
      <input hidden name="_method" value="DELETE" />
      <input hidden name="id" value="<?= $note['id'] ?>" />
      <button type="submit" class="text-sm text-red-500 mt-6 hover:underline">Delete</button>
    </form>

    <a href="/laracast/index.php/note/edit?id=<?= $note['id'] ?>" class="text-blue-500 underline font-bold">Edit</a>
  </div>
</main>
</div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>