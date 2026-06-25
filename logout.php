<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
 if($_POST['u']=="admin" && $_POST['p']=="123456"){
   $_SESSION['admin']=1; header("Location: admin.php"); exit;
 }
 $e="Sai tài khoản";
}
?><form method=post>
<h2>Đăng nhập Admin</h2>
<input name=u placeholder=Tài khoản><input type=password name=p placeholder=Mật khẩu>
<button>Đăng nhập</button>
<?php if(isset($e)) echo $e; ?>
</form>