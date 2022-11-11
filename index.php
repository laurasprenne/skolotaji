<?php
    require('config/db.php');
    // echo '1';

    // sql vaicājums
    $query = "SELECT * FROM skolotaji";

    // vaicājuma rezultāts
    $result = mysqli_query($conn, $query);

    // fetch data
    $skolotaji = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        <?php foreach($skolotaji as $skolotajs): ?>
                <h3 class="card-header"><?php echo $skolotajs['vards']; ?></h3>
                <p class="card-text m-3"><?php echo $skolotajs['prieksmeti']; ?></p>
                <a href="post.php?id=<?php echo $skolotajs['id']; ?>">Atsauksmes</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>