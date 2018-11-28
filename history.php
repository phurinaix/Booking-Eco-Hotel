<?php
    require 'includes/db.inc.php';
    session_start();
    $username = $_SESSION["email"];
    $sql = "SELECT * FROM booking_room WHERE username=:username";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ประวัติการจอง</title>
    <link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
        h4 {
            text-align: center;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
        #history {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }

        #history td, #history th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #history tr:nth-child(even){background-color: #f2f2f2;}

        #history tr:hover {background-color: #ddd;}

        #history th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <header id="header">
            <h1 id="logo"><a href="index.php">Booking <span>Ecohotel</span>&nbsp;&nbsp;<i class="fas fa-hotel"></i></a></h1>
            <nav id="nav">
                <ul>
                    <li class="current"><a href="index.php">Welcome</a></li>
                    <li class="submenu">
                        <a href="index.php">แนะนำโรงแรม</a>
                        <ul>
                            <li><a href="room.php">ดูห้องพัก</a></li>
                            <li><a href="service.php">การบริการ</a></li>
                            <li><a href="contact.php">ติดต่อเรา</a></li>
                            <li><a href="history.php">ประวัติการจอง</a></li>
                        </ul>
                    </li>
                    <?php if (empty($_SESSION["id"])) { ?>
                        <li><a href="signup.php" class="button primary">Sign Up</a></li>
                    <?php } else { ?>
                        <li><a href="includes/logout.inc.php" class="button primary">Log out</a></li>
                    <?php } ?>
                    
                </ul>
            </nav>
        </header>
        <br><br><br><br>
        <h4>ประวัติการจอง</h4>

        <table id="history">
            <tr>
                <th>Room</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            <?php while($row = $stmt->fetch()) : ?>
                <tr>
                    <td><?php echo $row["room"]; ?></td>
                    <td><?php echo $row["start_date"]; ?></td>
                    <td><?php echo $row["end_date"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollgress.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>