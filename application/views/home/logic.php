<?php 
	$con=mysqli_connect('localhost','root','','confoundingsolutions');
	if($_POST['action']=='enquiry'):
	$name=$_POST['name'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$query="insert into enquiry (name,mobno,email,message) values('$name','$mobno','$email','$message')";
	$fire=mysqli_query($con,$query);
	if($fire)
	{
		$to="confoundingsolutions@gmail.com";
		$headers = "From: $name<$email> ";
		$subject='New Enquiry';
		$comment="Name: $name\n\n Email: $email \n\n Mobile Number: $mobno \n\n Message: $message";
		if(@mail($to, $subject, $comment, $headers))
		{
			//echo "<script>alert('Thank You for Enquiry. We will contact you soon.');window.location.href='index.php';</script>";
			echo $res="Thank You for Your Enquiry. We'll contact you soon.";
		}
		echo $res="Thank You for Your Enquiry. We'll contact you soon.";
	}
	else
	{
		echo $res="Something went wrong. Try again later";
	}
endif;
?>