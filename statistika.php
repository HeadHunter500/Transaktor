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
				echo '<header><h1>Statistika - '.$_SESSION['username'].'</h1></header>';
			}
			
			else echo '<header><h1>Statistika - Korisnik</h1></header>';
						
		/*-------RADI-------*/				
			
			$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
			
			//provjerava da li postoji ikakva uplata
			$upit = "SELECT COUNT(korisnik) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."'";
			$rezultat = mysqli_query($baza, $upit);
			$brojRedova = mysqli_fetch_array($rezultat); 
			
			echo '<div id="ispisStatistike">';
			
			
			if($brojRedova[0] == 0)
			{
				echo '<div id="statistikaUplata" style="float:left;">
						<b>Najveća uplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<b>Najmanja uplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<b>Prosječna uplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<i>Ukupno uplaćeno:</i>
						
						<br/>
						<br/>
						Nema podataka
					</div>';
			}
			
			
			
			
			else
			{
			
				//Ispisuje najveću uplatu
				$upitMAX = "SELECT nazivUplate, iznos, vrijemeUplate FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."' AND iznos LIKE (SELECT MAX(iznos) FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."')";
				$rezultatMAX = mysqli_query($baza, $upitMAX);
				$brojRedovaMAX = mysqli_fetch_array($rezultatMAX); 
				
				//ispisuje najmanju uplatu
				$upitMIN = "SELECT nazivUplate, iznos, vrijemeUplate FROM uplata WHERE korisnik LIKE '".$_SESSION['username']."' AND iznos LIKE (SELECT MIN(iznos) FROM uplata WHERE korisnik LIKE'".$_SESSION['username']."')";
				$rezultatMIN = mysqli_query($baza, $upitMIN);
				$brojRedovaMIN = mysqli_fetch_array($rezultatMIN); 
				
				//ispisuje prosječnu uplatu
				$upitAVG = "SELECT AVG(iznos) FROM uplata WHERE korisnik LIKE'".$_SESSION['username']."'";
				$rezultatAVG = mysqli_query($baza, $upitAVG);
				$brojRedovaAVG = mysqli_fetch_array($rezultatAVG); 
				
				$zaokruzeno=round($brojRedovaAVG[0],2);
				
				
				//ispisuje ukupnu uplatu
				$upitSUM = "SELECT SUM(iznos) FROM uplata WHERE korisnik LIKE'".$_SESSION['username']."'";
				$rezultatSUM = mysqli_query($baza, $upitSUM);
				$brojRedovaSUM = mysqli_fetch_array($rezultatSUM); 
				
				$zaokruzenoSUM=round($brojRedovaSUM[0],2);
				
				echo '<div id="statistikaUplata" style="float:left;">
						<b>Najveća uplata:</b>
						<br/>
						'.$brojRedovaMAX['nazivUplate'].'<br/>
						'.$brojRedovaMAX['iznos'].' kn<br/>
						'.$brojRedovaMAX['vrijemeUplate'].'<br/>
						<br/>
						<b>Najmanja uplata:</b>
						<br/>
						'.$brojRedovaMIN['nazivUplate'].'<br/>
						'.$brojRedovaMIN['iznos'].' kn<br/>
						'.$brojRedovaMIN['vrijemeUplate'].'<br/>
						<br/>
						<b>Prosječna uplata:</b>
						<br/>
						'.$zaokruzeno.' kn<br/>
						<br/>
						<i><b>Ukupno uplaćeno:</b></i>
						<br/>
						'.$zaokruzenoSUM.' kn<br/>
					</div>';
				
			}
			
			//------------------------------------------------------
			
				//provjerava da li postoji ikakva isplata
				$upit = "SELECT COUNT(korisnik) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."'";
				$rezultat = mysqli_query($baza, $upit);
				$brojRedova = mysqli_fetch_array($rezultat); 
			
			
			
			
			if($brojRedova[0] == 0)
			{
				echo '<div id="statistikaIsplata" style="float:right;">
						<b>Najveća isplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<b>Najmanja isplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<b>Prosječna isplata:</b>
						
						<br/>
						<br/>
						Nema podataka
						
						<br/>
						<br/>
						<i>Prosječna isplata:</i>
						
						<br/>
						<br/>
						Nema podataka
					</div>';
			}
			
			
			else
			{
			
				//Ispisuje najveću isplatu
				$upitMAX = "SELECT nazivIsplate, iznos, vrijemeIsplate FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."' AND iznos LIKE (SELECT MAX(iznos) FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."')";
				$rezultatMAX = mysqli_query($baza, $upitMAX);
				$brojRedovaMAX = mysqli_fetch_array($rezultatMAX); 
				
				//ispisuje najmanju isplatu
				$upitMIN = "SELECT nazivIsplate, iznos, vrijemeIsplate FROM isplata WHERE korisnik LIKE '".$_SESSION['username']."' AND iznos LIKE (SELECT MIN(iznos) FROM isplata WHERE korisnik LIKE'".$_SESSION['username']."')";
				$rezultatMIN = mysqli_query($baza, $upitMIN);
				$brojRedovaMIN = mysqli_fetch_array($rezultatMIN); 
				
				//ispisuje prosječnu isplatu
				$upitAVG = "SELECT AVG(iznos) FROM isplata WHERE korisnik LIKE'".$_SESSION['username']."'";
				$rezultatAVG = mysqli_query($baza, $upitAVG);
				$brojRedovaAVG = mysqli_fetch_array($rezultatAVG); 
				
				$zaokruzeno=round($brojRedovaAVG[0],2);
				
				
				//ispisuje ukupnu isplatu
				$upitSUM = "SELECT SUM(iznos) FROM isplata WHERE korisnik LIKE'".$_SESSION['username']."'";
				$rezultatSUM = mysqli_query($baza, $upitSUM);
				$brojRedovaSUM = mysqli_fetch_array($rezultatSUM); 
				
				$zaokruzenoSUM=round($brojRedovaSUM[0],2);
				
				echo '<div id="statistikaIsplata" style="float:right;">
						<b>Najveća isplata:</b>
						<br/>
						'.$brojRedovaMAX['nazivIsplate'].'<br/>
						'.$brojRedovaMAX['iznos'].' kn<br/>
						'.$brojRedovaMAX['vrijemeIsplate'].'<br/>
						<br/>
						<b>Najmanja isplata:</b>
						<br/>
						'.$brojRedovaMIN['nazivIsplate'].'<br/>
						'.$brojRedovaMIN['iznos'].' kn<br/>
						'.$brojRedovaMIN['vrijemeIsplate'].'<br/>
						<br/>
						<b>Prosječna isplata:</b>
						<br/>
						'.$zaokruzeno.' kn<br/>
						<br/>
						<i><b>Ukupno isplaćeno:</b></i>
						<br/>
						'.$zaokruzenoSUM.' kn<br/>
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
