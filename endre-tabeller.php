<?php  
include("header.php");?> 
<h3>Endre hotell</h3>
<form method="post" action="" id="endreHotellSkjema" name="endreHotellSkjema">
	hotell
	<select name="hotellnavn" id="hotellnavn">
	<?php include("dynamiske-funksjoner.php"); listeboksFinnHotell(); ?> 
</select>  <br/>
<input type="submit"  value="Finn hotell" name="finnHotellKnapp" id="finnHotellKnapp"> </form>

<?php
	if (isset($_POST ["finnHotellKnapp"])) 
	{
		include("db-tilkobling.php");  
	$hotellnavn=$_POST ["hotellnavn"]; 

	$sqlSetning="SELECT * FROM hotell WHERE hotellnavn='$hotellnavn';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

	$rad=mysqli_fetch_array($sqlResultat);  
	$hotellnavn=$rad["hotellnavn"];
	$sted=$rad["sted"];

	print("<br />");
	print ("<form method='post' action='' id='endreHotellSkjema' name='endreHotellSkjema'>");
	print ("Eksisterende hotellnavn <input type='text' value='$hotellnavn' name='gammeltHotell' id='gammeltHotell'
 readonly /> <br />");
	print ("Eksisterende stedsnavn <input type='text' value='$sted' name='gammeltSted' id='gammeltSted'
 readonly /> <br />");
	print ("hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' required /> <br />");
	print ("sted <input type='text' value='$sted' name='sted' id='sted' required /> <br />");
	print ("<input type='submit' value='Endre hotell' name='endreHotellKnapp' id='endreHotellKnapp'>");
	print ("</form>");
	}
if (isset($_POST ["endreHotellKnapp"]))
{
$gammeltHotell=$_POST ["gammeltHotell"];
$gammeltSted=$_POST ["gammeltSted"];
$hotellnavn=$_POST ["hotellnavn"];
$sted=$_POST ["sted"];

if (!$hotellnavn || !$sted)
	{
	print ("Alle felt m&aring; fylles ut");
	}
		else
	{
		include("db-tilkobling.php");  
			$sqlSetning="UPDATE hotell SET hotellnavn='$hotellnavn', sted='$sted' WHERE hotellnavn='$gammeltHotell';";
			mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen"); 
			print ("hotell med navn $hotellnavn er n&aring; endret <br />");
	}
}
?>
<h3>Endre rom</h3>
<form method="post" action="" id="endreRomSkjema" name="endreRomSkjema">
	rom
	<select name="hotellnavn" id="hotellnavn">
	<?php listeboksFinnRom(); ?> 
</select>  <br/>
<input type="submit"  value="Finn rom" name="finnRomKnapp" id="finnRomKnapp"> </form>

<?php
	if (isset($_POST ["finnRomKnapp"])) 
	{
		include("db-tilkobling.php");  
	$hotellnavn=$_POST ["hotellnavn"];


	$sqlSetning="SELECT * FROM rom WHERE hotellnavn='$hotellnavn';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

	$rad=mysqli_fetch_array($sqlResultat); 
	$hotellnavn=$rad["hotellnavn"];
	$romtype=$rad["romtype"];
	$romnr=$rad["romnr"];

	print("<br />");
	print ("<form method='post' action='' id='endreRomSkjema' name='endreRomSkjema'>");
	print ("Eksisterende hotellnavn <input type='text' value='$hotellnavn' name='gammelthotell' id='gammelthotell'
 readonly /> <br />");
	print ("Eksisterende romtype <input type='text' value='$romtype' name='gammelromtype' id='gammelromtype'
 readonly /> <br />");
	print ("Eksisterende romnr <input type='text' value='$romnr' name='gammeltromnr' id='gammeltromnr'
 readonly /> <br />");
	print ("hotellnavn <select name='hotellnavn' id='hotellnavn'> <br />");
	listeboksHotellnavn(); print (" </select> <br />");
	print ("romtype <select name='romtype' id='romtype'> <br />");
	listeboksRomtype(); print (" </select> <br />");
	print ("romnr <input type='text' value='$romnr' name='romnr' id='romnr' required /> <br />");
	print ("<input type='submit' value='Endre hotell' name='endreRomtypeKnapp' id='endreRomtypeKnapp'>");
	print ("</form>");
	}
if (isset($_POST ["endreRomKnapp"]))
{
$gammelthotellnavn=$_POST["gammelthotellnavn"];
$gammelromtype=$_POST["gammelromtype"];
$gammeltromnr =$_POST["gammeltromnr"];
$hotellnavn=$_POST ["hotellnavn"];
$romtype=$_POST ["romtype"];
$romnr=$_POST ["romnr"];

if (!$hotellnavn || !$romtype || !$romnr)
	{
	print ("Alle felt m&aring; fylles ut");
	}
		else
	{
		include("db-tilkobling.php");  
			$sqlSetning="UPDATE rom SET hotellnavn='$hotellnavn', romtype='$romtype', romnr='$romnr' WHERE hotellnavn='$gammelthotellnavn', romtype='$gammelromtype', romnr='$gammeltromnr';";
			mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen"); 
			print ("rom er nå endret til $hotellnavn $romtype $romnr <br />");
	}
}
?>
<h3>Endre romtype</h3>
<form method="post" action="" id="endreRomtypeSkjema" name="endreRomtypeSkjema">
	romtype
	<select name="romtype" id="romtype">
	<?php include listeboksFinnRomtype(); ?> 
</select>  <br/>
<input type="submit"  value="Finn romtype" name="finnRomtypeKnapp" id="finnRomtypeKnapp"> </form>

<?php
	if (isset($_POST ["finnRomtypeKnapp"])) 
	{
		include("db-tilkobling.php");  
	$romtype=$_POST ["romtype"]; 

	$sqlSetning="SELECT * FROM romtype WHERE romtype='$romtype';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

	$rad=mysqli_fetch_array($sqlResultat);  
	$romtype=$rad["romtype"];

	print("<br />");
	print ("<form method='post' action='' id='endreRomtypeSkjema' name='endreRomtypeSkjema'>");
	print ("Eksisterende romtype <input type='text' value='$romtype' name='gammelromtype' id='gammelromtype' readonly /> <br />");
	print ("romtype <input type='text' value='$romtype' name='romtype' id='romtype' required /> <br />");
	print ("<input type='submit' value='Endre romtype' name='endreRomtypeKnapp' id='endreRomtypeKnapp'>");
	print ("</form>");
	}
if (isset($_POST ["endreRomtypeKnapp"]))
{
$romtype=$_POST ["romtype"];
$gammelromtype=$_POST ["gammelromtype"];

if (!$romtype)
	{
	print ("Alle felt m&aring; fylles ut");
	}
		else
	{
		include("db-tilkobling.php");  
			$sqlSetning="UPDATE romtype SET romtype='$romtype' WHERE romtype='$gammelromtype';";
			mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen"); 
			print ("rom er nå endret til $romtype <br />");
	}
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
<h3>Endre hotellromtype</h3>

<form method="post" action="" id="finnHotellromtypeSkjema" name="finnHotellromtypeSkjema">
  Hotellnavn 
  <select name="hotellnavn" id="hotellnavn">
    <?php listeboksFinnHotell(); ?>
  </select> <br />
  Romtype
    <select name="romtype" id="romtype">
        <?php listeboksFinnRomtype(); ?>
    </select> <br />
  <input type="submit"  value="Finn hotellromtype" name="finnHotellromtypeKnapp" id="finnHotellromtypeKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br /> <br />
</form>

<?php
  if (isset($_POST ["finnHotellromtypeKnapp"]))
    {
      $hotellnavn=$_POST ["hotellnavn"];
      $romtype=$_POST ["romtype"];
      
      include("db-tilkobling.php");  /* tilkobling til database-server og valg av database utført */
      
      $sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$hotellnavn' AND romtype='$romtype';";
      $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen. Kombinasjonen av angitt hotellnavn og romtype eksisterer ikke.");


      $rad=mysqli_fetch_array($sqlResultat);
      $antallrom=$rad["antallrom"];
        
      print("<form method='post' action=''>");
      print("Hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' readonly /> <br />");
      print("Romtype <input type='text' value='$romtype' name='romtype' id='romtype' readonly /> <br />");
      print("Antallrom <input type='text' value='$antallrom' name='antallrom' id='antallrom' required /> <br />");
      print("<input type='submit' value='Endre hotellromtype' name='endreHotellromtypeKnapp' id='endreHotellromtypeKnapp'>");
      print("</form>");
    }

if (isset($_POST ["endreHotellromtypeKnapp"]))
    {
      $hotellnavn=$_POST ["hotellnavn"];
      $romtype=$_POST ["romtype"];
      $antallrom=$_POST ["antallrom"];

     if (!$hotellnavn || !$romtype || !$antallrom)
        {
          print ("Alle felt m&aring; fylles ut");
        }
    
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */
          
          $sqlSetning="UPDATE hotellromtype SET antallrom='$antallrom' WHERE hotellnavn='$hotellnavn' AND romtype='$romtype';";
          mysqli_query($db, $sqlSetning) or die ("ikke mulig å endre db");  /* SQL-setning sendt til database-serveren */

          print ("Hotellromtypen med hotellnavn $hotellnavn og romtypen $romtype er n&aring; endret<br />");
        }
    }

      
?>