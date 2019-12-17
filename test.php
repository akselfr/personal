<?php include("header.php");?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>oversikt over rom </h3>");  
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
<h3>Slett rom</h3>

<form method="post" action="" id="slettHotellromtypeSkjema" name="slettHotellromtypeSkjema" onSubmit="return bekreft()">
 slett rom <select name="antallrom" id="antallrom" required>
   <option value="">Velg rom </option>
 <?php include("dynamiske-funksjoner.php"); listeboksFinnHotellRomType(); ?>
 </select> <br/>
 <input type="submit" value="Slett rom" name="slettHotellromtypeKnapp" id="slettHotellromtypeKnapp" />
</form>
<?php
 if (isset($_POST ["slettHotellromtypeKnapp"]))
 {
 include("db-tilkobling.php"); 
 
 $antallrom=$_POST ["antallrom"];
 
$hotellnavn=$rad ["hotellnavn"];
$romtype=$rad["romtype"];
$antallrom=$rad ["antallrom"];

 $sqlSetning="DELETE FROM hotellromtype WHERE hotellnavn='$hotellnavn' AND romtype='$romtype';";
 
 mysqli_query($db,$sqlSetning) or die ("kan ikke slette rom fra databasen");

 print ("$hotellnavn $antallrom er nå slettet");
 }

?>