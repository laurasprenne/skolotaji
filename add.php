<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    require('config/db.php');

    if(isset($_POST['submit'])){
        $teksts = $_POST['teksts'];
        $sk_id = $id;

        $query = "INSERT INTO atsauksmes (teksts) VALUES ('$teksts')";
        echo $query;

        if(mysqli-query($conn, $query)){
            header('Location: http://localhost/crudapp/');
        }
        else{
            echo 'FATAL ERROR: '. mysql_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asds posds</title>
</head>
<body class="m-5">
     <div>
        <h1>Pievieno Atsauksmi</h1>
        <form method ="Post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Text</label>
                <textarea name="text" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="at-3 btn btn-primary">
            <a href="index.php" class="btn btn-primary">Cancel</a>
        </form>
     </div>
</body>
</html>