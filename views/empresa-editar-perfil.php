<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>


		<main id="edit" class="container top-header">

			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">				
				<div class="edit-wrap">

					<!-- esquerda -->
					<div class="edit-left">
						<div class="edit-image">
							<img src="<?php echo $data['url']; ?>assets/images/uploads/empresas/<?php echo $data["empresa_info"]["imagem_empresa"]; ?>">

							<span class="upload-image">
								<label for="upload">Upload Imagem *</label>
								<input type="file" name="imagem_empresa" id="upload" accept="image/png, image/jpeg" required>	
							</span>	
							<span id="fileName"></span>
						</div>				
					</div>

					<!-- direita -->
					<div class="edit-right">
						<div class="edit-form edit-form-margin">
							<label for="descricao">Descrição *</label>
							<textarea name="descricao_empresa" id="descricao" placeholder="<?php echo $data["empresa_info"]["descricao_empresa"]; ?>" aria-label="Descrição" required></textarea>						
                        </div>
                        
                        <div class="edit-form">
                        	<label for="website">Website *</label>
                            <input type="text" name="website_empresa" id="website" placeholder="<?php echo $data["empresa_info"]["website_empresa"]; ?>" aria-label="Website" required>
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