<?php

        $servername = "localhost";
        $username = "root";
        $password = "rohith";

        $conn = new mysqli($servername, $username, $password);

        $create="CREATE DATABASE IF NOT EXISTS SVE;";
        if ($conn->query($create) === TRUE) {
            echo "";
        } 
        $conn->close();


        $conn = new mysqli($servername, $username, $password, "SVE");

        // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error) . "<br>";
        // }
        // echo "Connected successfully <br>";

        $stk = "CREATE TABLE IF NOT EXISTS STOCK (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), NET_VALUE FLOAT(10), LUPDAT TIMESTAMP);";
        $conn->query($stk);

        //DATABASE
        $tdy = "CREATE TABLE IF NOT EXISTS dt".date("dmY")." (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), DISC INT(10), NET_VALUE FLOAT(10), CORD VARCHAR(10));";

        $mon = "CREATE TABLE IF NOT EXISTS mon".date("mY")." (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), DISC INT(10), NET_VALUE FLOAT(10), CORD VARCHAR(10));";
        
        if ($conn->query($tdy) && $conn->query($mon) === TRUE) {
            echo "";
        } else {
            echo "Error opening Account: " . $conn->error . "<br>";
        }

?>