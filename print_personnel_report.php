<link rel="stylesheet" type="text/css" href="css/style1.css">
<center>
    <div class="backk" style="float: left; margin-left: 120px;">
        <button><a href="individual_report.php">Back</a></button>
    </div>
    <div class="filterss" style="float: right; margin-right: 120px;" onload="refresh();">
        <button onclick="printContent('print')" id = "hit" style="float: right;">Print Report</button>
        <input id="btnExport" type="button" value="Export to Excel" style="float: right; margin-top: 30px; margin-right: -86px;">
        
    </div>
    <div ng-app="myApp" ng-controller="myCtrl">
        <div class="prepared-form" style="border: 1px solid; width: 30%; margin-right: 480px;">
            <i>Note: Hãy điền đầy đủ thông tin .</i>
            <br><br>
            <table>
            <tr>
                <td>Người soạn :</td>
                <td><input ng-model="firstname" placeholder="" class="form-control"></td>
            </tr>
            <tr>
                <td>Chức vụ :</td>
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
            <center><strong>Viện Công Nghệ Thông Tin & Truyền Thông</strong></center>
            <center>Phòng 504 - Nhà B1 - Đại học BKHN</center>
            <center>Liên hệ: (+84) 4 3869 2463</center>
            <br />
            <center>HỒ SƠ CÁ NHÂN</center>
            <center> <?php echo date('F Y'); ?></center>
        </div>
        <br />
        <br />
        <br />
        <br />
            <style>
	table {
			width: 70%;
			text-align: center;
		}
		td {
			padding:10px;
		}
	</style>
	<?php
	include ("connect.php");
	$result=$con->prepare("SELECT * FROM tbl_personnel LEFT JOIN tbl_department ON tbl_personnel.dept_id = tbl_department.dept_id WHERE per_id='{$_GET['per_id']}'");
	$result->execute();
	$fetch = $result->fetchall(); 

	foreach ($fetch as $key => $row) {
		$per_id = $row['per_id'];
		$pos_id = $row['pos_id'];
		$dept_id = $row['dept_id'];
		$dept_name = $row['dept_name'];

	 $bday = $row["per_date_of_birth"];
	 $date = new DateTime($bday);
	 $now = new DateTime();
	 $difference = $date->diff($now)->format('%y');
	?>
            <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
                <tr>
                    <td colspan = "4" class = "page-header"> <b>HỒ SƠ</b></td>	
		</tr>
		<tr>
                    <td colspan="4">
                        
                        <b>Họ tên</b>
                        <br>
			<label><?php echo $row['per_lastname']." ".$row['per_middlename']." ".$row['per_firstname']; ?></label>
					
			</td>
			
		</tr>
			<tr>
                            <td colspan="2">Ngày sinh <br>
                            <label><?php echo $row['per_date_of_birth']; ?></label>
					
			</td >
			<td colspan = "2">
			<label><?php echo $row['per_address']; ?></label>
			<br>
                        <b>Địa chỉ</b>
			</td>
		</tr>
		<tr>
                    <td colspan = "2"><b>Nơi sinh</b> <br>
			<label><?php echo $row['per_place_of_birth']; ?></label>
			
                    </td>>
                        <td colspan="2">
                            <b>Số điện thoại</b> <br>
                            <label><?php echo $row['per_contact_no']; ?></label>
		
			</td>
		</tr>
		<tr>
                    <td colspan="2">
                        <b>Giới tính</b><br>
                            <label><?php echo $row['per_gender']; ?></label>
					
			</td>
                        <td colspan="2"><b>Tình trạng hôn nhân</b> <br>
                            <label><?php echo $row['per_status']; ?></label>
	 		
			</td>
		</tr>
		
		<tr>
			
                    <td colspan="2"><b>Chức vụ</b> <br>
			<?php
			$result1=$con->prepare("SELECT * FROM tbl_personnel LEFT JOIN tbl_gass_rank ON tbl_personnel.gass_id = tbl_gass_rank.gass_id WHERE per_id='{$_GET['per_id']}'");
                        $result1->execute();
                        $fetch1 = $result1->fetchall();
                        foreach($fetch1 as $key => $row1) { 
                        ?>
			<label><?php echo $row1['gass_name']; ?></label>
                        <?php } ?>	
		
			</td>
                        <td><b>Trình độ</b><br>
			<?php
			$result1=$con->prepare("SELECT * FROM tbl_personnel LEFT JOIN tbl_academic_rank ON tbl_personnel.rank_id = tbl_academic_rank.rank_id WHERE per_id='{$_GET['per_id']}'");
                        $result1->execute();
                        $fetch1 = $result1->fetchall();
                        foreach($fetch1 as $key => $row1) { 
                        ?>
			<label><?php echo $row1['rank_name']; ?></label>
                        <?php } ?>	
			</td>
                        <td>
                            <b>Ngày bổ nhiệm</b><br>
                            <label><?php echo $row['per_date_of_original_appointment']; ?></label>		
			</td>
			
		</tr>
		
		<tr>
			<td colspan = "4" class = "page-header">TRÌNH ĐỘ ĐÃ ĐẠT</label>
		</tr>
		<tr>
			<td>
                            <b>Bằng cử nhân</b><br>
                            <label><?php echo $row['bs_name']; ?></label>	
			</td>
			<td>
                            <b>Năm nhận</b><br>
                            <label><?php echo $row['bs_year']; ?></label>	
			</td>
			<td colspan = "2">
                            <b>Tại trường</b><br>
                            <label><?php echo $row['bs_school']; ?></label>	
			</td>
		</tr>
		<tr>
			<td>
                            <b>Bằng thạc sĩ</b><br><label><?php echo $row['ms_name']; ?></label>	
			</td>
			<td>
                            <b>Năm nhận</b><br>
                            <label><?php echo $row['ms_year']; ?></label>	
			</td>
			<td colspan = "2">
                            <b>Tại trường</b><br>
                            <label><?php echo $row['ms_school']; ?></label>	
			</td>
		</tr>
		<tr>
			<td>
                            <b>Bằng tiến sĩ</b><br>
                            <label><?php echo $row['dr_name']; ?></label>		
			</td>
			<td>
                            <b>Năm nhận</b><br>
                            <label><?php echo $row['dr_year']; ?></label>	
			</td>
			<td colspan = "2">
                            <b>Tại trường</b><br>
                            <label><?php echo $row['dr_school']; ?></label>	
			</td>
		</tr>
	</table>
	<?php } ?>
                <br><br><br>
                <div class="noted">
                    <label><b>Người soạn:</b></label>
                    <br>
                    <br>
                    <label style="text-transform: uppercase;"><strong>{{firstname}}</strong></label>
                    <br>
                    <label style="text-transform: capitalize;">{{position}}</label>
                    <br><br><br>
                    <label><b>Người xác nhận:</b></label>
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
    a.download = 'Individual Report_' + postfix + '.xls';
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
