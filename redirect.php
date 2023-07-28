
<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
         //DR
      	if ($_SESSION['role'] == 'DR'){
			header("Location: pages/DR.php");
      	 }
		 //HOD
		 else if ($_SESSION['role'] == 'HOD'){ 
			header("Location: pages/hod-login.php");
      	} 
		//student
		  else if ($_SESSION['role'] == 'Student'){ 
			header("Location: pages/student-login.php");	
		}
		//Dean
		else if ($_SESSION['role'] == 'Dean'){ 
			header("Location: pages/Dean-login.php");
		}
		//LEcturer
		else if ($_SESSION['role'] == 'Lecturer'){ 
			header("Location: pages/lecturer-login.php");
		}
 }
else{
	header("Location:index.php");
} ?>
