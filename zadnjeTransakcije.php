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
				echo '<header><h1>Zadnje transakcije - '.$_SESSION['username'].'</h1></header>';
			}
			
			else echo '<header><h1>Zadnje transakcije - Korisnik</h1></header>';
						
			/*-------RADI-------*/				
			
			$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
			
			//provjerava da li postoji ikakva uplata
			$upit = "SELECT COUNT(korisnik) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."'";
			$rezultat = mysqli_query($baza, $upit);
			$brojRedova = mysqli_fetch_array($rezultat); 
			
			echo '<div id="ispisTransakcije">';
			
			
			if($brojRedova[0] == 0) 
			{
				echo '<div id="zadnjaUplata">
						<h3>Zadnja uplata</h3>
						<b>Naziv:</b>
						
						<br/>
						Nema podataka
						<br/>
						<br/>
						
						<b>Iznos:</b>
						
						<br/>
						Nema podataka
						<br/>
						<br/>
						
						<b>Datum:</b>
						
						<br/>
						Nema podataka
				</div>';
			}
			
			
			//Ispisuje zadnju uplatu
			
			else
			{
				$upit = "SELECT nazivUplate, iznos, vrijemeUplate FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."' ORDER BY vrijemeUplate DESC LIMIT 0,1;";
				$rezultat = mysqli_query($baza, $upit);
				$brojRedova = mysqli_fetch_array($rezultat); 
				
				echo '<div id="zadnjaUplata">
						<h3>Zadnja uplata</h3>
						<b>Naziv:</b>
					
						<br/>
						'.$brojRedova['nazivUplate'].'
						<br/>
						<br/>
						
						<b>Iznos:</b>
						
						<br/>
						'.$brojRedova['iznos'].' kn
						<br/>
						<br/>
						
						<b>Datum:</b>
						
						<br/>
						'.$brojRedova['vrijemeUplate'].'
					</div>';
			}
			
			
			
			//provjerava da li postoji ikakva isplata
			$upit = "SELECT COUNT(korisnik) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."'";
			$rezultat = mysqli_query($baza, $upit);
			$brojRedova = mysqli_fetch_array($rezultat); 
			
			
			
			
			if($brojRedova[0] == 0) 
			{
				echo '<div id="zadnjaIsplata">
					<h3>Zadnja isplata</h3>
					<b>Naziv:</b>
					
					<br/>
					Nema podataka
					<br/>
					<br/>
					
					<b>Iznos:</b>
					
					<br/>
					Nema podataka
					<br/>
					<br/>
					
					<b>Datum:</b>
					
					<br/>
					Nema podataka
				</div>';
			}
			
			//Ispisuje zadnju isplatu
			
			else
			{
				$upit = "SELECT nazivIsplate, iznos, vrijemeIsplate FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."' ORDER BY vrijemeIsplate DESC LIMIT 0,1;";
				$rezultat = mysqli_query($baza, $upit);
				$brojRedova = mysqli_fetch_array($rezultat); 
				
				echo '<div id="zadnjaIsplata">
						<h3>Zadnja isplata</h3>
						<b>Naziv:</b>
					
						<br/>
						'.$brojRedova['nazivIsplate'].'
						<br/>
						<br/>
						
						<b>Iznos:</b>
					
						<br/>
						'.$brojRedova['iznos'].' kn
						<br/>
						<br/>
						
						<b>Datum:</b>
					
						<br/>
						'.$brojRedova['vrijemeIsplate'].'
						</div>';
			
			}
			
			
			
			
			echo '</div>';
				
				
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
