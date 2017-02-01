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

		   echo' <header>
				<h1>Isplata - '.$_SESSION['username'].'</h1>
				
			</header>';
		?>

			<div id="formaIsplata">
			 <form name="isplata" action="isplata.php" method="POST" enctype="multipart/form-data" onSubmit="alert('Uspješno ste isplatili iznos.');">
				   
				   <br/>
				   <input id="isplata" type="text" placeholder="Ime Isplate" name="isplata" required/> 
				   
				   <div class="crta">
					<i></i>
					</div> 
				   
				   
				   <input id="iznos" type="number" placeholder="Iznos isplate" name="iznos" required/>
				   
						
								   
					<br/>
				   <br/>
				   
				   
				   <button>Isplati</button> 
					   
				   </form>
		</div>
				   
			
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
				 
				  
				   
					
			
			
			
			  <br/>
			  <br/>

			<?php
				//session_start();
				
				
				if(isset($_POST['isplata']))
				{
					$isplata = $_POST['isplata'];
				}
				
				if(isset($_POST['iznos']))
				{
					$iznos = $_POST['iznos'];
				}
				
				
				if(isset($isplata) == NULL or isset($iznos) == NULL){}
				
				else 
				{
				
				$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
				
				
				$sql="INSERT INTO isplata (korisnik, nazivIsplate, iznos, vrijemeIsplate) VALUES (?,?,?,NOW())";
						/* Inicijalizira statement objekt nad konekcijom */
						$stmt=mysqli_stmt_init($baza);
						/* Povezuje parametre statement objekt s upitom */
						if (mysqli_stmt_prepare($stmt, $sql)){
						/* Povezuje parametre i njihove tipove s statement objektom */
						mysqli_stmt_bind_param($stmt,'sss',$_SESSION['username'],$_POST['isplata'], $_POST['iznos']);
						/* Izvršava pripremljeni upit */
						mysqli_stmt_execute($stmt);
						}
				
				}
				
			?>
			
			<footer>
				<p>Kreirao:&nbsp;&nbsp;&nbsp;&nbsp;Matko Horvat</p>
				<p>Kontakt:&nbsp;&nbsp;&nbsp;&nbsp;mhorvat3@tvz.hr</p>
				<p>Kreirano 2017.</p>
			</footer>   

		</div>
	</body>
</html>
