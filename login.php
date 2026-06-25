<?php
session_start();
$file="counter.txt";
if(!file_exists($file)) file_put_contents($file,"0");

$result=null;
if($_SERVER['REQUEST_METHOD']=="POST"){
 if(!isset($_SESSION['counted'])){
   $c=(int)file_get_contents($file);
   file_put_contents($file,$c+1);
   $_SESSION['counted']=1;
 }
 function n($v){return (float)str_replace([",","."],"",$v);}
 $luong=n($_POST['luong']);
 $nn=n($_POST['nn']);
 $ct=(float)$_POST['ct'];
 $spa=n($_POST['spa']);
 $tl=(float)$_POST['tl'];
 $attendance=250000;
 $luongMoi=$luong+$nn+$luong*$ct/100;
 $tong=$luongMoi+$spa;
 $thuong=$tong*$tl/100;
 $thuc=$thuong+$attendance;
 $result=compact("luongMoi","tong","thuong","attendance","thuc","tl");
}
?>
<!doctype html><html><head><meta charset="utf-8">
<link rel="stylesheet" href="assets/style.css">
<title>Tính thưởng Tết</title></head><body>
<div class="box">
<h2>TÍNH THƯỞNG TẾT</h2>
<form method="post">
<input name="luong" placeholder="Lương cơ bản" required>
<input name="nn" placeholder="Tăng lương nhà nước" value="0">
<input name="ct" placeholder="Tăng lương công ty (%)" value="0">
<input name="spa" placeholder="PCHTSX (SPA)" value="0">
<select name="tl">
<option>150</option><option>135</option><option>120</option>
<option>105</option><option>90</option><option>75</option>
</select>
<button>TÍNH THƯỞNG</button>
</form>
<?php if($result){ ?>
<hr>
<p>Tổng lương: <?=number_format($tong)?></p>
<p>Tỷ lệ: <?=$tl?>%</p>
<p>Tiền thưởng: <?=number_format($thuong)?></p>
<p>Chuyên cần: <?=number_format($attendance)?></p>
<h3>Thực lãnh: <?=number_format($thuc)?> đ</h3>
<button onclick="window.print()">In</button>
<?php } ?>
</div>
</body></html>
