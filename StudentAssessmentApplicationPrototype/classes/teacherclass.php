<?php
class teacher{
	var $dbobj;
	function teacher(){
		$this->dbobj=new database();
	}
	function checkToStartSession($post){
		@extract($post);
		if(isset($_POST['teacher_name'])&&isset($_POST['teacher_pass'])){
			$tname = $_POST['teacher_name'];
			$tpass = $_POST['teacher_pass'];
			$sql = "SELECT * FROM teacherinfo WHERE teacher_name = '$tname' AND teacher_pass = '$tpass'";
			$result = $this->dbobj->query($sql);
			$row = $this->dbobj->fetch();
			$tid = $row['tid'];
			$this->sessionStart($tid,$tname);
		}
	}
	function sessionStart($id,$username){
		session_start();
		$_SESSION['id']=$id;
		$_SESSION['username']=$username;
		//header("location:../signupform.php");
	}
	
	function teacherSessionDestroy(){
		session_start();
		session_destroy();
		header("location:../main/teacherlogin.php");
	}
}
?>