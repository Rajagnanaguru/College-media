<?php
$name = $_POST['uname'];
$units = $_POST['units'];
$month = $_POST['month'];
    include_once "p2.php";
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Consumer</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Name of the consumer</td>
            <td> <?php echo $name; ?>
            </td>
        </tr>
        <tr>
            <td>No. of units consumed</td>
            <td> <?php echo $units; ?></td>
        </tr>
        <tr>
            <td>Month of billing</td>
            <td> <?php echo $month; ?></td>
        </tr>
        <tr>
            <td>Total charges</td>
            <td> <?php echo $cost?></td>
        </tr>
        <tr>
            <td><button>PAY</button></td>
        </tr>
    </table>
</body>

</html>