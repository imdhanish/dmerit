
<?php
error_reporting(0);
include 'babua12.php';
session_start();
$h=$_SESSION['user'];//if we entered email first time to start new session or resume session for existing email
$t=mysql_query("SELECT name,email from xyz where email='$h'");
$row=mysql_fetch_assoc($t);
$n=$row['name'];
$p=mysql_query("SELECT NAME,AGE,PETNAME,SPORTS,EMAIL from details where EMAIL='$h'");
$row1=mysql_fetch_assoc($p);
$a=$row1['AGE'];
$pet=$row1['PETNAME'];
$s=$row1['SPORTS'];

 echo "<h2>Hii</h2> ".$n;


$sql=mysql_query("SELECT NAME,AGE,PETNAME,SPORTS,EMAIL from details where EMAIL='$h'");
while($row = mysql_fetch_assoc($sql))
{
$maximumPoints  = 100;
$point = 0;
 
if($row['NAME'] != null)
$point+=20;

if($row['EMAIL'] != null)
$point+=20;

if($row['AGE'] != null)
$point+=20;

if($row['PETNAME'] != null)
$point+=20;

if($row['SPORTS'] != null)
$point+=20;

 }

$percentage = ($point*$maximumPoints)/100;
echo "--Your profile is--".$percentage."%"."completed";






if(isset($_POST['Enter']))
{
 $name=$_POST['naam'];
 $email=$_POST['e'];
 //$email=echo "".'$email1';
 $age=$_POST['age'];
 $pet=$_POST['petname'];
 $sports=$_POST['sports'];
 //$q=mysql_query("select email from xyz where email='$email'");//for email already exist
 //$r=mysql_num_rows($q);
 //if($r==0)
 //{
 //if($pass==$confpass)
		//{
			//$p=mysql_query("INSERT INTO details(EMAIL) select email from xyz where email='$email'");
			$query=mysql_query("INSERT INTO details(NAME,AGE,PETNAME,SPORTS,EMAIL) values('$name','$age','$pet','$sports','$email')")or die(mysql_error());
			
			if($query)
			{
				//$t=mysql_query("INSERT INTO details(EMAIL) values('$EMAIL')")or die(mysql_error());
			  echo "success";
			  header("Refresh:1;url=name.php");
			  
			}
            else
			{
			 echo "fail";
			}
		}
		//}
		//else
		//{
			//echo "email exist";
		//}
		//else //{
			//echo "fuck''''";
		//}
else if(isset($_POST['update']))
{
	$udage=$_POST['age'];
    $udpet=$_POST['petname'];
    $udsports=$_POST['sports'];
	$update=mysql_query("UPDATE details SET AGE='$udage' , PETNAME='$udpet' , SPORTS='$udsports' where EMAIL='$h'");
	if($update)
	{
		echo "--your details are updated successfully";
		header("Refresh:1;url=name.php");
	}
	else 
		echo "not updated";
		
}
else if(isset($_POST['logout']))
{  
   	//echo "thanks to be a part of d_merit";
	
	header("Location:myfirstwebpage.php");
	//echo "thanks to be a part of d_merit";
}
else if(isset($_POST['upload']))
	{ echo $h;
		
		$mypic=$_FILES['upload']['name'];
		$temp=$_FILES['upload']['tmp_name'];
		$type=$_FILES['upload']['type'];
		if(($type=="image/jpeg")||($type=="image/jpg")||($type=="image/bmp"))
		{
			$photo=mysql_query("UPDATE details set PICPATH='$mypic' where EMAIL='$h'")or die(mysql_error());
			$dir="./profiles/$h/images";//ye bahut important hai
			mkdir($dir,0777,true);
			move_uploaded_file($temp,"./profiles/$h/images/$mypic");
			echo "<img src='profiles/$h/images/$mypic'>"."successfully uploaded";
		
			
			
		}
		else 
			echo "your pic is larger than 5 mb";
	}
		
	
	


		
?>







<!DOCTYPE html>
<html>
<head>
<h1 style="text-size:50px">......d_merit.....</br> welcomes you</h1>
<h2>Enter your details:-</h2>
<style>
th {
font-size:40px;
color:red;
}

h1{
	font-family:Helvetica;
	color:black;
	font-size:60px;
	width:100%;
    margin:0px;
	top:0px;
	text-align:center;
    background-color:rgba(255,255,255,0.6);
}
body {
	font-family: Arial, Helvetica, sans-serif;
	}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=email], select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=number]{
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
input[type=submit]:hover {
    background-color: #45a049;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=button] {
    background-color:red;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
h2{
	
	color:green;
}


</style>

</head>
<body>
<div class="container">
<form ENCTYPE ="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
choose your profile picture <input type="file" name="upload"></br>
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
Email<input type="email" name="e" value="<?php echo $h;?>"/>
<button value="upload" name="upload" >Upload</button>
<div>Full Name<input type="text" name="naam" value="<?php echo $n;?>"/></div>
Enter your pet name<input type="text" name="petname" value=" <?php echo $pet;?>"/>
Age <input type="number" name="age" value="<?php echo $a;?>"/><br>
SPORTS<input type="text" name="sports" value="<?php echo $s;?>"/>

	<br>
	 <input type="submit" name="Enter" value="Submit"/>
	 <input type="submit" name="update" value="Update your Details"/>
	 
	 
	 
<div id="button1">	 <input type="submit" name="logout" onclick="return confirm('Are you sure to logout')" value="Logout"> 
</div>


</div>


</body>
</html>
