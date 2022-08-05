<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>


		<main id="box-edit" class="top-header">
			<div class="box-content">
				<h1>Dados da Conta</h1>

				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<div class="box-form">				
						<label for="name">Nome *</label>
						<input type="text" id="name" name="nome_empresa" placeholder="<?php echo $data["empresa_info"]["nome_empresa"]; ?>" required>
					</div>

					<div class="box-form">				
						<label for="email">E-mail *</label>
						<input type="email" id="email" name="email_empresa" placeholder="<?php echo $data["empresa_info"]["email_empresa"]; ?>" required>
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