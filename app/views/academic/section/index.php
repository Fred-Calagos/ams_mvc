<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sections</title>
    <link rel="stylesheet" href="/path-to-your-css-file.css"> <!-- Adjust CSS path -->
</head>
<body>

    <h1>Manage Sections</h1>

    <?php if (isset($grade_id)): ?>
        <p>Creating section for Grade ID: <strong><?= htmlspecialchars($grade_id) ?></strong></p>

        <!-- Form to Create a New Section -->
        <form action="/section/store" method="POST">
            <input type="hidden" name="grade_id" value="<?= htmlspecialchars($grade_id) ?>">

            <label for="section_name">Section Name:</label>
            <input type="text" id="section_name" name="section_name" required>

            <button type="submit">Add Section</button>
        </form>
    <?php else: ?>
        <p>No Grade ID provided. Please select a grade.</p>
    <?php endif; ?>

    
    <!-- Message Container -->
    <div id="message-container"></div>
    
    
    <!-- Grade Levels Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $index => $section): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $section['section_name'] ?></td>
                    <td>
                    <button class="edit-grade btn btn-warning" 
                            data-id="<?= $section['id'] ?>" 
                            data-section-level="<?= $section['section_name'] ?>" 
                            data-section-category-id="<?= $section['grade_level_id'] ?>">
                        <i class="bx bxs-edit"></i> Edit
                    </button>
                    <a href="/section?section=<?= $section['id'] ?>" class="btn btn-primary">
                        <i class="bx bx-plus-circle"></i> Section
                    </a>
                        <button class="delete-grade btn btn-danger" data-id="<?= $section['id'] ?>">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
