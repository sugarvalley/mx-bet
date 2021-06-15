<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$fname = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'wprgmxbet');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Nazwa użytkownika jest wymagana!"); }
    if (empty($fname)) { array_push($errors, "Imię jest wymagane!"); }
    if (empty($email)) { array_push($errors, "Email jest wymagany!"); }
    if (empty($password_1)) { array_push($errors, "Hasło jest wymagane!"); }
    if ($password_1 != $password_2) {
        array_push($errors, "Hasła nie są identyczne");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE login='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['login'] === $username) {
            array_push($errors, "Nazwa użytkownika jest już zajęta");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Istnieje konto z podanym adresem email");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO `user` (`login`, `name`, `email`, `password`) 
  			  VALUES('$username', '$fname', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Jesteś zalogowany!";
        header('location: index_user.php');
    }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Nazwa użytkownika jest wymagana!");
    }
    if (empty($password)) {
        array_push($errors, "Hasło jest wymagane!");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE login='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Jesteś zalogowany";
            header('location: index_user.php');
        }else {
            array_push($errors, "Nieprawidłowa nazwa użytkownika lub hasło");
        }
    }
}

?>