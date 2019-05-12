<a class="btn btn-success" href="#edit<?php echo $row['rank_id']?>" data-toggle="modal">
    <span class = "glyphicon glyphicon-pencil" aria-hidden = "true">Edit</span>
</a> 
<span> <button class="btn btn-danger btn-sm remove" onclick="return deleletconfig()">Delete</button></span>
<script>
function deleletconfig(){

var del=confirm("Are you sure you want to delete this record?");
if (del==true){
    window.location.href="delete_rank.php?rank_id=<?php echo $row['rank_id']?>";
}
return del;
}
</script>
<!-- Modal -->
<div class="modal fade" id="edit<?php echo $row['rank_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <!-- Modal content-->
        <div class="modal-content">
            <div class = "panel panel-primary">
                <div class = "panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>UPDATE </h4>
                </div>
            </div>
            <div class="modal-body">          
                <form action="edit_rank_query.php" method="POST">
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">
                    Tên học vị:
                    </span>
                    <div class="form-line">
                        <input type="hidden" class="form-control" name="rank_id" value="<?php echo $row['rank_id']?>">
                        <input type="text" class="form-control" name="rank_name" value="<?php echo $row['rank_name'] ?>" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-lg" name = "update">Update</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>


