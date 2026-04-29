<section id="read" class="content active">
    <h1 class="contenttitle"> Read Students </h1>
    <?php if (empty($students)): ?>
        <p class="label">No student records found.</p>
    <?php else: ?>
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
        <tbody>
            <?php foreach ($students as $s): ?>
            <tr>
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
