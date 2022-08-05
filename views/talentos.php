<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>
<?php include 'includes/social-media.php'; ?>


		<div class="search-bar top-header">
			<div class="category">
				<select name="" aria-label="Categoria" id="categorySelect">		

					<option value="0">Categorias</option> 
					
					<!-- mostrar cada categoria inserida na base de dados --> 
					<?php foreach ($data["categoria_all"] as $categoriaAll) : ?>

						<option value="<?php echo $categoriaAll['id_categoria']; ?>"><?php echo $categoriaAll['nome_categoria']; ?></option>

					<?php endforeach; ?>  
					
				</select>
			</div>	 		
		</div> 


		<main id="talents" class="container">
			<div class="wrap">
				
				<!-- mostrar a imagem de cada talento inserido na base de dados --> 
				<?php foreach ($data["talento_all"] as $talentoAll) : ?>

		            <div class="wrap-content"  data-category="<?php echo $talentoAll['fk_id_categoria']; ?>">
						<figure>	
							<img src="<?php echo $data['url']; ?>assets/images/uploads/talentos/<?php echo $talentoAll['imagem_talento']; ?>">
							<div>
								<h3><?php echo $talentoAll['nome_talento']; ?></h3>
								<h4><?php echo $talentoAll['ocupacao_talento']; ?></h4>
							</div>
							<a href="<?php echo $data['url']; ?>talentos/<?php echo $talentoAll['id_talento']; ?>"></a>
						</figure>	                      
					</div>
					
				<?php endforeach; ?>  	

			</div>
		</main>


<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>		