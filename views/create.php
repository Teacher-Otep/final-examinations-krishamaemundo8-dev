<section id="create" class="content active">
    <h1 class="contenttitle"> Create New Student </h1>
    <?php if ($successMsg): ?>
        <div class="alert alert-success"><?= $successMsg ?></div>
    <?php endif; ?>
    <?php if ($errorMsg): ?>
        <div class="alert alert-error"><?= $errorMsg ?></div>
    <?php endif; ?>
    <form action="includes/insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" placeholder="Enter surname" required>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" placeholder="Enter first name" required>

        <label for="middlename" class="label">Middle Name</label>
        <input type="text" name="middlename" id="middlename" class="field" placeholder="Enter middle name">

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field" placeholder="Enter full address">

        <label for="contact_number" class="label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="field" placeholder="Enter contact number">

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns" onclick="clearFields()">Clear Fields</button>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>
    </form>
</section>
