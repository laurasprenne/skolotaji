<?php
    // create connection
    $conn = mysqli_connect('localhost', 'root', '', 'skolotaji'); #adrese, user, pass, appName

    // check conn
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }