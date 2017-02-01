<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transaktor</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
			
	</head>
	
<?php //session_destroy(); ?>

	<body style="
	background-image: url('pozadina.png');
	background-repeat: no-repeat;
	background-position:top center;
	">
		<div id="glavni">
			
			<header>
				<h1>TRANSAKTOR</h1>
			</header>



			<div id="formaLog">
			
				<div class="logoNovcanik">
					<img src="logo.png">
				</div>
				
				<form name="login" action="index.php" method="POST" enctype="multipart/form-data" >
				   
				   	<input id="username" type="text" placeholder="Korisničko ime" name="username" required/> 
					
					<div class="crta">
						<i></i>
					</div>  
				
					<input id="pass" type="password" placeholder="Lozinka" name="pass" required/>
					<br/>   
					<button>Prijava</button>
					
				</form>
				   
				<form name="reg" action="registracija.html" method="POST" enctype="multipart/form-data"><br/>
				 	<button>Registracija</button> 
				</form>
								
			</div>
			
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
					
			
			<h3 style="color:#7A7272;"><i>"Never spend your money before you have earned it."<br/>Thomas Jefferson</i></h3>
		   
			<footer>
				<p>Kreirao:&nbsp;&nbsp;&nbsp;&nbsp;Matko Horvat</p>
				<p>Kontakt:&nbsp;&nbsp;&nbsp;&nbsp;mhorvat3@tvz.hr</p>
				<p>Kreirano 2017.</p>
			</footer>   

		


		
			
			<?php
			session_start();

			if(isset($_POST['username']))
			{
				$username=$_POST['username'];
			}

			if(isset($_POST['pass']))
			{
				$pass=$_POST['pass'];
				$hash=md5($pass);

			}
			

			
			$baza = mysqli_connect('localhost:3306','root','root',"transaktor") or die("Neuspjelo spajanje na bazu!");
			//-------------------------------------------------------------------------
			
			$sql="SELECT ime, lozinka FROM korisnici WHERE ime=? AND lozinka=?";
			/* Inicijalizira statement objekt nad konekcijom */
			$stmt=mysqli_stmt_init($baza);
			/* Povezuje parametre statement objekt s upitom */
			if (mysqli_stmt_prepare($stmt, $sql))
			{
				/* Povezuje parametre i njihove tipove s statement objektom */
				mysqli_stmt_bind_param($stmt,'ss',$username,$hash);
				/* Izvršava pripremljeni upit i pohranjuje rezultate */
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
			}
			/* Povezuje atribute iz rezultata s varijablama */
			mysqli_stmt_bind_result($stmt, $a, $b);

			/* Dohvaća redak iz rezultata, i posprema vrijednosti atributa u
			varijable navedene funkcijom mysqli_stmt_bind_result() */
			mysqli_stmt_fetch($stmt);

			 
			if (mysqli_stmt_num_rows($stmt)>0){ 
				
				$_SESSION['username']=$username;
				
				echo "<script type='text/javascript'>location.href = 'glavna.php';</script>";

			}
				

			?>
					
		</div>
	</body>
</html>
