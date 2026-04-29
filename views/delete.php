<section id="delete" class="content active">
    <h1 class="contenttitle"> Delete Student Records </h1>
    <?php if ($successMsg): ?>
        <div class="alert alert-success"><?= $successMsg ?></div>
    <?php endif; ?>
    <?php if ($errorMsg): ?>
        <div class="alert alert-error"><?= $errorMsg ?></div>
    <?php endif; ?>

    <!-- Delete Form -->
    <form action="includes/delete.php" method="POST" onsubmit="handleFormDelete(event)">
        <label for="del_id" class="label">Select Student to Delete</label>
        <select name="id" id="del_id" class="field">
            <option value="">-- Select a Student --</option>
            <?php foreach ($students as $s): ?>
                <option value="<?= $s['id'] ?>" <?= (isset($_GET['id']) && $_GET['id'] == $s['id']) ? 'selected' : '' ?>>
                    ID: <?= $s['id'] ?> - <?= htmlspecialchars($s['surname'] . ', ' . $s['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div id="btncontainer" style="margin-top:20px;">
            <button type="submit" class="btns delbtn">Permanently Delete Student</button>
        </div>
    </form>
</section>
