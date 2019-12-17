<?php include 'header.php';?>

<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM kunde ORDER BY brukernavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>oversikt over kunder </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>brukernavn</th> <th align=left>fornavn</th> <th align=left>etternavn</th> </tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$brukernavn=$rad["brukernavn"];
			$passord=$rad["passord"];
			$fornavn=$rad["fornavn"];
			$etternavn=$rad["etternavn"]; 

			print ("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td></tr>"); 
		}
	print ("</table>");  
?>