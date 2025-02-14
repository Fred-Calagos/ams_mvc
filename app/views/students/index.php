<div class="container">
    <!-- Create Student Button -->
    <div class="mb-3">
        <a href="/students/create" class="btn btn-primary">+ Add Student</a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th onclick="sortTable(0)">ID </th>
                <th onclick="sortTable(1)">Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            foreach ($students as $student): ?>
            
            <tr>
                <td><?= $n++;?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td>
                    <a href="/students/edit?id=<?= $student['id'] ?>" class="text-warning">Edit</a>
                    <a href="/students/delete?id=<?= $student['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
