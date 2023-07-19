<!DOCTYPE html>
<?php
    require 'conn.php';
    session_start();
 
    if (!isset($_SESSION['user'])) {
        header('location: index.php');
        exit();
    }
?>

<?php
    if (isset($_POST['give'])) {
        try {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $balance = $_POST['balance'];

            // Prepare the query to check if the user exists
            $query = "SELECT * FROM `clientes` WHERE `firstname` = ? AND `lastname` = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ss", $firstname, $lastname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                // User found in the database, proceed with the update
                $updateQuery = "UPDATE `clientes` SET `balance` = `balance` + ? WHERE `firstname` = ? AND `lastname` = ?";
                $updateStmt = mysqli_prepare($conn, $updateQuery);
                mysqli_stmt_bind_param($updateStmt, "dss", $balance, $firstname, $lastname);
                mysqli_stmt_execute($updateStmt);
                
                $_SESSION['message'] = array("text" => "Dinheiro entregue.", "alert" => "success");
                header("location: admin-page.php");
                exit();
            } else {              
                $_SESSION['message'] = array("text" => "Utilizador não encontrado.", "alert" => "danger");
                header("location: admin-page.php");
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            $_SESSION['message'] = array("text" => "Por favor Preencha todos os campos", "alert" => "info");
            header("location: admin-page.php");
            exit();
        }
    }
?>