<?php
// connect to the database
$db = mysqli_connect($_ENV['DATABASE_HOSTNAME'], $_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);