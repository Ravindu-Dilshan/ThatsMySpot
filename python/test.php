<?php
if (isset($_POST["run"])){
//exec('c:\WINDOWS\system32\cmd.exe /c START  C:/xampp/htdocs/ThatsMySpotWeb/python/run.bat');
$command = escapeshellcmd('Forecasting.py');
$output = shell_exec($command);
//echo $output;
}
echo "damn";
?>

<html>
<body>

<form action="test.php" method="post">
<input type="submit" name="run">
</form>
<div style="margin 0 auto">
<img src="1.jpg" alt="Normal" style="width:1500px;height:800px;"> </br>
<img src="2.jpg" alt="Leveled" style="width:1500px;height:800px;"> </br>
<img src="3.jpg" alt="Predict" style="width:1500px;height:800px;"> </br>
</div>
</body>
</html> 