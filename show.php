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

$search_input = $_GET['search_keyword'];
$sql = "SELECT *
        FROM images
        WHERE keyword = '$search_input'";

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
    <main>
        <h1>Imgaes with <?php echo $_GET['search_keyword']; ?> keyword</h1>
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
