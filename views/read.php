<section id="read" class="content active">
    <h1 class="contenttitle"> Read Students </h1>
    <?php if (empty($students)): ?>
        <p class="label">No student records found.</p>
    <?php else: ?>
    
    <form action="index.php" method="GET" style="margin-bottom: 20px;">
        <input type="hidden" name="section" value="read">
        <label for="read_search_id" class="label">Search Student by ID</label>
        <select name="read_search_id" id="read_search_id" class="field">
            <option value="">-- Search or Select a Student --</option>
            <?php foreach ($students as $s): ?>
                <option value="<?= $s['id'] ?>">
                    ID: <?= $s['id'] ?> - <?= htmlspecialchars($s['surname'] . ', ' . $s['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <table class="student-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody id="student-table-body">
            <?php foreach ($students as $s): ?>
            <tr class="student-row" data-id="<?= $s['id'] ?>">
                <td><?= htmlspecialchars($s['id']) ?></td>
                <td><?= htmlspecialchars($s['name']) ?></td>
                <td><?= htmlspecialchars($s['surname']) ?></td>
                <td><?= htmlspecialchars($s['middlename'] ?? '') ?></td>
                <td><?= htmlspecialchars($s['address'] ?? '') ?></td>
                <td><?= htmlspecialchars($s['contact_number'] ?? '') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</section>
