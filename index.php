<?php

$db_host = "localhost";
$db_name = "images_traineeship";
$db_user = "root";
$db_pass = null;

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT *
        FROM images";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $images = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Imges</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My Images</h1>
    </header>

    <main>

    <form action="show.php">
        <input name="search_keyword" type="text">
        <button>search</button>
    </form>
        <?php if (empty($images)): ?>
            <p>No images found.</p>
        <?php else: ?>

            <ul>
                <?php foreach ($images as $image): ?>
                    <li>
                        <article>
                            <img src="<?php echo $image['image_name']; ?>" alt="" style="width: 256px;">
                            <p><?= $image['keyword']; ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
    </main>
</body>
</html>
