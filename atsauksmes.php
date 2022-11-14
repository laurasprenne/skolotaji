<?php
$id = 1;
if (isset($_GET['id'])){
    $id = $_GET['id'];
}


require('config/db.php');
    // echo '1';

 if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    
    $query = "DELETE FROM atsauksmes WHERE id='$delete_id'";
    
    // $query = "INSERT INTO posts (title, author, body) VALUES ('$title', '$author', '$body')";
    // echo $query;
    
    if(mysqli_query($conn, $query)){
        header('Location: http://localhost/Skolotaji/');
    }
    else{
        echo 'FATAL ERROR: '. mysql_error($conn);
    }


}

//SQL VAICAJUMS
$query = 'SELECT * FROM skolotaji where id =' .$id;

//vaicajuma rezultāts
$result =mysqli_query($conn, $query);

//fetch data 
$skolotajs = mysqli_fetch_assoc($result);

// var_dump($posts);
// free result
mysqli_free_result($result);



//SQL VAICAJUMS
$query1 = 'SELECT * FROM atsauksmes where  sk_id =' .$id;

//vaicajuma rezultāts
$result1 =mysqli_query($conn, $query1);

//fetch data 
$atsauksmes = mysqli_fetch_all($result1, MYSQLI_ASSOC);

// var_dump($posts);
// free result
mysqli_free_result($result1);

// close connection
mysqli_close($conn);

?>

<html lang="en">
<head>
    <title>Skolotāju atsauksmes</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="m-5">
    <div>
             <h1 class="card-header"><?php echo $skolotajs['vards']?></h1>
             <p class= "card-text m-3"><?php echo $skolotajs ['prieksmeti'] ?></p>
             <img src="<?php echo "images/".$skolotajs['bilde'] ?>" alt="nava">
     </div>
     <a href="add.php?id=<?php echo $skolotajs['id']; ?>">Pievienot Atsauksmi</a>
     <a href="index.php" class="btn btn-primary"> Back</a>

    <?php foreach($atsauksmes as $atsauksme): ?>
        <p class="card-text m-3"><?php echo $atsauksme['text']; ?></p>
        <form class="pull right" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="delete_id" value="<?php echo $atsauksme['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
    <?php endforeach; ?>
</body>
</html>