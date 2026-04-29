<section id="update" class="content active">
    <h1 class="contenttitle"> Update Student Records </h1>
    <?php if ($successMsg): ?>
        <div class="alert alert-success"><?= $successMsg ?></div>
    <?php endif; ?>
    <?php if ($errorMsg): ?>
        <div class="alert alert-error"><?= $errorMsg ?></div>
    <?php endif; ?>

    <form action="index.php" method="GET">
        <input type="hidden" name="section" value="update">
        <label for="edit_id" class="label">Select Student to Update</label>
        <select name="edit_id" id="edit_id" class="field" onchange="this.form.submit()">
            <option value="">-- Select a Student --</option>
            <?php foreach ($students as $s): ?>
                <option value="<?= $s['id'] ?>" <?= (isset($_GET['edit_id']) && $_GET['edit_id'] == $s['id']) ? 'selected' : '' ?>>
                    ID: <?= $s['id'] ?> - <?= htmlspecialchars($s['surname'] . ', ' . $s['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div id="btncontainer" style="margin-top:10px;">
            <button type="submit" class="btns" id="searchbtn">Go</button>
        </div>
    </form>

    <?php if ($editStudent): ?>
    <hr style="margin:20px 0; border-color:#dde;">
    <h2 class="contenttitle" style="font-size:1.1rem;">Editing Student ID: <?= $editStudent['id'] ?></h2>
    <form action="includes/update.php" method="POST" onsubmit="handleUpdate(event)">
        <input type="hidden" name="id" value="<?= $editStudent['id'] ?>">

        <label for="upd_surname" class="label">Surname</label>
        <input type="text" name="surname" id="upd_surname" class="field" value="<?= htmlspecialchars($editStudent['surname']) ?>" placeholder="Enter surname" required>

        <label for="upd_name" class="label">Name</label>
        <input type="text" name="name" id="upd_name" class="field" value="<?= htmlspecialchars($editStudent['name']) ?>" placeholder="Enter first name" required>

        <label for="upd_middlename" class="label">Middle Name</label>
        <input type="text" name="middlename" id="upd_middlename" class="field" value="<?= htmlspecialchars($editStudent['middlename'] ?? '') ?>" placeholder="Enter middle name">

        <label for="upd_address" class="label">Address</label>
        <input type="text" name="address" id="upd_address" class="field" value="<?= htmlspecialchars($editStudent['address'] ?? '') ?>" placeholder="Enter full address">

        <label for="upd_contact" class="label">Contact Number</label>
        <input type="text" name="contact_number" id="upd_contact" class="field" value="<?= htmlspecialchars($editStudent['contact_number'] ?? '') ?>" placeholder="Enter contact number">

        <div id="btncontainer" style="margin-top:10px;">
            <button type="submit" class="btns" id="savebtn">Update</button>
        </div>
    </form>
    <?php elseif (!empty($_GET['edit_id'])): ?>
        <p class="label" style="color:red; margin-top:10px;">No student found with that ID.</p>
    <?php endif; ?>
</section>
