<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicolas
 * Date: 12/9/2015
 * Time: 11:56 AM
 */
if (isset($_GET['flow'])) {
    try {


        $huby_db = new PDO(
            'sqlite:HubyDb.db');
        $huby_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);      // Select all data from file db messages table
        var_dump($_GET['flow']);
        if ($_GET['flow'] == "in") {
            $result = $huby_db->query("INSERT INTO Entry(Date)
                                  VALUES (datetime('now','+1 hour'))");
        } else if ($_GET['flow'] == "out") {
            $result = $huby_db->query("INSERT INTO Exit(Date)
                                  VALUES (datetime('now','+1 hour'))");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
