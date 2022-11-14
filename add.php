<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    require('config/db.php');

    if(isset($_POST['submit'])){
        $teksts = $_POST['text'];
        $sk_id = $id;

        $query = "INSERT INTO atsauksmes (text,sk_id) VALUES ('$teksts',$sk_id)";
        echo $query;

        if(mysqli_query($conn, $query)){
            header('Location: http://localhost/skolotaji');
        }
        else{
            echo 'FATAL ERROR: '. mysql_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        body {
            font-family: monospace;
            margin:20px;
            font-family: monospace;
        }

.container {
  border-top-left-radius: 37px 140px;
  border-top-right-radius: 23px 130px;
  border-bottom-left-radius: 110px 19px;
  border-bottom-right-radius: 120px 24px;

  display: block;
  position: relative;
  border: solid 3px #6e7491;
  padding: 40px 60px;
  max-width: 800px;
  width: 70%;
  margin: 100px auto 0;
  font-size: 17px;
  line-height: 28px;
  transform: rotate(-1deg);
  box-shadow: 3px 15px 8px -10px rgba(0, 0, 0, 0.3);
  transition: all 0.13s ease-in;
}

.container:hover {
  transform: translateY(-10px) rotate(1deg);
  box-shadow: 3px 15px 8px -10px rgba(0, 0, 0, 0.3);
}

.container:hover .border {
  transform: translateY(4px) rotate(-5deg);
}

.border {
  position: absolute;
  transition: all 0.13s ease-in;
}

.border:before,
.border:after {
  color: #515d9c;
  font-size: 15px;
  position: absolute;
}

.tl {
  position: absolute;
  left: -50px;
  top: -63px;
  font-weight: 600;
}

.tl:before {
  content: "37px";
  left: 120px;
  top: 30px;
}

.tl:after {
  content: "140px";
  left: 0px;
  top: 80px;
}

.tr {
  right: -50px;
  top: -63px;
  font-weight: 600;
}

.tr:before {
  content: "23px";
  left: 0;
  top: 30px;
}

.tr:after {
  content: "130px";
  left: 130px;
  top: 80px;
}

.bl {
  left: -50px;
  bottom: -71px;
  font-weight: 600;
}

.bl:before {
  content: "110px";
  left: 120px;
  top: -30px;
}

.bl:after {
  content: "19px";
  left: 0px;
  top: -90px;
}

.br {
  right: -50px;
  bottom: -63px;
  font-weight: 600;
}

.br:before {
  content: "120px";
  left: 0;
  top: -30px;
}

.br:after {
  content: "24px";
  right: -10px;
  top: -80px;
}

pre {
  background: #edeff5;
  padding: 20px;
}



* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html,
body {
  font-family: 'Fira Code', monospace;
  width: 100%;
  height: 100%;
  font-size: 16px;
}

main {
  display: flex;
  align-items: center;
  justify-content: center;
}

.p {
  cursor: pointer;
  position: relative;
  display: inline-block;
  font-size: 3rem;
  background: linear-gradient(to bottom, #000, #000 60%, #fff 60%, #fff 100%);
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
  background-repeat: no-repeat;
  transition: background 0.2s ease-out;
  white-space: nowrap;
}

span {
  position: relative;
}

span:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  height: 15px;
  background: #000;
  bottom: 9px;
  transition: all 0.2s ease-out;
}

.p:hover {
  background-position: 0 11px;
}

.span:hover:before {
  transform: translateY(10px)
}

a{
            text-decoration:none;
            color:purple;
        }
        .kaste{
            margin:0 auto;
            width:500px ;
        }
        textarea{
            width:500px;
            height:100px;
        }


    </style>
    <title>Asds posds</title>
</head>
<body class="m-5">
     <div>
     <main>
        <span class="span"><p class="p">Pievienot Atsauksmi</p></span>
    </main>
        <form method ="Post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="kaste">
            <div class="form-group">
                <textarea name="text" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="at-3 btn btn-primary">
            <a href="index.php" class="btn btn-primary">Cancel</a>
            </div>
        </form>
     </div>
</body>
</html>