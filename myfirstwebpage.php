<?php
session_start();
include 'babua12.php';
if(isset($_POST['register']))//on clicking signup
{
 $name=$_POST['name'];
 $email=$_POST['email'];
 $pass=$_POST['password1'];
 $confpass=$_POST['confpassword'];
 $q=mysql_query("select email from xyz where email='$email'");//for email already exist
 $r=mysql_num_rows($q);
 if($r==0)
 {
 if($pass==$confpass)
		{
			$query=mysql_query("INSERT INTO xyz(name,email,password,confpassword) values('$name','$email','$pass','$confpass')")or die(mysql_error());
			
			if($query)
			{
			
			  echo "success";
			}
            else
			{
			 echo "fail";
			}
		}
 else
 {
		echo "password same nhi hai";
 }
 }
 else
	 echo "email already exist";
}









else if(isset($_POST['submit']))
{
	$email=$_SESSION['user']=$_POST['email1'];
	$password2=$_SESSION['pass']=$_POST['password'];
	
	$q=mysql_query("select email,password from xyz where email='$email'");
	$r=mysql_num_rows($q);
	if($r==1)
	{
		$row=mysql_fetch_assoc($q);
		$email=$row['email'];
		$name=$row['name'];
		$pass2=$row['password'];
		
		if($password2==$pass2)
		{
			header("Location:name.php");
			//$p=mysql_query("select * from details where  ");
			
				
			//$_SESSION['flag']=1;
		}
		echo "wrong password";
		//$_SESSION['flag']=0;
	}
	else
	{
		echo "email not registered";
	}
}
?>











<!DOCTYPE html>
<html>
<head>
<title>d_merit.com</title>
<h1 style="text-size:50px;">.......d_merit......</h1></br>
<style>
<!body{

	background-image:url(Wallpaper.jpg);
	
	}>

h2{
	top:130px;
	color:green;
	font-size:200%;
	}
h2:hover{
		color:yellow;
        }

	
h3{
   color:yellow;
   font-size:200%;
   }

p{
	border-radius:15px;
		   border:2px dotted black;
		   text-indent:40px;
		   color:rgb(,125,126);
		   font-family:Helvetica;
	}
	
h1:hover{
		  
		   border-radius:15px;
		   color:rgba(00,33,33,03);
		   }
li:hover{
			color:red;
			
		}
		
h1{
	font-family:Helvetica;
	color:black;
	font-size:100px;
	width:100%;
    margin:0px;
	top:0px;
	text-align:center;
	background-color:rgba(255,255,255,0.3);
}
body{
	background-color:Lightgreen;
}
#form{
color:orange;
	padding:20px;
	padding-left:60px;
	padding-right:60px;
	padding-bottom:20px;
    text-align:left;
	font-family:Calibri;
	border-radius:10px;
	background-color:rgba(0,0,0,0.5);
	position:absolute;
	left:100px;
	top:220px;
}
ul{
	position:absolute;
	top:140px;
	left:760px;
	width:100%;
	margin:0px;
	
}
li{
		
	  display:inline;
	  border:2px solid orange;
	  border-radius:4px;
	  padding:5px;
	  padding-left:100px;
	  padding-right:28px;
	  font-family:"Gunplay";
	  background:red;
list-style:none;
		   }
li:hover{
	background:yellow;
	border:2px solid rgb(255,179,128);
	  border-radius:8px;
}
#form1{
color:orange;
	padding:20px;
	padding-left:60px;
	padding-right:60px;
	padding-bottom:20px;
text-align:left;
	font-family:Calibri;
	border-radius:10px;
	background-color:rgba(0,0,0,0.6);
	position:absolute;
	left:800px;
	top:220px;
}
#footer_c {
    border:5px solid #666;
    top:700px;
    
    height:250px;
    left:0;
	position:absolute;
    width:100%;
}
#footer {

    line-height:50px;
    margin:0 auto;
    width:940px;
	font-family:"Gunplay";
    color:black;
    text-align:center;

}
table{
	top:400px;
	left:220px;
	}
#description{
font-family:"Gunplay";
   top:600px;
   below:form1;
   position:absolute;
   }
</style>
</head>
<body  style="background-image:url('fuck.jpg')";>



<marquee><h2>let's begin from here.....</h2></marquee></br>
<nav>
  <ul>
    <li><a href="myfirstwebpage.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="#">Signup</a></li>
  </ul>
</nav>

<div id="form">
 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
             <h3>LOG IN</h3>
             <div id="use">EMAIL:<input type="text"  name="email1" style="width:180px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;"  required value="" placeholder="Email" /></div><br/>
			 <div id="pass">PASSWORD:<input type="password"  name="password" style="width:175px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;"  required value="" placeholder="********" /></div><br/>
			 <input class="hoverable" type="SUBMIT" name="submit" value="SUBMIT"  />
             
 </form></div>
 <div id="form1">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
             <h3>SIGN UP</h3>
			 <div id="name">NAME:<input type="text" autofocus name="name"   style="width:165px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;" required value="" placeholder="Name" /></div><br/>
            			 <div id="email1">EMAIL:<input type="email" name="email"  style="width:200px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;" required value="" placeholder="Email" /></div><br/>
			 <div id="pass">PASSWORD:<input type="password" name="password1"  style="width:160px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;" required  value="" placeholder="*******" title="use only a-z,0-9,@,and& " 
             maxlength="12"		 /></div><br/>
			 <div id="confirm">CONFIRM PASSWORD:<input type="password" name="confpassword" style="width:160px;background:rgb(255,179,128);border:2px solid rgb(255,179,128);border-radius:5px;" required value="" placeholder="*******"/></div><br/>
			 <div id="male">Male:<input type="radio"  name="gender" value="male"/></div>
			 <div id="female">Female:<input type="radio" name="gender" value="female"/><br/></div>
			 <input class="hoverable"  type="submit" name="register" value="REGISTER"/>
			 <input type="reset" name="Reset"/>
</form>
</div>

<div id="description">
QUOTES:-<p>The most difficult thing is the decision to act, the rest is merely tenacity. The fears are paper tigers. You can do anything you decide to do. You can act to change and control your life; and the procedure, the process is its own reward.
--Amelia Earhart</br>
If you cannot do great things, do small things in a great way.
--Napoleon Hill</p>
</div>


<div id="footer_c">

    <div id="footer">

        <div id="cat">
		<p>
		designed by<br/>Dhanish kumar<br/>INFORMATION TECHNOLOGY<br/>CUSAT, KERALA
		</p>

    </div>

</div>




</body>

</html>