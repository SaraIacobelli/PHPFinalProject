<?php $this->layout('layout', ['title' => 'newArticle']) ?>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center">Nuovo articolo</h1>
	<div  style="display: flex; justify-content: space-between;">

		<div class="container">
			<h1>Nuovo articolo</h1>
			
			<form name='titolo' action='NewArticle' method='POST'>
				<label for="titolo"><b>Titolo</b></label>
				<input type="text" placeholder="Inserisci un titolo" name="titolo" required><br>
				
				<label for="data"><b>Data</b></label>
				<input type="data" placeholder="Inserisci la data" name="data" required><br>

				<label for="testo"><b>Testo articolo</b></label>
				<textarea rows="15" cols="50" placeholder="Inserisci il testo dell'articolo" name="testo" style="vertical-align: middle;" required></textarea><br>

				<button type="submit" class="newbtn">Crea</button>
			  
			</form>
		</div>
	</div>
</div>