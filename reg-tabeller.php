<?php  include 'header.php' ?>

<h3>Registrer hotell</h3>
<form method="post" action="" id="regHotellSkjema" name="regHotellSkjema">
	hotellnavn <input type="text" id="hotellnavn" name="hotellnavn" required /><br/>
	sted<input type="text" id="sted" name="sted" required /></br>
	<input type="submit" value="registrer hotell" id="registrerHotellKnapp" name="registrerHotellKnapp">
	<input type="reset" value="Nullstill" name="nullstill" /><br/>
</form>

<?php
	if (isset($_POST ["registrerHotellKnapp"]))
	{
		$hotellnavn=$_POST ["hotellnavn"];
		$sted=$_POST ["sted"];

		if (!$hotellnavn || !$sted)
		{
			print ("Både hotellnavn og sted må fylles ut");
		}

		else
		{
			include("db-tilkobling.php");

			$sqlSetning="SELECT * FROM hotell WHERE hotellnavn='$hotellnavn';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);

			if ($antallRader!=0)
			{
				print ("Klassen er registrert fra før");
			}
			else
			{
				$sqlSetning = "INSERT INTO hotell VALUES ('$hotellnavn','$sted');";
				$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database.");
				print ("følgende hotell er registrert: $hotellnavn $sted");
			}
		}
	}
?>

<h3>Registrer rom</h3>
<form method="post" action="" id="regRomSkjema" name="regRomSkjema">
	 Hotellnavn <select name="velgnavn" id="velgnavn" required />
 	 <option value="">Velg hotellnavn </option>
 <?php include("dynamiske-funksjoner.php"); listeboksHotellnavn(); ?>
 </select> <br/>
 Romtype <select name="velgromtype" id="velgromtype" required />
 	 <option value="">Velg romtype </option>
 <?php listeboksRomtype(); ?>
 </select> <br/>
	romnr<input type="text" id="romnr" name="romnr" required /></br>
	<input type="submit" value="registrer hotell" id="registrerRomKnapp" name="registrerRomKnapp">
	<input type="reset" value="Nullstill" name="nullstill" /><br/>
</form>

<?php
	if (isset($_POST ["registrerRomKnapp"]))
	{
		$velgnavn=$_POST ["velgnavn"];
		$velgromtype=$_POST ["velgromtype"];
		$romnr=$_POST ["romnr"];

		if (!$velgnavn || !$velgromtype || !$romnr)
		{
			print ("Både hotellnavn, sted og romnr må fylles ut");
		}

		else
		{
			include("db-tilkobling.php");

			$sqlSetning="SELECT * FROM rom WHERE hotellnavn='$velgnavn';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);

			if ($antallRader!=0)
			{
				print ("Klassen er registrert fra før");
			}
			else
			{
				$sqlSetning = "INSERT INTO rom VALUES ('$velgnavn','$velgromtype','$romnr');";
				$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database.");
				print ("følgende rom er registrert: $velgnavn $velgromtype $romnr");
			}
		}
	}
?>
<h3>Registrer romtype</h3>
<form method="post" action="" id="regRomtypeSkjema" name="regRomtypeSkjema">
	Romtype <input type="text" id="romtype" name="romtype" required /><br/>
	<input type="submit" value="registrer hotell" id="registrerRomtypeKnapp" name="registrerRomtypeKnapp">
	<input type="reset" value="Nullstill" name="nullstill" /><br/>
</form>

<?php
	if (isset($_POST ["registrerRomtypeKnapp"]))
	{
		$romtype=$_POST ["romtype"];

		if (!$romtype)
		{
			print ("romtype må fylles ut");
		}

		else
		{
			include("db-tilkobling.php");

			$sqlSetning="SELECT * FROM romtype WHERE romtype='$romtype';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);

			if ($antallRader!=0)
			{
				print ("Klassen er registrert fra før");
			}
			else
			{
				$sqlSetning = "INSERT INTO romtype VALUES ('$romtype');";
				$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database.");
				print ("følgende romtype er registrert: $romtype");
			}
		}
	}
?>
<h3>Registrer hotellromtype</h3>
<form method="post" action="" id="regHotellromtypeSkjema" name="regHotellromtypeSkjema">
	 Hotellnavn <select name="navnhotell" id="navnhotell" required />
 	 <option value="">Velg hotellnavn </option>
 <?php listeboksHotellnavn(); ?>
 </select> <br/>
 Romtype <select name="typerom" id="typerom" required />
 	 <option value="">Velg romtype </option>
 <?php listeboksRomtype(); ?>
 </select> <br/>
	antallrom<input type="text" id="antallrom" name="antallrom" required /></br>
	<input type="submit" value="registrer hotell" id="registrerHotellromtypeKnapp" name="registrerHotellromtypeKnapp">
	<input type="reset" value="Nullstill" name="nullstill" /><br/>
</form>

<?php
	if (isset($_POST ["registrerHotellromtypeKnapp"]))
	{
		$navnhotell=$_POST ["navnhotell"];
		$typerom=$_POST ["typerom"];
		$antallrom=$_POST ["antallrom"];

		if (!$navnhotell || !$typerom || !$antallrom)
		{
			print ("Både hotellnavn, sted og antallrom må fylles ut");
		}

		else
		{
			include("db-tilkobling.php");

			$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$navnhotell';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);

			if ($antallRader!=0)
			{
				print ("Klassen er registrert fra før");
			}
			else
			{
				$sqlSetning = "INSERT INTO hotellromtype VALUES ('$navnhotell','$typerom','$antallrom');";
				$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database.");
				print ("følgende rom er registrert: $navnhotell $typerom $antallrom");
			}
		}
	}
?>