<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?? 'Default Title'; ?></title>


</head>
<body>

    <?php include_once __DIR__ . '/header.php'; ?>
    <?php include_once __DIR__ . '/sidebar.php'; ?>

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu' id="sidebar-toggle"></i>
            <span class="text"><?php echo $title ?? 'Dashboard'; ?></span>
        </div>
        <div class="content">
            <?php echo $content ?? ''; ?>
        </div>
    </section>

    <?php include_once __DIR__ . '/footer.php'; ?>



</body>
</html>
