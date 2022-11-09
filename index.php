<?php
    require('config/db.php');
    // echo '1';

    // sql vaicājums
    $query = 'SELECT * FROM posts';

    // vaicājuma rezultāts
    $result = mysqli_query($conn, $query);

    // fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // var_dump($posts);

    // free result
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Skolotāju atsauksmes</title>
</head>
<body class="m-5">
    <div>
        <h1>Skolotāji</h1>
        <?php foreach($posts as $post) : ?>
            <div class="card mb-3">
                <h3 class="card-header"><?php echo $post['title']; ?></h3>
                <small class="card-text m-3">Created on <?php echo $post['created_at']; ?></small>
                <p class="card-text m-3"><?php echo $post['body']; ?></p>
                <a href="post.php?id=<?php echo $post['id'] ?>">Atsauksmes</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>