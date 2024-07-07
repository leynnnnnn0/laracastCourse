<?php require_once __DIR__ . "/../partials/head.php" ?>
<?php require_once __DIR__ . "/../partials/nav.php"; ?>
<?php require_once __DIR__ . "/../partials/banner.php"; ?>

<main>
    <form class="m-6" method="post" action="/laracast/index.php/note/edit">
        <input type="text" hidden value="put" name="_method">
        <input type="text" hidden value="<?= $note['id'] ?>" name="id">
        <div class="col-span-full">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Note here..."><?= $note['body'] ?></textarea>
            </div>
            <?php if (isset($errors['body'])) : ?>
                <p class="text-red-500 mt-5"><?= $errors['body'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>


    </form>

</main>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>