<?php

header("Content-Type:application/json;charset=utf-8");
$conn=mysqli_connect("127.0.0.1","root","","dr","3306");
$u=$_REQUEST["uname"];
$p=$_REQUEST["upwd"];
$uPattern='/[a-zA-Z0-9]{3,12}/';
$pPattern='/[a-zA-Z0-9]{3,12}/';
if(!preg_match($uPattern,$u)){
	echo'{"code":-2,"msg":"用户格式错误"}';
	exit;
}
if(!preg_match($pPattern,$p)){
echo'{"code":-2,"msg":"密码格式错误"}';
	exit;
}
$sql="SELECT*FROM dr_user";
$sql.=" WHERE uname='$u'";
$sql.=" AND upwd='$p'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row==null){
	echo'{"code":-1,"msg":"用户名或密码错误"}';
}else{
echo'{"code":1,"msg":"登录成功"}';
}