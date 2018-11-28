<?php
    require 'db.inc.php';
    session_start();

    date_default_timezone_set("Asia/Bangkok");
    $today = date("Y-m-d");

    function getRoomId($type) {
        if ($type === 'dormitory') {
            return 1;
        } else if ($type === 'suite') {
            return 3;
        } else if ($type === 'mini-suite') {
            return 5;
        } else if ($type === 'superior') {
            return 7;
        } else {
            return 10;
        }
    }

    function getRoom($type) {
        if ($type === 'dormitory') {
            return 'A';
        } else if ($type === 'suite') {
            return 'B';
        } else if ($type === 'mini-suite') {
            return 'C';
        } else if ($type === 'superior') {
            return 'D';
        } else {
            return 'Z';
        }
    }
    
    
    if (isset($_POST["submit"])) {
        $room_type = $_POST["room_type"];
        $start_date = $_POST["start-date"];
        $end_date = $_POST["end-date"];
        $username = $_SESSION["email"];
        
        $start_date_array = explode("/", $start_date);
        $end_date_array = explode("/", $end_date);

        $start_date = $start_date_array[2].'-'.$start_date_array[0].'-'.$start_date_array[1];
        $end_date = $end_date_array[2].'-'.$end_date_array[0].'-'.$end_date_array[1];

        if (empty($start_date) || empty($end_date)) {
            header("location: ../form.php?err=empty");
            exit();
        } else {
            if (strtotime($start_date) < strtotime($today)) {
                echo "<script>alert('เวลาไม่ถูกต้อง');location='../form.php?room_type=$room_type'</script>";
                exit();
            } else {
                if(strtotime($start_date) < strtotime($end_date)) {
                    $room = getRoom($room_type);
                    $roomOne = '1'.$room;
                    $roomTwo = '2'.$room;
                    if ($room != 'Z') {
                        $sql = "SELECT * FROM booking_room WHERE room='$roomOne' ORDER BY booking_room_id DESC";
                        $stmt = $con->query($sql);
                        $result = $stmt->fetch();
                        $pre_end_date = $result["end_date"];

                        // return var_dump($pre_end_date);
                        if(!$pre_end_date) {
                            $sql = "INSERT INTO booking_room(room, start_date, end_date, username) VALUES ('$roomOne', '$start_date', '$end_date', '$username')";
                            $stmt = $con->query($sql);
                            $result = $stmt->fetch();
                            header("location: ../room.php");
                            exit();
                        } else {
                            $pre_end_date = substr($pre_end_date, 0, 10);
                            if(strtotime($pre_end_date) > strtotime($start_date)) {
                                $sql = "SELECT * FROM booking_room WHERE room='$roomTwo' ORDER BY booking_room_id DESC";
                                $stmt = $con->query($sql);
                                $result = $stmt->fetch();
                                $pre_end_date = $result["end_date"];
                                if (!$pre_end_date) {
                                    $sql = "INSERT INTO booking_room(room, start_date, end_date, username) VALUES ('$roomTwo', '$start_date', '$end_date', '$username')";
                                    $stmt = $con->query($sql);
                                    $result = $stmt->fetch();
                                    header("location: ../room.php");
                                    exit();
                                } else {
                                    $pre_end_date = substr($pre_end_date, 0, 10);
                                    if(strtotime($pre_end_date) > strtotime($start_date)) {
                                        echo "<script>alert('มีคนจองแล้ว');location='../form.php?room_type=$room_type'</script>";
                                        exit();
                                    } else {
                                        $sql = "INSERT INTO booking_room(room, start_date, end_date, username) VALUES ('$roomTwo', '$start_date', '$end_date', '$username')";
                                        $stmt = $con->query($sql);
                                        $result = $stmt->fetch();
                                        header("location: ../room.php");
                                        exit();
                                    }
                                }
                            } else {
                                $sql = "INSERT INTO booking_room(room, start_date, end_date, username) VALUES ('$roomOne', '$start_date', '$end_date', '$username')";
                                $stmt = $con->query($sql);
                                $result = $stmt->fetch();
                                header("location: ../room.php");
                                exit();
                            }
                        }
                    } else {
                        echo "<script>alert('Invalid room type');location='../form.php?room_type=$room_type'</script>";
                        exit();
                    }
                } else {
                    echo "<script>alert('Invalid time');location='../form.php?room_type=$room_type'</script>";
                    exit();
                }
            }
        }
    } else {
        header("location: ../form.php?err=empty?");
        exit();
    }
