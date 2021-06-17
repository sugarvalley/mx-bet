<?php
switch ($_POST['event']) {
    case 1:
        include("change-amount.php");
        break;
    case 2:
        include("add-event.php");
        break;
    case 3:
        include("add-result.php");
        break;
    case 4:
        include("see-stats.php");
        break;
}