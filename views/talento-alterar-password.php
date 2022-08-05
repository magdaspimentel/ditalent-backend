<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>


		<main id="box-edit" class="top-header">
			<div class="box-content">
				<h1>Alterar Password</h1>

				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<div class="box-form">	
						<label for="new-password">Nova Password *</label>
						<input type="password" id="new-password" name="password_talento" placeholder="Escrever nova password" required minlength="8">
					</div>

					<div class="error-message">
						* Campo de preenchimento obrigatório. 
					</div>	

					<div class="text-right box-send">
						<button type="submit" name="send">Alterar</button>
					</div>						
				</form>
			</div>
		</main>
		
		
<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>