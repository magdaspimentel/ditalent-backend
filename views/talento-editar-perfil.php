<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>


		<main id="edit" class="container top-header">

			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">				
				<div class="edit-wrap">
					
					<!-- esquerda -->
					<div class="edit-left">
						<div class="edit-image">
							<img src="<?php echo $data['url']; ?>assets/images/uploads/talentos/<?php echo $data["talento_info"]["imagem_talento"]; ?>">

							<span class="upload-image">
								<label for="upload">Upload Imagem *</label>
								<input type="file" name="imagem_talento" id="upload" accept="image/png, image/jpeg" required>	
							</span>	
							<span id="fileName"></span>
						</div>	

						<div class="edit-form edit-form-margin">
							<label for="ocupacao">Ocupação *</label>
							<input type="text" name="ocupacao_talento" id="ocupacao" placeholder="<?php echo $data["talento_info"]["ocupacao_talento"]; ?>" aria-label="Ocupação" required>					
                        </div>                        

                        <div class="edit-form edit-form-margin">
                        	<label for="cidade">Cidade *</label>
							<input type="text" name="cidade_talento" id="cidade" placeholder="<?php echo $data["talento_info"]["cidade_talento"]; ?>" aria-label="Cidade" required>						
                        </div>

                        <div class="edit-form edit-form-margin">
                        	<label for="portfolio">Portfolio *</label>
							<input type="text" name="portfolio_talento" id="portfolio" placeholder="<?php echo $data["talento_info"]["portfolio_talento"]; ?>" aria-label="Portfolio" required>						
                        </div>

                        <div class="edit-form edit-form-margin">
                        	<label for="resumo">Resumo *</label>
							<textarea name="resumo_talento" id="resumo" placeholder="<?php echo $data["talento_info"]["resumo_talento"]; ?>" aria-label="Resumo" required></textarea>						
                        </div>			
					</div>

					<!-- direita -->
					<div class="edit-right">
						<div class="edit-form edit-form-margin">
							<label for="competencias">Competências *</label>
							<textarea name="competencia_talento" id="competencias" placeholder="<?php echo $data["talento_info"]["competencia_talento"]; ?>" aria-label="Competências" required></textarea>						
                        </div>
                        
                        <div class="edit-form">
                        	<label for="experiencia">Experiência *</label>
                            <textarea name="experiencia_talento" id="experiencia" placeholder="<?php echo $data["talento_info"]["experiencia_talento"]; ?>" aria-label="Experiência" required></textarea>	
                        </div>		

                        <div class="edit-form">
                        	<label for="formacao">Formação *</label>
                            <textarea name="formacao_talento" id="formacao" placeholder="<?php echo $data["talento_info"]["formacao_talento"]; ?>" aria-label="Formação" required></textarea>	
                        </div>	

                        <div class="error-message">
							* Campo de preenchimento obrigatório. 
						</div>						
					</div>  
				</div>

				<div class="text-right edit-send">
					<button type="submit" name="send">Guardar</button>
				</div>
			</form>	
			
		</main>
		

<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>	