<?php
session_start();
require(__DIR__.'\..\config\helper.php');
//include(__DIR__.'\..\controllers\secure.php');
require(rootDir('/mini/event management php/Eventopedia/config/connect.php'));
$errors = [];
$values = [];

$conn = connect();

$values['type'] = $_POST['type'];
$values['email'] = $_POST['email'];
$values['password'] = $_POST['password'];
$_SESSION['type'] = $values['type'];

if (count($errors) == 0) {
    try {
        if ($values['type'] == "user") {
            $sql = "select * from users where email=:email && password=:password;";
        } else {
            $sql = "select * from admin where email=:email && password=:password;";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $values['email']);
        $stmt->bindParam(':password', $values['password']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $_SESSION['_login'] = $user['id'];
            $_SESSION['type'] = $values['type'];

            flash('success', "Welcome {$user['firstname'] }! You have successfully logged in");
            redirectTo(localhost('index.php'));
        } else {
            unset($_SESSION['_login']);
            flash('danger', 'Invalid email or password');
            redirectTo(localhost('login.php'));
        }
        connect_close();
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
        die();
    }
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['values'] = $values;
    redirectTo(localhost('login.php'));
}
?>
