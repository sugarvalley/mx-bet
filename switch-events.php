<?php
switch ($_POST['event']) {
    case 1:
        include("change-amount.php");
        break;
    case 2:
        include("add-bet.php");
        break;
    case 3:
        include("add-event.php");
        break;
    case 4:
        include("add-category.php");
        break;
    case 5:
        include("add-region.php");
        break;
    case 6:
        include("add-result.php");
        break;
    case 7:
        include("see-stats.php");
        break;
}