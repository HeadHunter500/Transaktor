<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transaktor</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
	</head>


<body>
<div id="glavni">


<?php 
session_start();






if(isset($_SESSION['username']))
{
	echo '<header><h1>Popis Uplata - '.$_SESSION['username'].'</h1></header>';
}

else echo '<header><h1>Popis Uplata - Korisnik</h1></header>';
				
/*-------RADI-------*/				
	
	$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
	
	//provjerava da li postoji ikakva uplata
	$upit = "SELECT COUNT(korisnik) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."'";
	$rezultat = mysqli_query($baza, $upit);
	$brojRedova = mysqli_fetch_array($rezultat); 
	
	//echo '<div id="ispis">';
	
	
	if($brojRedova[0] == 0) 
	{
	echo '<div style="
	width: 100%; 
	height: auto;
	margin: 0 auto;
	padding-bottom:10px;
	" id="ispis">';
		echo 'Trenutno nemate nikakve transakcije zabilježene';
	}
	
	
	//ispisuje sve uplate
	else
	{	
	$query = "SELECT nazivUplate, iznos, vrijemeUplate FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."';";
	$result = mysqli_query($baza, $query);
	
	
	$a=mysqli_num_rows($result);
echo '<div id="ispis">';
echo <<< AA
<table border="1" style="border-collapse:collapse;">
<tr>
<th><b>Ime uplate</b></th>
<th><b>Iznos (kn)</b></th>
<th><b>Vrijeme uplate</b></th>
</tr>
AA;




for($i=0; $i<$a; $i++){
	$row=mysqli_fetch_array($result);
echo <<< AAA
	<tr>
	<td>{$row['nazivUplate']}</td>
	<td>{$row['iznos']}</td>
	<td>{$row['vrijemeUplate']}</td>
	</tr>
AAA;
}
	
echo '</table>';	
echo '</div>';
	}

		mysqli_close( $baza );		
				
/*+--------------------------*/					
		
				
	   ?>
	   
	 
	   
		<div id="izbornik">
		
			<div class="logoNovcanik">
			<a href="glavna.php"><img src="logo.png"></a>
			</div>
			
				
			<br/>
			<a href="uplata.php">Uplata</a>
			<br/>
			<a href="isplata.php">Isplata</a>
			</br>
			<a href="zadnjeTransakcije.php">Zadnje Transakcije</a>
			<br/>
			<a href="popisUplata.php">Popis Uplata</a>
			<br/>
			<a href="popisIsplata.php">Popis Isplata</a>
			<br/>
			<a href="statistika.php">Statistika</a>
			<br/>
			<a href="index.php">Odjava</a>
			
		</div>
		
	<br/>


    
	
    <footer>
		<p>Kreirao:&nbsp;&nbsp;&nbsp;&nbsp;Matko Horvat</p>
		<p>Kontakt:&nbsp;&nbsp;&nbsp;&nbsp;mhorvat3@tvz.hr</p>
		<p>Kreirano 2017.</p>
	</footer>   
	


</div>
</body>
</html>
