<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>


		<main id="box-edit" class="top-header">
			<div class="box-content">
				<h1>Dados da Conta</h1>

				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<div class="box-form">				
						<label for="name">Nome *</label>
						<input type="text" id="name" name="nome_talento" placeholder="<?php echo $data["talento_info"]["nome_talento"]; ?>" required>
					</div>

					<div class="error-message">
						* Campo de preenchimento obrigatório.
					</div>	

					<div class="text-right box-send">
						<button type="submit" name="send">Guardar</button>
					</div>						
				</form>
			</div>
		</main>
		

<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>		