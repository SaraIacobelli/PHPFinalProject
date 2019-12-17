<?php $this->layout('layout', ['title' => 'Register']) ?>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center">Registrati</h1>
	<div  style="display: flex; justify-content: space-between;">
    <div class="container">
    <h1>Registrati</h1>
    
    <p>Crea il tuo account</p>
    <hr>
    <form name='registrazione' action='Dati' method='POST'>
    <label for="name"><b>Nome</b></label>
    <input type="text" placeholder="Inserisci nome" name="name" required>

    <label for="surname"><b>Cognome</b></label>
    <input type="text" placeholder="Inserisci il cognome" name="surname" required><br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Inserisci Email" name="email" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Inserisci Password" name="psw" required>

    <label for="psw-repeat"><b>Ripeti Password</b></label>
    <input type="password" placeholder="Ripeti la Password" name="Ripeti-password" required><br>
    <hr>
    <button type="submit" class="registerbtn"> Registrati</button><br>
    <p>Hai già un account? <a href="Login">Accedi</a>.</p>
  </div>
</form>
