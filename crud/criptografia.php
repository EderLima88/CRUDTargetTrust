<?php
$senha = '123456';
$senha_cripto = base64_encode($senha);

echo($senha);
echo('<br>');
echo($senha_cripto);

echo('<br>');

echo(base64_decode($senha_cripto));

echo('<br>');

echo(md5($senha));
//123 - 202cb962ac59075b964b07152d234b70
//123456 - e10adc3949ba59abbe56e057f20f883e


?>