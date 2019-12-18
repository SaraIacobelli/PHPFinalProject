<?php $this->layout('layout', ['title' => 'Login']) ?>
<form action="Home">
	<button type="submit">Home</button>
</form>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center">Login</h1>
	<div  style="display: flex; justify-content: space-between;">

		<div class="container">
			<h1>Login</h1>
			
			<p>Accedi al tuo account</p>
			<hr>
			<form name='login' action='./Controllo' method='POST'>
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Inserisci Email" name="email" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Inserisci Password" name="psw" required>

				<hr>
				<button type="submit" class="registerbtn"> Invia dati</button>
			</form>
		</div> 
	</div>
</div>