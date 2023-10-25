<div class="container">
    <div class="container">
        <label>Registered Users</label>
        <div class="row justify-content-center align-items-center m-2 g-3">
            <?php foreach ($db->users as $user): ?>
                <div class="col">
                    <?= $user->getEmail() ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>