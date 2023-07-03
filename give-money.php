<!DOCTYPE html>
<?php
    require 'conn.php';
    session_start();
 
    if (!isset($_SESSION['user'])) {
        $isLoggedIn = true;
        header('location:index.php');
    }
?>

<?php
    if (isset($_POST['give'])) {
        try {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $balance = $_POST['balance'];
            $id = $_SESSION['user'];

            // Prepare the query to check if the user exists
            $query = $conn->prepare("SELECT * FROM `clientes` WHERE `firstname` = :firstname AND `lastname` = :lastname");
            $query->bindParam(':firstname', $firstname);
            $query->bindParam(':lastname', $lastname);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // User found in the database, proceed with the update
                $sql = $conn->prepare("UPDATE `clientes` SET `balance` = `balance` + $balance WHERE `firstname` = '$firstname' AND `lastname` = '$lastname'");
                $sql->execute();
                $fetch = $sql->fetch();
                $_SESSION['message'] = array("text" => "Dinheiro entregue.", "alert" => "success");
                header("location: admin-page.php");
            } else {              
                 $_SESSION['message'] = array("text" => "No user found.", "alert" => "danger");
                header("location: admin-page.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            header("location: admin-page.php");
            $_SESSION['message'] = array("text" => "Por favor Preencha todos os campos", "alert" => "info");
        }
    }
?>
