<?php
	require_once('student/auth.php');
	$id=$_SESSION['SESS_MEMBER_ID'];
	
	$leo = date("Y");
?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Transcript</title>
<style type="text/css">
<!--
.style3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.style4 {font-size: 12}
.style5 {
	font-family: "Courier New", Courier, monospace;
	font-style: italic;
	
}
#container {width:60%; height:auto; background-color:#999999; padding:70px;
			margin:auto; border:thick; border-color:#FF0000; border-style:groove;
			}
-->
</style>


</head>
<body>


<div id="container">

<TABLE bgcolor=#f0f0f0 border=0 cellSpacing=0
cellPadding=0 width=140 align=center>
<TR>
<TD height=100 width="25%"></TD>
<TD height=100 width="50%"><img border="0" alt="" src="images/UoE.jpg" width=492
height=100></TD>
<TD height=100 width="25%"></TD>
</TR></TABLE>
<table bgcolor="#3300CC" cellspacing="0" cellpadding="0" width="140" align="center">
<tr>
	<P align="center" class="style5"> <span class="style4">TRANSCRIPT CERTIFICAT</span>E</P>
</tr>
<tr>
	<pre><strong> THE STUDENT NAMED BELOW WAS AWARDED THE FOLLOWING GRADE(S) AS SHOWN BELOW 	</strong></pre>
</tr>
<tr>

<?php
 include('db.php');
							$result = mysql_query("SELECT * FROM student where id='$id'");
							
 echo "<table>";
 while($row = mysql_fetch_array($result))
          {
          echo "<tr><td>STUDENT NAME: </td><td>" . $row['firstname'] . "  ". $row['middlename']. "  " .$row['lastname']."</td></tr>"; 
		  echo "<tr><td>REGISTRATION NUMBER: </td><td>" . $row['refnumber'] . "</td></tr>";
		  echo "<tr><td>ACADEMIC YEAR: </td><td>" . $leo . "</td></tr>";
		  
		  $result2 = mysql_query("select * from courses, student where courses.course_code = student.course and student.id='$id'") or die(mysql_error());
		  
		  while($row2 = mysql_fetch_array($result2))
		  {
		  echo "<tr><td>COURSE: </td><td>" . $row2['course_description'] . "</td></tr>";}
		  
          }
 echo "</table>";
 
?>
   
	

</tr>

	
 
 </table>
<p>
<pre>



<strong><font size="+5">
Marks Attained: <?php $result3 = mysql_query("select * from student where student.id='$id'") or die(mysql_error());
		  
		  while($row3 = mysql_fetch_array($result3))
		  {
		  echo  $row3['score'];}
		  			
						  
		            
?>

Grade Attained: <?php 
$grade = mysql_query("select score from student where student.id='$id'") or die(mysql_error());
		while($total = mysql_fetch_array($grade))
		{
		     
		if($total['score'] >=70)
		{
				echo "A";
		
		} 
		
		elseif($total['score'] >=60)
				{	
		echo "B";		
		}
		elseif($total['score'] >=50)
				{
				echo "C";		
		}		
		elseif($total['score'] >= 40)		
		{
				echo "D";		
		}		
		elseif($total['score'] < 40)		
		{			
		echo "E";
				}
		else
		{
			echo "Consult your Lecturer.";}

		}
 ?>
 </font></strong>
</pre>
</p>
<P><strong>Recommendations:</strong>.....................................................................................................................................................</p>
<P>Key to grading system       Total courses:                                                  Total units:
  70 and above (A) Excellent 60-69 (B) Very Good 50-59 (C) Good 40-49 (D) Satisfactory Below 39 (F) Fail, poor.</P>
<p> NOTE: 1 unit is equivalent to 40 contact hours. * pass after supplementary E-Elective course. These results are provisional and subject to revision by the University Senate.<br />
  For…………………………………………Date.......<?php echo date("D d-M-Y") ?>.<br /> Signature..............................................
  </p>
 <SCRIPT LANGUAGE="JavaScript"> 
if (window.print) {
document.write('<form><input type=button name=print value="Print" onClick="window.print()"></form>');
}
</script>
  
</body>

</html>


   <!--/*  <input type="submit" value="Print" onclick="printIframe(result);"/>
   <script>
       function printIframe(objFrame) {
           objFrame.focus();
           objFrame.print();
           bjFrame.save();
       }
   </script>
   <iframe name="result" id="result" src="result.php"></iframe> */ -->