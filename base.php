<?php

class Base {

    public static function DB_Connect() {
        $mysql_severname = "localhost";
        $mysql_user = "root";
        $mysql_pswd = "11111111";
        $mysql_db = "DP";
        $con = mysql_connect($mysql_severname, $mysql_user, $mysql_pswd);

        if (!$con) {
            die("could not connect :" . mysql_error());
        }
        if (!mysql_select_db($mysql_db, $con)) {
            // Create database
            if (mysql_query("CREATE DATABASE $mysql_db", $con)) {
                mysql_select_db($mysql_db, $con);
            } else {
                echo "Error creating database: " . mysql_error();
                exit;
            }
            // Create Users  table
            $sql = "CREATE TABLE Users (
            id int(10) unsigned NOT NULL AUTO_INCREMENT,
            UserName varchar(20) NOT NULL, 
            PassWord varchar(32) NOT NULL,
            FirstName varchar(20) NOT NULL,
            LastName varchar(20) NOT NULL,
            Email varchar(40) NOT NULL,
            PRIMARY KEY (id)
            )";
            mysql_query($sql);
            $admin_password=md5("ADMIN");
            $sql = "INSERT INTO `Users` VALUES (1,'admin','$admin_password','firstname','lastname','email') ";
            mysql_query($sql);
        }
    }

}

?>
