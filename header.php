<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hồ Sơ Nhân Viên</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="plugins/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    
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
    
    <div class="overlay"></div>
    
    <div style="width: 100%;height: 70px;background-color: #0B0B3B;">
        <a href="home.php">
            <span class = "navbar-brand"><p style="text-align: center;"><img src="images/logo.jpg" style="display: inline-block;" width="30" height="50"> ĐẠI HỌC BÁCH KHOA HÀ NỘI - HANOI UNIVERSITY OF SCIENCE AND TECHNOLOGY</p></span>
        </a>
    </div>
   
    <section>
        
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><p style="text-align: center;"><img src="images/logovien.jpg" style="display: inline-block;" width="20" height="20"> Viện Công Nghệ Thông Tin và Truyền Thông</p></li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;Danh mục
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="all_personnel.php">Nhân viên</a>
                            </li>
                            <li>
                                <a href="position_table.php">Chỉ thị</a>
                            </li>
                            <li>
                                <a href="gass_rank_table.php">GASS </a>
                            </li>
                            <li>
                                <a href="rank_table.php">Academic Rank</a>
                            </li>
                            <li>
                                <a href="department_table.php">Bộ phận</a>
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
                            
                            <i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Campuses
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="all_campus.php">ALL CAMPUSES</a>
                            </li>
                            <li>
                                <a href="talisay_campus.php">TALISAY</a>
                            </li>
                            <li>
                                <a href="fortune_towne_campus.php">FORTUNE TOWNE</a>
                            </li>
                            <li>
                                <a href="alijis_campus.php">ALIJIS</a>
                            </li>
                            <li>
                                <a href="binalbagan_campus.php">BINALBAGAN</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            
                            <i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Reports
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="individual_report.php">Individual Reports</a>
                            </li>
                            <li>
                                <a href="retirement_table.php">Retirement</a>
                            </li>
                            <li>
                                <a href="faculty_profile.php">Faculty Profile by Unit</a>
                            </li>
                            <li>
                                <a href="educational_qualification.php">Educational Qualifications</a>
                            </li>
                            <li>
                                <a href="faculty_per_campus.php">Number of Faculty / Campus</a>
                            </li>
                            <li>
                                <a href="Faculty_profile_by_degree.php">Faculty Profile by Degree</a>
                            </li>
                            <li>
                                <a href="faculty_profile_by_academic_rank.php">Faculty Profile by Academic Rank</a>
                            </li>
                            <li>
                                <a href="breakdown_of_faculty_profile.php">Breakdown Of Faculty</a>
                            </li>
                            <li>
                                <a href="gass_profile_by_degree.php">Gass Profile By Degree</a>
                            </li>
                            <li>
                                <a href="gass_per_campus.php">Number of Gass Personnel per Campus</a>
                            </li>
                            <li>
                                <a href="job_order_per_campus.php">Number of Job Order Personnel per Campus</a>
                            </li>
                            <li>
                                <a href="gass_personnel.php">GASS Personnel with Completed Master's and Doctoral Degree</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php"> 
                            <i class="glyphicon">&#xe163;</i>
                        </a>
                    </li>
                </ul><br><br><br>

            </div>

        </aside>
    </section>

            <?php include("add_position_modal.php"); ?>
            <?php include("add_rank_modal.php"); ?>
            <?php include("add_department_modal.php"); ?>



