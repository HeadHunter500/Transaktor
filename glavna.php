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



				$ukupanIznos=0;



				if(isset($_SESSION['username']))
				{
					echo '<header><h1>TRANSAKTOR - '.$_SESSION['username'].'</h1></header>';
				}
				
				else echo '<header><h1>TRANSAKTOR - Korisnik</h1></header>';
							
				/*-------RADI-------*/				
				
				$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
				
				//Provjerava da li postoji korisnik, stavlja uplate na 0
				
				$upit = "SELECT COUNT(korisnik) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."'";
				$rezultat = mysqli_query($baza, $upit);
				$brojRedova = mysqli_num_rows($rezultat);
				
				
				
				
				if($brojRedova == 0) 
				{
					$iznosUplata=0;
				}
				
				
				//ako postoji zbraja uplate
				
				else
				{
					$upitU = "SELECT SUM(iznos) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."'";
					$rezultatU = mysqli_query($baza, $upitU);
					$sumaUplata = mysqli_fetch_array($rezultatU);
					
					
					$iznosUplata = $sumaUplata[0];
				
				}
				
					
				//provjerava da li korisnik postoji, stavlja isplate na 0
				
				$upit1 = "SELECT COUNT(korisnik) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."'";
				$rezultat1 = mysqli_query($baza, $upit1);
				$brojRedova1 = mysqli_num_rows($rezultat1); 
				
				
				
				
				if($brojRedova1 == 0) 
				{
					$iznosIsplata=0;
				}
				
				//ako postoji zbraja isplate
				
				else
				{
					$upitI = "SELECT SUM(iznos) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."'";
					$rezultatI = mysqli_query($baza, $upitI);
					$sumaIsplata = mysqli_fetch_array($rezultatI);
					
					$iznosIsplata = $sumaIsplata[0];
				}
				
				
				$ukupanIznos = $iznosUplata - $iznosIsplata;
				
				if($ukupanIznos < 0)
				{
					echo '<p id="stanje" style="color:red;">Stanje novčanika:<br/> '.$ukupanIznos.' kn</p>';
				}
				
				else
				{
					echo '<p id="stanje">Financijsko stanje:<br/> '.$ukupanIznos.' kn</p>';
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
