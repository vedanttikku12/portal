<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../includes/initialize.php");
if(isset($_POST['login-submit']))
{
$uid= $_POST['id'];
$pwd= $_POST['password'];

$con = mysqli_connect('localhost','root','','portal');
	if($con)
	{   echo "successfully connected";
	}
	//mysql_select_db('debate',$connect);
		$message = "Incorrect Password";
		$sql = "select * from user where user_id='$uid' and password='$pwd'";
		$result=  mysqli_query($con,$sql);
		
		if(($count=  mysqli_num_rows($result))==0)
		{
			echo "<script>
			alert('Incorrect Password');
			</script>";
                        //http_redirect();
		header("Location:../login.php");
		}
		$r=  mysqli_fetch_array($result);
		if($count==1){
			$_SESSION['user_id']=$r[0];
			$_SESSION['username']=$r[1];
			$_SESSION['password']=$r[2];
			$_SESSION['name']=$r[3];
			$_SESSION['role']=$r[4];
			
		$_SESSION['log'] = true;
		
                //header("Location: ../homepage.php");
		if($_SESSION['role']=="admin"){
		header("location:../homepage.php");
		}
		elseif($_SESSION['student']=="student")
		{
			header("location:../homepage.php");
		}
		else
		{
			header("location:../homepage.php");
		}
	}
		
}

