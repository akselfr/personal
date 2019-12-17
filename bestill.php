<?php include 'header.php';?>

<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM bestill ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>oversikt over kunder </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>hotellnavn</th> <th align=left>innsjekk</th> <th align=left>utsjekk</th> <th align=left>romtype</th> <th align=left>brukernavn</th> </tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$hotellnavn=$rad["hotellnavn"];
			$dato=$rad["dato"];
			$tidsperiode=$rad["tidsperiode"];
			$romtype=$rad["romtype"];
			$brukernavn=$rad["brukernavn"]; 

			print ("<tr> <td> $hotellnavn </td> <td> $dato </td> <td> $tidsperiode </td> <td> $romtype </td> <td> $brukernavn </td></tr>"); 
		}
	print ("</table>");  
?>