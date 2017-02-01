<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transaktor</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
	</head>

	<body>
		<div id="glavni">
			<header>
				<h1>Registracija</h1>
			</header>

					
					
		<?php
		
		if(isset($_POST['username']))
		{
			$username=$_POST['username'];
		}
		
		
		if(isset($_POST['pass']))
		{
			$pass=$_POST['pass'];
		}
		
		if(isset($_POST['pass1']))
		{
			$pass1=$_POST['pass1'];
		}
		
		/*
		if(isset($_POST['ime']))
		{
			$ime=$_POST['ime'];
		}
		*/
		
		
		

		$hash1=md5($pass);
		$hash2=md5($pass1);
			
			
			
			
		if($pass != $pass1)
		{
			echo ("Unijeli ste dvije različite lozinke!<br><br><a href='registracija.html'>Povratak</a><br>");
		} 
			
			
		if(($pass == null) or ($pass1 == null))
		{ 
			echo ("Niste upisali lozinku!<br><br><a href='registracija.html'>Povratak</a><br>");
		}
			
		$link = mysqli_connect('localhost:3306','root','root', "transaktor");


		$result = mysqli_query("SELECT ime FROM korisnici where ime LIKE '".$username."'", $link);
		$num_rows = mysqli_num_rows($result);
			
			
		if($num_rows > 0)
		{
		echo("Korisničko ime već postoji!<br><br><a href='registracija.html'>Povratak</a><br>");
		}
			
				
			//if($row = mysqli_fetch_array($result)>0) {echo'Korisničko ime već postoji!';}
			
			
			
			
			
			else if (($pass == $pass1) and (($pass != null) and ($pass1 != null)) and ($num_rows == 0))
			{
			
				echo ("Uspješno ste se registrirali! ");

			
			
				//dodat arhivu i $arhivu
			
				//$query = "INSERT INTO users(username, password, name) VALUES('$username' , '$hash1' , '$ime')";

			
				$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
			
			
					$sql="INSERT INTO korisnici (ime, lozinka, vrijemeRegistracije) values (?, ?, NOW())";
					/* Inicijalizira statement objekt nad konekcijom */
					$stmt=mysqli_stmt_init($baza);
					/* Povezuje parametre statement objekt s upitom */
					if (mysqli_stmt_prepare($stmt, $sql)){
					/* Povezuje parametre i njihove tipove s statement objektom */
					mysqli_stmt_bind_param($stmt,'ss',$username,$hash1);
					/* Izvršava pripremljeni upit */
					mysqli_stmt_execute($stmt);
					}
			
			
				//$result = mysqli_query($baza, $query) or die('Pogreška kod upisa u bazu podataka. <br />' . $query); 
				mysqli_close( $baza );
			
				echo("Ulogirajte se "); echo'<a href="index.php">ovdje</a>';
			
			}
			
			?>
			

			
			
			<br/>
			<br/>
			
			
			
			
			
			
		   

			
			
			<footer>
			<p>Kreirao:&nbsp;&nbsp;&nbsp;&nbsp;Matko Horvat</p>
			<p>Kontakt:&nbsp;&nbsp;&nbsp;&nbsp;mhorvat3@tvz.hr</p>
			<p>Kreirano 2017.</p>
			</footer>   

		</div>
	</body>
</html>
