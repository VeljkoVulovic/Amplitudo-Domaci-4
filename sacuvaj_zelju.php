<?php

    require './files.php';

    $errorMessage = "Uspjesno ste poslali zelju!";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $city = $_POST["city"];
    $wish = $_POST["wish"];

    if(!empty($_POST["checkbox"])){
        $checkbox = $_POST["checkbox"];
    }else{
        $errorMessage = "Sledece godine kad budes slusa.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($firstName)) {
          $errorMessage = "Popunite polje sa imenom.";
        } else {
          if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
            $errorMessage = "Samo slova su dozvoljena u polje sa imenom.";
          }
        }

        if (empty($lastName)) {
          $errorMessage = "Popunite polje sa prezimenom.";
        } else {
          if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
            $errorMessage = "Samo slova su dozvoljena u polje prezimenom.";
          }
        }
    
        if (empty($city)) {
          $errorMessage = "Izaberite grad.";
        } else {
          if ($city=="gradNijeIzabran") {
            $errorMessage = "Izaberite grad.";
          }
        }

        if (empty($wish)) {
          $errorMessage = "Opisite vasu zelju.";
        }  
    }

    if($errorMessage == "Uspjesno ste poslali zelju!"){
        $response_array = ['firstName' => $firstName,'lastName' => $lastName,'city' => $city,'wish' => $wish, 'date' => date('d.m.Y H:i')];
        $json_new_wish = json_encode($response_array);
        insertIntoDB(uniqid(),$json_new_wish);
        header("location: ./zelja_poslata.html");
    } else {
        // header("location: ./index.html?msg=error");
        echo "<script>
        alert('".$errorMessage."');
        window.location.href='./index.html';
        </script>";
    }
    
?>