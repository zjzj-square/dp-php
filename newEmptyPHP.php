<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Base.php';

Base::DB_Connect();

            // Create Users  table
//            $sql = "CREATE TABLE Trains (
//            id int(10) unsigned NOT NULL AUTO_INCREMENT,
//            Departure varchar(20) NOT NULL, 
//            Arrival varchar(20) NOT NULL,
//            DepartureTime varchar(20) NOT NULL,
//            Duration varchar(20) NOT NULL,
//            PRIMARY KEY (id)
//            )";
//            mysql_query($sql);
//            $sql = "INSERT INTO `Trains` VALUES (null,'Torino','Milano','14:10','01:40') ";
//            mysql_query($sql);            

            $sql = "CREATE TABLE BookRecord (
            id int(10) unsigned NOT NULL AUTO_INCREMENT,
            UserName varchar(20)  NOT NULL,
            Departure varchar(20) NOT NULL, 
            Arrival varchar(20) NOT NULL,
            DepartureTime DATETIME NOT NULL,
            ArrivalTime DATETIME NOT NULL,
            Duration TIME NOT NULL,
            PRIMARY KEY (id)
            )";
            mysql_query($sql);
//            $sql = "INSERT INTO `Trains` VALUES (null,'Torino','Milano','14:10','01:40') ";
//            mysql_query($sql);      
?>
