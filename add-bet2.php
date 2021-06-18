<?php
if (isset($_POST['bet-name']) && isset($_POST['category']) && isset($_POST['sub-category']) && isset($_POST['sub-sub-category']) && isset($_POST['date'])) {
    $db = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($db, "wprgmxbet");

}
