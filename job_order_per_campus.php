<?php 
include("header.php");
?>
 <section class="content">

        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h4>SỐ HỢP ĐỒNG TRÊN MỖI BỘ MÔN</h4>
                                <form action="" method="POST">
                                    Từ ngày : <input type="date" name="d1" style="color: #000;"> 
                                    Đến: <input type="date" name="d2" style="color: #000;"> 
                                    <input type="submit" value="Search" name="filter" style="color: #000;">
                                </form>
                                <a href="print_job_order_per_campus.php">
                                    <input type="button" value="Print" class="print">
                                </a>
                            </div>
                        </div>
                        <div id="print">
                            <div class="body">
                            <?php
                                include('connect.php');
                                if (isset($_POST['filter'])) {
                                $d1 = $_POST['d1'];
                                $d2 = $_POST['d2'];
                            ?>
                                <table id = "example" class = "stripe" cellspacing = "0" >
                                <thead>
                                    <tr>
                                        <th > BỘ MÔN</th>
                                        <th >Số hợp đồng làm việc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $afilter = $con->prepare("SELECT atotal1.atotal2 + atotal3.atotal4 as atotal FROM (
                                        SELECT COUNT(*) as atotal2
                                        FROM   tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Khoa học máy tính' AND per_employee_status = 'Hợp đồng'
                                        ) as atotal1,
                                        (
                                        SELECT COUNT(*) as atotal4
                                        FROM   tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Khoa học máy tính'AND per_employee_status = 'Hợp đồng'
                                        ) as atotal3 ");
                                        $afilter->execute();
                                        $afetch = $afilter->fetchAll();

                                        foreach ($afetch as $key => $row) {
                                            $atotal = $row['COUNT(*)' + 'COUNT(atotal)'];


                                        //MS TOTAL
                                        //MS TOTAL
                                        //MS TOTAL
                                    $tfilter = $con->prepare("SELECT ttotal1.ttotal2 + ttotal3.ttotal4 as ttotal FROM (
                                        SELECT COUNT(*) as ttotal2
                                        FROM   tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Công nghệ phần mềm' AND per_employee_status = 'Hợp đồng' 
                                        ) as ttotal1,
                                        (
                                        SELECT COUNT(*) as ttotal4
                                        FROM   tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Công nghệ phần mềm' AND per_employee_status = 'Hợp đồng' 
                                        ) as ttotal3 ");
                                    $tfilter->execute();
                                    $tfetch = $tfilter->fetchAll();

                                        foreach ($tfetch as $key => $row1) {
                                            $ttotal = $row1['COUNT(*)' + 'COUNT(ttotal)'];

                                            //DR QUERY
                                            //DR QUERY
                                            //DR QUERY
                                    $bfilter = $con->prepare("SELECT btotal1.btotal2 + btotal3.btotal4 as btotal FROM (
                                        SELECT COUNT(*) as btotal2
                                        FROM tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Kĩ thuật máy tính' AND per_employee_status = 'Hợp đồng'
                                        ) as btotal1,
                                        (
                                        SELECT COUNT(*) as btotal4
                                        FROM tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Kĩ thuật máy tính' AND per_employee_status = 'Hợp đồng'
                                        ) as btotal3 ");
                                    
                                        $bfilter->execute();
                                        $bfetch = $bfilter->fetchAll();

                                        foreach ($bfetch as $key => $row2) {
                                            $btotal = $row2['COUNT(*)' + 'COUNT(btotal)'];


                                        $ftfilter = $con->prepare("SELECT fttotal1.fttotal2 + fttotal3.fttotal4 as fttotal FROM (
                                        SELECT COUNT(*) as fttotal2
                                        FROM tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Hệ thống thông tin' AND per_employee_status = 'Hợp đồng'
                                        ) as fttotal1,
                                        (
                                        SELECT COUNT(*) as fttotal4
                                        FROM tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Hệ thống thông tin' AND per_employee_status = 'Hợp đồng'
                                        ) as fttotal3 ");
                                    
                                        $ftfilter->execute();
                                        $ftfetch = $ftfilter->fetchAll();

                                        foreach ($ftfetch as $key => $row3) {
                                            $fttotal = $row3['COUNT(*)' + 'COUNT(fttotal)'];
                                             ?>
                                            <tr>
                                             <td>Khoa học máy tính</td>
                                             <td><?php echo $atotal; ?></td>
                                             </tr>
                                            <tr>
                                             <td>Kĩ thuật máy tính</td>
                                             <td><?php echo $btotal; ?></td>
                                            </tr>
                                            <tr>
                                             <td>Hệ thống thông tin</td>
                                             <td><?php echo $btotal; ?></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                             <td>Công nghệ phần mềm</td>
                                             <td><?php echo $ttotal; ?></td>
                                             </tr>
                                            <td>TOTAL</td>
                                             <td><?php echo $atotal + $ttotal + $btotal; ?></td>
                                            </tr>
                                      </tbody>
                                </table>
                                <?php } } } }?>
                                <?php } else { ?>
                                <table id = "example" class = "stripe" cellspacing = "0" >
                                <thead>
                                    <tr>
                                        <td>BỘ MÔN</td>
                                        <td>Số hợp đồng làm việc</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                include('connect.php');
                                 $display = $con->prepare("SELECT COUNT(*) FROM tbl_personnel where per_campus = 'Công nghệ phần mềm' AND per_employee_status = 'Hợp đồng' ");
                                    $display->execute();
                                    $fetch = $display->fetchAll();

                                foreach($fetch as $key => $row) { 
                                   $total = $row['COUNT(*)'];

                                    }?>
                                <td>Công nghệ phần mềm</td>
                                <td><?php echo $total; ?></td>

                                </tr>
                                <tr>
                                <?php
                                
                                 $display1 = $con->prepare("SELECT COUNT(*) FROM tbl_personnel where per_campus = 'Khoa học máy tính' AND per_employee_status = 'Hợp đồng' ");
                                    $display1->execute();
                                    $fetch1 = $display1->fetchAll();
                                    
                                foreach($fetch1 as $key => $row1) { 
                                   $total1 = $row1['COUNT(*)'];

                                    }?>
                                <td>Khoa học máy tính</td>
                                <td><?php echo $total1; ?></td>
                                </tr>
                                <tr>
                                <?php
                                
                                 $display2 = $con->prepare("SELECT COUNT(*) FROM tbl_personnel where per_campus = 'Hệ thống thông tin' AND per_employee_status = 'Hợp đồng' ");
                                    $display2->execute();
                                    $fetch2 = $display2->fetchAll();
                                    
                                foreach($fetch2 as $key => $row2) { 
                                   $total2 = $row2['COUNT(*)'];

                                    }?>
                                <td>Hệ thống thông tin</td>
                                <td><?php echo $total2; ?> </td>
                                </tr>
                                <tr>
                                <?php
                                
                                 $display3 = $con->prepare("SELECT COUNT(*) FROM tbl_personnel where per_campus = 'Kĩ thuật máy tính' AND per_employee_status = 'Hợp đồng' ");
                                    $display3->execute();
                                    $fetch3 = $display3->fetchAll();
                                    
                                foreach($fetch3 as $key => $row3) { 
                                   $total3 = $row3['COUNT(*)'];

                                    }?>
                                <td>Kĩ thuật máy tính</td>
                                <td><?php echo $total3; ?> </td>
                                </tr>
                                <tr>
                                <?php
                                
                                 $display4 = $con->prepare("SELECT COUNT(*) FROM tbl_personnel WHERE per_employee_status = 'Hợp đồng' ");
                                    $display4->execute();
                                    $fetch4 = $display4->fetchAll();
                                    
                                foreach($fetch4 as $key => $row4) { 
                                   $sum = $row4['COUNT(*)'];

                                    }?>
                                <th>Total</th>
                                <td><?php echo $sum; ?> </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
             </div>
         </div>
    </div>
</section>

   <script>
    function printDiv() {
        //Get the HTML of div
        var divElements = document.getElementById("print").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<table></table>" + divElements;
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }
    </script>
<script src="plugins/js/jquery-1.js"></script>
<script src="plugins/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php 
include("script.php");
?>