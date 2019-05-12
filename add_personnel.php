<?php include("header.php") ?>

    <link href="css/style2.css" rel="stylesheet">
    <section class="content">
        <div class="container-fluid">
               <!-- Input Group -->
        <form action="add_personnel_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h4>THÔNG TIN NHÂN SỰ</h4>
                            </div>
                        </div>
                        <div class="body">
                        <div  class="container-fluid" style="background-color: #ddd;">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Họ:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="per_lastname" placeholder="Họ">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tên đệm:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="per_middlename" placeholder="Tên đệm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tên:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="per_firstname" placeholder="Tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Giới tính:
                                            </span>
                                                <select class="form-control show-tick" name="per_gender">
                                                    <option></option>
                                                    <option>Nam</option>
                                                    <option>Nữ</option>
                                                </select>
                                        </div>

                                    </div>
                                      <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tình trạng hôn nhân:
                                            </span>
                                                <select class="form-control show-tick" name="per_status">
                                                    <option></option>
                                                    <option>Độc thân</option>
                                                    <option>Đã kết hôn</option>
                                                    <option>Góa</option>
                                                    <option>Đã ly hôn</option>
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Địa chỉ:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="per_address" placeholder="Nơi ở hiện tại">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Nơi sinh:
                                            </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_place_of_birth" placeholder="Nơi sinh">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                Ngày sinh:
                                            </span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" name="per_date_of_birth" placeholder="Ngày sinh">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Trường tốt nghiệp:
                                            </span>
                                                <select class="form-control show-tick" name="dept_id"> 
                                                <option></option>
                                                <?php
                                                include("connect.php"); 
                                                $department = $con->prepare("SELECT * FROM tbl_department ORDER BY dept_id");
                                                $department->execute();
                                                while($row1 = $department->fetch()) {
                                                        $dept_name = $row1['dept_name'];
                                                ?>
                                                    <option value="<?php echo $row1['dept_id']; ?>"><?php echo $row1['dept_name']; ?></option>
                                                <?php } ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Trình độ học vấn:
                                            </span>
                                                <select class="form-control show-tick" name="rank_name">
                                                <option></option>
                                                     <?php
                                                include("connect.php"); 
                                                $faculty_rank = $con->prepare("SELECT * FROM tbl_academic_rank ORDER BY rank_id");
                                                $faculty_rank ->execute();
                                                while($row102 = $faculty_rank->fetch()) {
                                                        $rank_name = $row102['rank_name'];
                                                ?>
                                                    <option value="<?php echo $row102['rank_id']; ?>"><?php echo $row102['rank_name']; ?></option>
                                                <?php } ?>
                                                </select>                   
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Chức vụ:
                                            </span>
                                                <select class="form-control show-tick" name="gass_name">
                                                <option></option>
                                                     <?php
                                                include("connect.php"); 
                                                $faculty1_rank = $con->prepare("SELECT * FROM tbl_gass_rank ORDER BY gass_id");
                                                $faculty1_rank ->execute();
                                                while($row101 = $faculty1_rank->fetch()) {
                                                        $gass_name = $row101['gass_name'];
                                                ?>
                                                    <option value="<?php echo $row101['gass_id']; ?>"><?php echo $row101['gass_name']; ?></option>
                                                <?php } ?>
                                                </select>                   
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Trạng thái công việc:
                                            </span>
                                                <select class="form-control show-tick main" id = "privileges" name="per_employee_status">
                                                    <option></option>
                                                    <option value='Biên chế'>Biên chế</option>
                                                    <option value='Hợp đồng'>Hợp đồng</option>
                                                </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Bộ môn:
                                            </span>
                                                <select class="form-control show-tick" name="per_campus">
                                                    <option></option>
                                                    <option>Công nghệ phần mêm</option>
                                                    <option>Hệ thống thông tin</option>
                                                    <option>Khoa học máy tính</option>
                                                    <option>Kĩ thuật máy tính</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            Ngày bổ nhiệm:
                                            </span>
                                                <div id="sandbox-container" class="form-line">
                                                    <input type="Date" class="form-control" name="per_date_of_original_appointment">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                    Số điện thoại:
                                            </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="per_contact_no" id="contact_no" maxlength="22">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="page-header">Trình độ đã đạt</h3> 
                                    </div>                
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Bằng cử nhân:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bs_name" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Năm nhận :
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bs_year" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tại trường :
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bs_school" placeholder="School">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Bằng thạc sĩ:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="ms_name" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Ngành:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="ms_with_unit" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Năm nhận:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="ms_year" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tại trường:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="ms_school" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Bằng tiến sĩ:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dr_name" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Ngành:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dr_with_unit" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Năm nhận:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dr_year" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tại trường:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dr_school" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Bằng khác:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="other_degree" placeholder="">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Năm nhận:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="other_year" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                Tại trường:
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="other_school" placeholder="">
                                            </div>
                                        </div>
                                    </div>                             
                                </div>  
                                    <input type="submit" name="save" value="SAVE" class="btn btn-success" style ="float:right; margin-top: -30px;">                   
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>

        </form>           
        </div>
    </section>
<script src="plugins/js/formatter.js"></script>
<script src="js/jquery.min.js"></script>
  <?php include("script.php"); ?>
    <script>
    var contanct_no = new Formatter (document.getElementById('contact_no'), {
  'pattern': '+84{{999}}-{{999}}-{{999}}',
  'persistent': true
  });
</script>
    <script>
        function showImage(src,target) {
          var fr=new FileReader();
          // when image is loaded, set the src of the image where you want to display it
          fr.onload = function(e) { target.src = this.result; };
          src.addEventListener("change",function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
          });
        }

        var src = document.getElementById("src");
        var target = document.getElementById("target");
        showImage(src,target);
    </script>
    
<script type="">
    $(function(){
  
  $("select.main").on("change", function(){
    //remove active
    $("select.models.active").removeClass("active");
    //check if select vlass exists..if it does show it
    var subList = $("select.models."+$(this).val());
    if (subList.length){
      //it does! show it by adding active class to it
      subList.addClass("active");
    }
  });
  
});
</script>
<script type="">
    var Privileges = jQuery('#privileges');
    var select = this.value;
    Privileges.change(function () {
        if ($(this).val() == '') {
            $('.resources').show();
        }
        else $('.resources').hide();
    });
</script>