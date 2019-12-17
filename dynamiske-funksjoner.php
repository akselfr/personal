<?php 
function listeboksHotellnavn()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $hotellnavn=$rad["hotellnavn"];
 print("<option value='$hotellnavn'>$hotellnavn</option>");
 }
}
function listeboksRomtype()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $romtype=$rad["romtype"];
 print("<option value='$romtype'>$romtype</option>");
 }
}
function listeboksFinnHotell ()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $sted=$rad["rad"];
 print("<option value='$hotellnavn'>$hotellnavn $sted </option>");
 
 }
}
function listeboksFinnRom ()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM rom ORDER BY romnr;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $romtype=$rad["romtype"];
 $romnr=$rad["romnr"];
 print("<option value='$romnr'>$hotellnavn $romtype $romnr </option>");
 
 }
}
function listeboksFinnRomtype()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat);
 $romtype=$rad["romtype"];
 print("<option value='$romtype'>$romtype</option>");
 }
}
function listeboksFinnHotellRomType ()
{
 include("db-tilkobling.php"); 

 $sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

 $antallRader=mysqli_num_rows($sqlResultat); 
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); 
 $hotellnavn=$rad["hotellnavn"];
 $romtype=$rad["romtype"];
 $antallrom=$rad["antallrom"];
 print("<option value='$antallrom'>$hotellnavn $romtype $antallrom </option>");
 
 }
}
?>