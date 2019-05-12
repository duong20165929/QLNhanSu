<link rel="stylesheet" type="text/css" href="css/style1.css">

<center>
    <div class="backk" style="float: left; margin-left: 120px;">
        <button><a href="job_order_per_campus.php">Back</a></button>
    </div>
    <div class="filterss" style="float: right; margin-right: 120px;" onload="refresh();">
        <button onclick="printContent('print')" id = "hit" style="float: right;">Print Report</button>
        <input id="btnExport" type="button" value="Export to Excel" style="float: right; margin-top: 30px; margin-right: -86px;">
        <form action="" method="POST">
            <div class="filter-date" style="float: left; margin-top: -21px; margin-right: 108px">
                Từ năm : <input type="text" name="d1" placeholder="Năm" style="color: #000;"> 
                Đến: <input type="text" name="d2" placeholder="Năm" style="color: #000;"> 
            <input type="submit" value="Search" name="filter" style="color: #000;">
            </div>
        &nbsp;&nbsp;
        <?php
                include('connect.php');
                if (isset($_POST['filter'])) {
                $d1 = $_POST['d1'];
                $d2 = $_POST['d2'];

                
            ?>
    </div>
    <div ng-app="myApp" ng-controller="myCtrl">
        <div class="prepared-form" style="border: 1px solid; width: 30%; margin-right: 480px;">
            <i>Note: Hãy điền đầy đủ thông tin.</i>
            <br><br>
            <table>
            <tr>
                <td>Người soạn :</td>
                <td><input ng-model="firstname" placeholder="" class="form-control"></td>
            </tr>
            <tr>
                <td>Chức vụ:</td>
                <td><input ng-model="position" placeholder="" class="form-control"></td>
            </tr>
            <tr>
                <td>Người xác nhận :</td>
                <td><input ng-model="certified" placeholder="" class="form-control"></td>
            </tr>
            <tr>
                <td>Chức vụ :</td>
                <td><input ng-model="position1" placeholder="" class="form-control"></td>
            </tr>
           </table>
        </div>
    <br><br>
    <div id="print" style="border: 1px solid; width: 80%; height: auto;">
        <div class="report-title" style = "margin:10px;"><br/>
            <div class="print-logo">
                <img src="images/soict.png" width="120px" height="120px" style="margin-left: -330px; position: absolute;">
            </div>
            <center><strong>ĐẠI HỌC BÁCH KHOA HÀ NỘI</strong></center>
            <center><strong>Viện Công Nghệ Thông Tin và Truyền Thông</strong></center>
            <center>Phòng 504 - Nhà B1 - Đại học BKHN</center>
            <center>Liên hệ: (+84) 4 3869 2463</center>
            <br />
            <center><strong>TỔNG SỐ HỢP ĐỒNG</strong></center>
            <center><strong>Từ năm <?php echo $d1 ." đến ". $d2; ?></strong></center>
        </div>
        <br />
        <br />
        <br />
        <br />
            <center>
            <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
               <thead>
                                    <tr>
                                        <th > BỘ MÔN</th>
                                        <th >Số hợp đồng trên mỗi bộ môn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $afilter = $con->prepare("SELECT COUNT(per_employee_status) as khmt FROM `tbl_personnel` WHERE YEAR(date_modified) BETWEEN '$d1' AND '$d2' AND per_campus = 'Khoa học máy tính' AND per_employee_status = 'Hợp đồng'");
                                        $afilter->execute();
                                        $afetch = $afilter->fetchAll();

                                        foreach ($afetch as $key => $row) {
                                            $khmt = $row['khmt'];


                                        //MS TOTAL
                                        //MS TOTAL
                                        //MS TOTAL
                                    $tfilter = $con->prepare("SELECT COUNT(per_employee_status) as cnpm FROM `tbl_personnel` WHERE YEAR(date_modified) BETWEEN '$d1' AND '$d2' AND per_campus = 'Công nghệ phần mềm' AND per_employee_status = 'Hợp đồng'");
                                    $tfilter->execute();
                                    $tfetch = $tfilter->fetchAll();

                                        foreach ($tfetch as $key => $row1) {
                                            $cnpm = $row1['cnpm'];

                                            //DR QUERY
                                            //DR QUERY
                                            //DR QUERY
                                    $bfilter = $con->prepare("SELECT COUNT(per_employee_status) as ktmt FROM `tbl_personnel` WHERE YEAR(date_modified) BETWEEN '$d1' AND '$d2' AND per_campus = 'Kĩ thuật máy tính' AND per_employee_status = 'Hợp đồng'");
                                    
                                        $bfilter->execute();
                                        $bfetch = $bfilter->fetchAll();

                                        foreach ($bfetch as $key => $row2) {
                                            $ktmt = $row2['ktmt'];


                                        $ftfilter = $con->prepare("SELECT COUNT(per_employee_status) as httt FROM `tbl_personnel` WHERE YEAR(date_modified) BETWEEN '$d1' AND '$d2' AND per_campus = 'Hệ thống thông tin' AND per_employee_status = 'Hợp đồng'");
                                    
                                        $ftfilter->execute();
                                        $ftfetch = $ftfilter->fetchAll();

                                        foreach ($ftfetch as $key => $row3) {
                                            $httt = $row3['httt'];
                                             ?>
                                            <tr>
                                             <td>Khoa học máy tính</td>
                                             <td><?php echo $khmt; ?></td>
                                             </tr>
                                            <tr>
                                             <td>Kĩ thuật máy tính</td>
                                             <td><?php echo $ktmt; ?></td>
                                            </tr>
                                            <tr>
                                             <td>Hệ thống thông tin</td>
                                             <td><?php echo $httt; ?></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                             <td>Công nghệ phần mềm</td>
                                             <td><?php echo $cnpm; ?></td>
                                             </tr>
                                            <td>TOTAL</td>
                                             <td><?php echo $khmt + $ktmt + $httt + $cnpm; ?></td>
                                            </tr>
                                      </tbody>
                                </table>
                                <?php } } } }?>
                                <?php } else { ?>
                                <table id = "example" class = "stripe" cellspacing = "0" >
                                <thead>
                                    <tr>
                                        <td>BỘ MÔN</td>
                                        <td>Số hợp đồng trên mỗi bộ môn</td>
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
                <br><br><br>
                <div class="noted">
                    <label><strong>Người soạn</strong></label>
                    <br>
                    <br>
                    <label style="text-transform: uppercase;">{{firstname}}</label>
                    <br>
                    <label style="text-transform: capitalize;">{{position}}</label>
                    <br><br><br>
                    <label><strong>Người xác nhận</strong></label>
                    <br>
                    <br>
                    <label style="text-transform: uppercase;">{{certified}}</label>
                    <br>
                    <label style="text-transform: capitalize;">{{position1}}</label>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
    </center>
                        </form>

<script src="plugins/js/jquery-1.js"></script>

<script type="text/javascript">
$("#btnExport").click(function (e) {
    //getting values of current time for generating the file name
    var dt = new Date();
    var day = dt.getDate();
    var month = dt.getMonth() + 1;
    var year = dt.getFullYear();
    var hour = dt.getHours();
    var mins = dt.getMinutes();
    var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
    //creating a temporary HTML link element (they support setting file names)
    var a = document.createElement('a');
    //getting data from our div that contains the HTML table
    var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
    
    var table_html = $('#print')[0].outerHTML;
//    table_html = table_html.replace(/ /g, '%20');
    table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
    
    var css_html = '<style>td {border: 0.5pt solid #c0c0c0} .tRight { text-align:right} .tLeft { text-align:left} </style>';
//    css_html = css_html.replace(/ /g, '%20');
    
    a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>');
    
    //setting the file name
    a.download = 'Summary of GASS Profile by Campus_' + postfix + '.xls';
    //triggering the function
    a.click();
    //just in case, prevent default behaviour
    e.preventDefault();
});
</script>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<script type="text/javascript">
    (function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });

})(document);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.name = " ";
});
app.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});
</script>
