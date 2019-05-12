<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="1"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Personnel Profiling</title>
 <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="plugins/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <style type="text/css">
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
        border-radius: 30%;
        margin-left: -178px;
        margin-top: 153px;
        width: 21%;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .navbar-right {
        margin-left: 850px;

    }
    .notif {
        padding-top: 15px;
        margin-left: 20px;
        margin-right: 20px;
        border: 1px solid;
        height: auto;
        text-align: center;
    }
    .notif i {
        border-bottom: 2px solid;

    }
    .celeb {
        text-align: left;
        margin: 10px;
    }
    a:hover {
    text-decoration: none;
    }
    .files {
        width: 100px;
        display: inline-flex;
        margin: 5px;
        text-align: center;
    }
    </style>
</head>
<body class="theme-red">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <div style="width: 100%;height: 70px;background-color: #0B0B3B;">
        <a href="home.php">
            <span class = "navbar-brand"><p style="text-align: center;"><img src="images/logo.jpg" style="display: inline-block;" width="30" height="50"> ĐẠI HỌC BÁCH KHOA HÀ NỘI - HANOI UNIVERSITY OF SCIENCE AND TECHNOLOGY</p></span>
        </a>
    </div>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Tùy Chọn</li>
                    <li>
                        <a href="home.php">
                            <i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;Quản lý
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="all_personnel.php">Nhân sự</a>
                            </li>
                            
                            <li>
                                <a href="gass_rank_table.php">Chức danh</a>
                            </li>
                            <li>
                                <a href="rank_table.php">Bằng cấp</a>
                            </li>
                            <li>
                                <a href="department_table.php">Trường</a>
                            </li>
                            <li>
                                <a href="file_table.php">
                                    Files
                                </a>
                            </li>
                        </ul> 
                    </li>                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            
                            <i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Bộ môn
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="all_campus.php">Tất cả bộ môn</a>
                            </li>
                            <li>
                                <a href="talisay_campus.php">Công nghệ phần mềm</a>
                            </li>
                            <li>
                                <a href="fortune_towne_campus.php">Hệ thống thông tin</a>
                            </li>
                            <li>
                                <a href="alijis_campus.php">Khoa học máy tính</a>
                            </li>
                            <li>
                                <a href="binalbagan_campus.php">Kĩ thuật máy tính</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            
                            <i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Báo cáo
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="individual_report.php">Báo cáo cá nhân</a>
                            </li>
                            
                            <li>
                                <a href="job_order_per_campus.php">Số hợp đồng trên mỗi bộ môn</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php"> 
                            <i class="glyphicon">&#xe163;</i>
                        </a>
                    </li>
                </ul><br><br><br>
                <div class="dtime">
                    <div class="alert alert-info">
                        <i class="icon-calendar"></i>
                        <?php
                        $today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($today));
                        echo $new;
                        ?>
                    </div>
                 </div>
                <div class="notif">
                <span><i>HAVE A GOOD WORKING DAY</i></span><br><br>
                <div class="celeb">
                <?php
                  include("connect.php"); 
                    $date = date('-m-d');
                    $bquery = $con->prepare("SELECT * FROM tbl_personnel WHERE per_date_of_birth LIKE '%$date%' ");
                    $bquery->execute();
                    while($row = $bquery->fetch()) {
                        $bday = $row["per_date_of_birth"];
                        $date = new DateTime($bday);
                        $now = new DateTime();
                        $difference = $date->diff($now)->format('%y');
                        $gender = $row['per_gender'];

                    if ($gender == 'Male') { ?>
                    
                        <span>Age: <?php echo $difference; ?></span><br>
                        <span">Name: Mr. <?php echo $row['per_firstname']. " " . $row['per_middlename']. ". " . $row['per_lastname']; ?></span><br>
                        <span>Contact No.: <?php echo $row['per_contact_no']; ?></span><br>
                        <span>Campus: <?php echo $row['per_campus']; ?></span><br><br>
                   <?php } else { ?>
                        <span>Age: <?php echo $difference; ?></span><br>
                        <span>Name: Ms/Mrs. <?php echo $row['per_firstname']. " " . $row['per_middlename']. ". " . $row['per_lastname']; ?></span><br>
                        <span>Contact No.: <?php echo $row['per_contact_no']; ?></span><br>
                        <span>Campus: <?php echo $row['per_campus']; ?></span><br>
                  <?php  }
                  }
                ?>
                    </div>
                </div>
            </div>

        </aside>
    </section>

            <?php include("add_rank_modal.php"); ?>
            <?php include("add_department_modal.php"); ?>




