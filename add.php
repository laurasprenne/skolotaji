<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    require('config/db.php');

    if(isset($_POST['submit'])){
        $teksts = $_POST['text'];
        $sk_id = $id;

        $query = "INSERT INTO atsauksmes(text, sk_id) VALUES ('$teksts', $sk_id)";
        echo $query;

        if(mysqli_query($conn, $query)){
            header('Location: http://localhost/Skolotaji/');
        }
        else{
            echo 'FATAL ERROR: '. mysql_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Skolotāju atsauksmes</title>
</head>
<body class="m-5">
     <div>
        <h1>Pievienot atsauksmi</h1>
        <form method ="Post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <textarea name="text" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="at-3 btn btn-primary">
            <a href="index.php" class="btn btn-primary">Cancel</a>
        </form>
     </div>
</body>
</html>