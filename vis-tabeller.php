<?php include 'header.php';?>

<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søk:<input type="text" id="sok" name="sok" required /> <br/>
 
 <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" />
 
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["sokeKnapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong>$sok</strong> <br /> <br />");

$sqlSetning="SELECT * FROM hotell WHERE hotellnavn LIKE '%$sok%' OR sted
 LIKE '%$sok%';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader==0)
 {
 print ("Ingen treff");
 }
 else
 {
 print ("Treff i Hotell-tabellen: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>sted</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $sted=$rad["sted"];
 $sokelengde=strlen($sok); 


 $tekst="<tr> <td> $hotellnavn </td> <td> $sted </td> </tr>"; 
 $startpos=stripos($tekst,$sok); 
 
 while ($startpos!==false)
 {
 $tekstlengde=strlen($tekst); 
 
 $hode=substr($tekst,0,$startpos);

 $sok=substr($tekst,$startpos,$sokelengde);
 
 $hale=substr($tekst,$startpos+$sokelengde,$tekstlengde-$startpos-$sokelengde);
 print("$hode<strong><font color='blue'>$sok</font></strong>"); 
 $tekst=$hale;
 $startpos=stripos($tekst,$sok); 
 }
 print("$hale</td></tr>"); 
 }
 print ("</table> </br />");
 }

 }

 ?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>Registrerte Hotell </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>hotellnavn</th> <th align=left>sted</th> </tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$hotellnavn=$rad["hotellnavn"];
			$sted=$rad["sted"];  

			print ("<tr> <td> $hotellnavn </td> <td> $sted </td> </tr>"); 
		}
	print ("</table>");  
?>

<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søk:<input type="text" id="sok" name="sok" required /> <br/>
 
 <input type="submit" value="Fortsett" id="soke2Knapp" name="soke2Knapp" />
 
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["soke2Knapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong>$sok</strong> <br /> <br />");

$sqlSetning="SELECT * FROM rom WHERE hotellnavn LIKE '%$sok%'OR romtype
 LIKE '%$sok%' OR romnr LIKE '%$sok%';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader==0)
 {
 print ("Ingen treff");
 }
 else
 {
 print ("Treff i klasse-tabellen: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>sted</th> <th align=left>sted</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $romtype=$rad["romtype"];
 $romnr=$rad["romnr"];
 $sokelengde=strlen($sok); 


 $tekst="<tr> <td> $hotellnavn </td> <td> $romtype </td> <td> $romnr </td> </tr>"; 
 $startpos=stripos($tekst,$sok); 
 
 while ($startpos!==false)
 {
 $tekstlengde=strlen($tekst); 
 
 $hode=substr($tekst,0,$startpos);

 $sok=substr($tekst,$startpos,$sokelengde);
 
 $hale=substr($tekst,$startpos+$sokelengde,$tekstlengde-$startpos-$sokelengde);
 print("$hode<strong><font color='blue'>$sok</font></strong>"); 
 $tekst=$hale;
 $startpos=stripos($tekst,$sok); 
 }
 print("$hale</td></tr>"); 
 }
 print ("</table> </br />");
 }

 }

 ?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM rom ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>Registrerte rom </h3>");  
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
<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søk:<input type="text" id="sok" name="sok" required /> <br/>
 
 <input type="submit" value="Fortsett" id="soke3Knapp" name="soke3Knapp" />
 
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["soke3Knapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong>$sok</strong> <br /> <br />");

$sqlSetning="SELECT * FROM romtype WHERE romtype LIKE '%$sok%';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader==0)
 {
 print ("Ingen treff");
 }
 else
 {
 print ("Treff i klasse-tabellen: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>romtype</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $romtype=$rad["romtype"];
 $sokelengde=strlen($sok); 


 $tekst="<tr> <td> $romtype </td> </tr>"; 
 $startpos=stripos($tekst,$sok); 
 
 while ($startpos!==false)
 {
 $tekstlengde=strlen($tekst); 
 
 $hode=substr($tekst,0,$startpos);

 $sok=substr($tekst,$startpos,$sokelengde);
 
 $hale=substr($tekst,$startpos+$sokelengde,$tekstlengde-$startpos-$sokelengde);
 print("$hode<strong><font color='blue'>$sok</font></strong>"); 
 $tekst=$hale;
 $startpos=stripos($tekst,$sok); 
 }
 print("$hale</td></tr>"); 
 }
 print ("</table> </br />");
 }

 }

 ?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>romtyper </h3>");  
	print ("<table border=1>"); 
	print ("<tr><th align=left>romtype</th></tr>"); 

	for ($r=1;$r<=$antallRader;$r++)
		{
			$rad=mysqli_fetch_array($sqlResultat);  
			$romtype=$rad["romtype"];

			print ("<tr> <td> $romtype </td> </tr>"); 
		}
		print ("</table>");  
?>


<h3>Søk</h3>
<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
 Søk:<input type="text" id="sok" name="sok" required /> <br/>
 
 <input type="submit" value="Fortsett" id="soke4Knapp" name="soke4Knapp" />
 
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["soke4Knapp"]))
 {
 $sok=$_POST ["sok"];
 include("db-tilkobling.php"); 
 print ("Treff for søket ditt: <strong>$sok</strong> <br /> <br />");

$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn LIKE '%$sok%'OR romtype
 LIKE '%$sok%' OR antallrom LIKE '%$sok%';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader==0)
 {
 print ("Ingen treff");
 }
 else
 {
 print ("Treff i klasse-tabellen: <br />");
 print ("<table border=1");
 print ("<tr><th align=left>hotellnavn</th> <th align=left>romtype </th> <th align=left>antallrom</th> </tr>");
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $romtype=$rad["romtype"];
 $antallrom=$rad["antallrom"];
 $sokelengde=strlen($sok); 


 $tekst="<tr> <td> $hotellnavn </td> <td> $romtype </td> <td> $antallrom </td> </tr>"; 
 $startpos=stripos($tekst,$sok); 
 
 while ($startpos!==false)
 {
 $tekstlengde=strlen($tekst); 
 
 $hode=substr($tekst,0,$startpos);

 $sok=substr($tekst,$startpos,$sokelengde);
 
 $hale=substr($tekst,$startpos+$sokelengde,$tekstlengde-$startpos-$sokelengde);
 print("$hode<strong><font color='blue'>$sok</font></strong>"); 
 $tekst=$hale;
 $startpos=stripos($tekst,$sok); 
 }
 print("$hale</td></tr>"); 
 }
 print ("</table> </br />");
 }

 }

 ?>
<?php   



	include("db-tilkobling.php");  

	$sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
	$antallRader=mysqli_num_rows($sqlResultat); 

	print ("<h3>Registrerte hotellromtyper </h3>");  
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