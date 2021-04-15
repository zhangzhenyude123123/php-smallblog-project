<!DOCTYPE html>
<html>
<?php
    require_once 'head.php';
?>

<body>
<!-- 登陆表单 -->
    <h4 class="modal-title" id="myModalLabel">Login</h4>

    <form action="manager/SimpleUserManager.php" method="post" accept-charset="utf-8" class="form-horizontal">
    <div class="modal-body">

        <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Email:</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
        </div>
        </div>

        <div class="form-group">
        <label for="password" class="col-sm-4 control-label">Password:</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password" placeholder="password" minlength="6" maxlength="20" required="">
        </div>
        </div>

        <div class="form-group">
        <label for="password" class="col-sm-4 control-label">Remember Me:</label>
        <div class="col-sm-3">
            <label class="checkbox-inline">
            <input type="radio" name="rem" id="yes" value="1" checked> Yes
            </label>
            <label class="checkbox-inline">
            <input type="radio" name="rem" id="optionsRadios4" value="0"> No
            </label>
        </div>
        </div>

        
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Close</button> -->
        <input type="reset" class="btn btn-warning" value ="reset" />
        <button type="submit" class="btn btn-primary" name="login">Login</button>
    </div>
    </form>
    
</body>
</html>
