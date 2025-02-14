<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Delete Student</h2>

        <p>Are you sure you want to delete <strong><?= htmlspecialchars($student['name']) ?></strong>?</p>

        <form action="/students/delete" method="POST">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">

            <button type="submit" style="background-color: red; color: white;">Delete</button>
            <a href="/students">Cancel</a>
        </form>
    </div>
</body>
</html>
