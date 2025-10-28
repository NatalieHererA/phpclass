<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        table {
            border: 3px solid black;
            border-collapse: collapse;
            width: 90%;
            margin: 50px auto;
            table-layout: fixed;
        }
        th, td {
            font-size: 0.8em;
            overflow: hidden;
            border: 1px solid black;
            padding: 10px;
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
        <h2>Customer Listing</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Member Key</th>
            </tr>
 <?php
            include "../includes/db.php";
            $con = getDBConnection();
            $result = mysqli_query($con,"SELECT * FROM customerlist");

            while($row = mysqli_fetch_array($result)) {

                $customerID = $row["CustomerID"];
                $firstName = $row["FirstName"];
                $lastName = $row["LastName"];
                $address = $row["Address"];
                $city = $row["City"];
                $state = $row["State"];
                $zip = $row["Zip"];
                $phone = $row["Phone"];
                $email = $row["Email"];
                $password = $row["Password"];
                $memberKey = $row["memberKey"];

                echo "<tr>";
                echo "        <td><a href='updateCustomer.php?id=$customerID'>$customerID</a></td>";
                echo "        <td><a href='updateCustomer.php?id=$customerID'>$firstName</a></td>";
                echo "        <td>$lastName</td>";
                echo "        <td>$address</td>";
                echo "        <td>$city</td>";
                echo "        <td>$state</td>";
                echo "        <td>$zip</td>";
                echo "        <td>$phone</td>";
                echo "        <td>$email</td>";
                echo "        <td>$password</td>";
                echo "        <td>$memberKey</td>";
                echo "</tr>";
            }
 ?>
        </table>
        <a href="addCustomer.php">Add a new customer</a>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>
