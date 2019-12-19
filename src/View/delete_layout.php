<?php $this->layout('layout', ['title' => 'Delete']) ?>
<div style="width: 50%; margin: auto;">
	<h1 style="text-align: center">Elimina</h1>
	<div  style="display: flex; justify-content: space-between;">

		<div class="container">
			<h1>Elimina articolo</h1>
			
			<form name='titolo' action='../DeleteArticle' method='POST'>
				<input type="hidden" name="id" value="<?=$id?>">
				<label for="titolo"><b>Titolo</b></label>
				<input type="text" name="titolo" value="<?=$titolo?>" readonly><br>
				
				<label for="data"><b>Data</b></label>
				<input type="data" value="<?=$data?>" name="data" readonly><br>

				<label for="testo"><b>Testo articolo</b></label>
				<textarea rows="15" cols="50" name="testo" style="vertical-align: middle;" readonly><?=utf8_encode($testo)?></textarea><br>

				<button type="submit" class="newbtn">Elimina</button>
			  
			</form>
		</div>
	</div>
</div>