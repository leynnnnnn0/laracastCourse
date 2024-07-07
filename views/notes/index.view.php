<?php require_once __DIR__ . "/../partials/head.php" ?>
<?php require_once __DIR__ . "/../partials/nav.php"; ?>
<?php require_once __DIR__ . "/../partials/banner.php"; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?php foreach ($notes as $note): ?>
        <div class="border-b p-4 bold">
            <a href="/laracast/index.php/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline text-lg font-bold">
                <?= $note['body'] ?>
            </a>
        </div>
        <?php endforeach; ?>
        <div class="mt-10">
        <a href="/laracast/index.php/notes/create" class="text-blue-500 underline font-bold">Create new note</a>
        </div>
    </div>
  </main>
</div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>