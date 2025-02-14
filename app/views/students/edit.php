<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="/students/update" method="POST">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>

            <button type="submit">Update Student</button>
        </form>
        
        <a href="/students">Back to List</a>
    </div>
</body>
</html>
