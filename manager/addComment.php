<!DOCTYPE html>
<html>

<?php



?>

<body>
<!-- 登陆表单 -->
<h4 class="modal-title" id="myModalLabel">AddPost</h4>

<form action="Mainpage.php" method="post" accept-charset="utf-8" class="form-horizontal">
    <div class="modal-body">

        <div class="form-group">
            <label for="title" class="col-sm-4 control-label">PostID:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="postid" id="email" placeholder="title" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-4 control-label">Comment:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="comment" placeholder="message"  required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="com" style="display: none" placeholder="" value="1">
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Close</button> -->
        <input type="reset" class="btn btn-warning" value ="reset" />
        <button type="submit" class="btn btn-primary" name="login" onclick="">Publish</button>
    </div>
</form>

</body>
</html>