<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    //database connection variables
    $host = $url["host"];
    $user = $url["user"];
    $pwd = $url["pass"];
    $sql_db = substr($url["path"], 1);
