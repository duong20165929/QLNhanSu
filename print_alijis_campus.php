<link rel="stylesheet" type="text/css" href="css/style1.css">

<center>
  <div class="backk" style="float: left; margin-left: 120px;">
    <button><a href="all_campus.php">Back</a></button>
  </div>
  <div class="filterss" style="float: right; margin-right: 120px;">
    <button onclick="printContent('print')" id = "hit" style="float: right;">Print Report</button>
    <input id="btnExport" type="button" value="Export to Excel" style="float: right; margin-top: 30px; margin-right: -86px;">
    <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
    &nbsp;&nbsp;
  </div>
  <div ng-app="myApp" ng-controller="myCtrl">
    <div class="prepared-form" style="border: 1px solid; width: 30%; margin-right: 300px;">
      <i>Note: Hãy điền đầy đủ thông tin.</i>
      <br><br>
      <table>
        <tr>
          <td>Người soạn :</td>
          <td><input ng-model="firstname" placeholder="" class="form-control" required=""></td>
        </tr>
        <tr>
          <td>Chức vụ :</td>
          <td><input ng-model="position" placeholder="" class="form-control" required=""></td>
        </tr>
        <tr>
          <td>Người xác nhận :</td>
          <td><input ng-model="certified" placeholder="" class="form-control" required=""></td>
        </tr>
        <tr>
          <td>Chức vụ :</td>
          <td><input ng-model="position1" placeholder="" class="form-control" required=""></td>
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
            <br>
            <center>BỘ MÔN KHOA HỌC MÁY TÍNH</center>
      <center><?php echo date('F Y'); ?></center>
    </div>
      <br />
      <br />
      <br />
      <br />
      <table id="example" class="stripe order-table" cellspacing="0">
        <thead>
                                    <tr>
                                        <td class="hidden">ID</td>
                                        <td>Họ tên</td>
                                        <td>Chức vụ</td>
                                        <td>Trình độ</td>
                                        <td>Số điện thoại</td>
                                        <td>Tuổi</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  <?php
                                    include('connect.php');
                                    $display = $con->prepare("SELECT * FROM tbl_personnel LEFT JOIN tbl_gass_rank ON tbl_personnel.gass_id = tbl_gass_rank.gass_id LEFT JOIN tbl_academic_rank ON tbl_personnel.rank_id = tbl_academic_rank.rank_id WHERE tbl_personnel.per_campus='Khoa học máy tính'  ORDER BY per_id ASC");
                                    $display->execute();
                                    $fetch = $display->fetchAll();                               

                                      foreach($fetch as $key => $row) { 
                                        $bday = $row["per_date_of_birth"];
                                        $dooa = $row["per_date_of_original_appointment"];
                                        $date = new DateTime($bday);
                                        $date1 = new DateTime($dooa);
                                        $now = new DateTime();


                                        $difference = $date->diff($now)->format('%y');
                                        $length = $date->diff($now)->format('%y');


                                  ?>
                                  <tr>
                                  <td class="hidden"><?php echo $row['per_id']; ?></td>
                                  <td><?php echo $row['per_lastname']." ".$row['per_middlename']." ".$row['per_firstname']; ?></td>
                                  <td values="<?php echo $row['gass_id']; ?>"><?php echo $row['gass_name']; ?></td>
                                  <td values="<?php echo $row['rank_id']; ?>"><?php echo $row['rank_name']; ?></td>
                                  <td><?php echo $row['per_contact_no']; ?></td>
                                  <td><?php echo $difference;?></td>
                                  
                                  
                                  
                                  
                                </tr>                           
                                     <?php 
                                     } ?>
                                </tbody>
                </table>
      <br><br><br>
      <div class="noted">
        <label>Prepared by:</label>
        <br>
        <br>
        <label style="text-transform: uppercase;"><strong>{{firstname}}</strong></label>
        <br>
        <label style="text-transform: capitalize;">{{position}}</label>
        <br><br><br>
        <label>Certified Correct:</label>
        <br>
        <br>
        <label style="text-transform: uppercase;"><strong>{{certified}}</strong></label>
        <br>
        <label style="text-transform: capitalize;">{{position1}}</label>
        <br><br><br>
      </div>
    </div>
  </div>
  </center>

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
    a.download = 'All Personnel_' + postfix + '.xls';
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
