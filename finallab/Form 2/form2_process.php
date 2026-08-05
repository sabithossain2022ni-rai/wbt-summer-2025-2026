<?php

$nameErr = $postalErr = $dobErr = $emailErr = $passwordErr = $countryErr = "";

$name = $postal = $dob = $email = $password = $country = "";


function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["postal"])) {
        $postalErr = "Postal Code is required";
    } else {
        $postal = cleanInput($_POST["postal"]);

        if (!preg_match("/^[0-9]{4,10}$/", $postal)) {
            $postalErr = "Postal Code must contain 4 to 10 digits";
        }
    }

   
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = cleanInput($_POST["dob"]);

        $today = new DateTime();
        $birth = DateTime::createFromFormat("Y-m-d", $dob);

        if (!$birth || $birth->format("Y-m-d") !== $dob) {
            $dobErr = "Enter a valid date (YYYY-MM-DD)";
        } elseif ($birth > $today) {
            $dobErr = "Date of Birth cannot be in the future";
        } elseif ($birth->diff($today)->y < 18) {
            $dobErr = "You must be at least 18 years old";
        }
    }


    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }


    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long";
        }
    }


    if (empty($_POST["country"])) {
        $countryErr = "Please select a country";
    } else {
        $country = cleanInput($_POST["country"]);
    }

  
    if (
        empty($nameErr) &&
        empty($postalErr) &&
        empty($dobErr) &&
        empty($emailErr) &&
        empty($passwordErr) &&
        empty($countryErr)
    ) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>All form data is valid.</p>";
    }
}
?>