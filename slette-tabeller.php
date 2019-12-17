<?php include 'header.php';?>



<script src="java.js"> </script>

<h3>Slett hotell</h3>

<form method="post" action="" id="slettHotellSkjema" name="slettHotellSkjema" onSubmit="return bekreft()">
 hotell <select name="hotellnavn" id="hotellnavn" required>
 	 <option value="">Velg hotell </option>
 <?php include("dynamiske-funksjoner.php"); listeboksFinnHotell(); ?>
 </select> <br/>
 <input type="submit" value="Slett hotell" name="slettHotellKnapp" id="slettHotellKnapp" />
</form>
<?php
 if (isset($_POST ["slettHotellKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $hotellnavn=$_POST ["hotellnavn"];
 
 $sqlSetning="DELETE FROM hotell WHERE hotellnavn='$hotellnavn';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette hotell fra databasen");

 print ("hotell er nå slettet");
 }

?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM rom ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>oversikt over rom </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>hotellnavn</th> <th align=left>romtype</th> <th align=left>romnr</th> </tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$hotellnavn=$rad["hotellnavn"];
			$romtype=$rad["romtype"];
			$romnr=$rad["romnr"];  

			print ("<tr> <td> $hotellnavn </td> <td> $romtype </td> <td> $romnr </td> </tr>"); 
		}
	print ("</table>");  
?>
<h3>Slett rom</h3>

<form method="post" action="" id="slettRomSkjema" name="slettRomSkjema" onSubmit="return bekreft()">
 slett rom <select name="romnr" id="romnr" required>
   <option value="">Velg rom </option>
 <?php listeboksFinnrom(); ?>
 </select> <br/>
 <input type="submit" value="Slett rom" name="slettRomKnapp" id="slettRomKnapp" />
</form>
<?php
 if (isset($_POST ["slettRomKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $romnr=$_POST ["romnr"];
 
$hotellnavn=$rad ["hotellnavn"];
$romnr=$rad ["romnr"];

 $sqlSetning="DELETE FROM rom WHERE hotellnavn='$hotellnavn' AND romnr='$romnr';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette rom fra databasen");

 print ("$hotellnavn $romnr er nå slettet");
 }

?>

?>
<h3>Slett romtype</h3>

<form method="post" action="" id="slettRomtypeSkjema" name="slettRomtypeSkjema" onSubmit="return bekreft()">
 romtype <select name="romtype" id="romtype" required>
 	 <option value="">Velg hotell </option>
 <?php listeboksFinnRomtype(); ?>
 </select> <br/>
 <input type="submit" value="Slett hotell" name="slettRomtypeKnapp" id="slettRomtypeKnapp" />
</form>
<?php
 if (isset($_POST ["slettRomtypeKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $romtype=$_POST ["romtype"];
 
 $sqlSetning="DELETE FROM romtype WHERE romtype='$romtype';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette romtype fra databasen");

 print ("romtype er nå slettet");
 }

?>
<?php   

	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>hotellromtyper </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>hotellnavn</th> <th align=left>romtype</th> <th align=left>antallrom</th> </tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$hotellnavn=$rad["hotellnavn"];
			$romtype=$rad["romtype"];
			$antallrom=$rad["antallrom"]; 

			print ("<tr> <td> $hotellnavn </td> <td> $romtype </td> <td> $antallrom </td> </tr>"); 
		}
	print ("</table>");  
?>
<h3>Slett Hotellromtype</h3>

<form method="post" action="" id="slettHotellromtypeSkjema" name="slettHotellromtypeSkjema" onSubmit="return bekreft()">
 hotellnavn <input name="hotellnavn" type="text" id="hotellnavn" required> <br />
 romtype <input name="romtype" type="text" id="romtype" required> <br />
 antallrom <input name="antallrom" type="text" id="antallrom" required> <br />
 <input type="submit" value="Slett hotellromtype" name="slettHotellromtypeKnapp" id="slettHotellromtypeKnapp" />
</form>
<?php
 if (isset($_POST ["slettHotellromtypeKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $hotellnavn=$_POST ["hotellnavn"];
 $romtype=$_POST ["romtype"];
 $antallrom=$_POST ["antallrom"];
 
 $sqlSetning="DELETE FROM hotellromtype WHERE hotellnavn='$hotellnavn' AND $romtype='$romtype';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette rom fra databasen");

 print ("$hotellnavn $romtype er slettet er nå slettet");
 }

?>