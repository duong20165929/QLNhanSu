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
                                <h4>Danh sách nhân viên</h4>
                                <a href="add_personnel.php">
                                    <input type="button" value="Thêm nhân viên" class="print btn-default" style="margin-right: 80px; width: auto;">
                                </a>
                                <a href=#>
                                    <input type="button" value="In" class="print">
                                </a>
                            </div>
                        </div>
                        <div id="print">
                            <div class = "scroll">
                            <div class="body">
                                <table id = "example" class = "stripe" cellspacing = "0" >
                                <thead>
                                    <tr>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                                           
                                     
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
         </div>
    </div>
</section>

   
<?php 
include("script.php");
?>