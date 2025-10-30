<?php

    $memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

    $errorMessage = "";

    $formSubmitted = isset($_POST["hidden"]);

    if(!empty($_GET["txtFirstName"]) && !empty($_GET["txtLastName"]) && !empty($_GET["txtAddress"]) && !empty($_GET["txtCity"]) && !empty($_GET["txtState"]) && !empty($_GET["txtZip"]) && !empty($_GET["txtPhone"]) && !empty($_GET["txtEmail"]) && !empty($_GET["txtPassword"])) {

        $txtFirstName = $_GET["txtFirstName"];
        $txtLastName = $_GET["txtLastName"];
        $txtAddress = $_GET["txtAddress"];
        $txtCity = $_GET["txtCity"];
        $txtState = $_GET["txtState"];
        $txtZip = $_GET["txtZip"];
        $txtPhone = $_GET["txtPhone"];
        $txtEmail = $_GET["txtEmail"];
        $txtPassword = $_GET["txtPassword"];

        $hashedPassword = $row["memberPassword"];
        $memberKey = $row["memberKey"];

        try {
            include "../includes/db.php";
            $con = getDBConnection();

            $query = "INSERT INTO customerlist (FirstName, LastName, Address, City, State, Zip, Phone, Email, Password, memberKey) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ssssssssss", $txtFirstName, $txtLastName, $txtAddress, $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $txtPassword, $memberKey);
            mysqli_stmt_execute($stmt);

            header("Location:index.php");

            if ($row != null) {

                if (md5($txtPassword . $memberKey) == $hashedPassword) {
                    // password matched!
                    $_SESSION["userID"] = $row["memberID"];
                    $_SESSION["roleID"] = $row["roleID"];

                    if ($row['roleID'] == 3) {
                        header("location: admin.php");

                    }else if ($row ['roleID'] == 1) {
                        header("location: member.php");
                    }

                } else {
                    $errorMessage = "1Email or password was incorrect";
                }
            }
        } catch (mysqli_sql_exception $ex){
            $errorMessage = $ex;
        }
    }


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>
    <link rel="stylesheet" href="/css/base.css">

    <style>
        .grid-header{ grid-area:grid-header; }
        .first-name{ grid-area:first-name; }
        .first-input{ grid-area:first-input; }
        .last-name{ grid-area:last-name; }
        .last-input{ grid-area:last-input; }
        .address{ grid-area:address; }
        .address-input{ grid-area:address-input; }
        .city{ grid-area: city; }
        .city-input{ grid-area:city-input; }
        .state{ grid-area:state; }
        .state-input{ grid-area:state-input; }
        .zip{ grid-area:zip; }
        .zip-input{ grid-area:zip-input; }
        .phone{ grid-area:phone; }
        .phone-input{ grid-area:phone-input; }
        .email{ grid-area:email; }
        .email-input{ grid-area:email-input; }
        .password{ grid-area:password; }
        .password-input{ grid-area:password-input; }
        .grid-footer{ grid-area:grid-footer; }

        .grid-container {
            display: grid;
            grid-template-areas:
                "grid-header grid-header"
                "first-name first-input"
                "last-name last-input"
                "address address-input"
                "city city-input"
                "state state-input"
                "zip zip-input"
                "phone phone-input"
                "email email-input"
                "password password-input"
                "grid-footer grid-footer"
        ;
            border: 1px solid black;

        }

        .grid-container > div {
            border: 1px solid black;
            text-align: center;
        }

        .grid-container input[type="text"] {
            width: 80%;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php
        include "../includes/header.php"
    ?>
<div id="three-column">
    <?php
        include "../includes/navigation.php"
    ?>
    <main>
        <form method="get">
            <div class="grid-container">

                <div class="grid-header">
                    <h3>Add new customer</h3>
                </div>

                <div class="first-name">
                    <label for="txtFirstName">First Name</label>
                </div>
                <div class="first-input">
                    <input type="text" name="txtFirstName" id="txtFirstName">
                </div>

                <div class="last-name">
                    <label for="txtLastName">Last Name</label>
                </div>
                <div class="last-input">
                    <input type="text" name="txtLastName" id="txtLastName">
                </div>

                <div class="address">
                    <label for="txtAddress">Address</label>
                </div>
                <div class="address-input">
                    <input type="text" name="txtAddress" id="txtAddress">
                </div>

                <div class="city">
                    <label for="txtCity">City</label>
                </div>
                <div class="city-input">
                    <input type="text" name="txtCity" id="txtCity">
                </div>

                <div class="state">
                    <label for="txtState">State</label>
                </div>
                <div class="state-input">
                    <input type="text" name="txtState" id="txtState">
                </div>

                <div class="zip">
                    <label for="txtZip">Zip</label>
                </div>
                <div class="zip-input">
                    <input type="text" name="txtZip" id="txtZip">
                </div>

                <div class="phone">
                    <label for="txtPhone">Phone</label>
                </div>
                <div class="phone-input">
                    <input type="text" name="txtPhone" id="txtPhone">
                </div>

                <div class="email">
                    <label for="txtEmail">Email</label>
                </div>
                <div class="email-input">
                    <input type="text" name="txtEmail" id="txtEmail">
                </div>

                <div class="password">
                    <label for="txtPassword">Password</label>
                </div>
                <div class="password-input">
                    <input type="text" name="txtPassword" id="txtPassword">
                </div>

                <div class="grid-footer">
                    <input type="submit" value="Add New Customer">
                </div>
            </div>
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>