<?php include 'includes/head.php'; ?>


		<main class="box">
			<div class="box-content">
				<div class="home-icon">
					<a href="<?php echo $data["url"]; ?>entrar">
						<i class="fas fa-times" aria-hidden="true" title="Fechar"></i>
					</a>
				</div>
				
				<h1>Entrar</h1>				

				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<div class="box-form">				
						<label for="email">E-mail *</label>
						<input type="email" id="email" name="email_empresa" placeholder="Escrever e-mail" required>
					</div>		
						
					<div class="box-form">	
						<label for="password">Password *</label>
						<input type="password" id="password" name="password_empresa" placeholder="Escrever password" required minlength="8">
					</div>				

					<!-- caso os dados inseridos estejam errados aparece mensagem de erro --> 
					<?php 
						if(isset($_SESSION['login_errado']) && $_SESSION['login_errado'])  {
							?>
							<div class="error-email">
								Os dados inseridos estão errados.
							</div>
						<?php	
						}
					?>

					<div class="error-message">
						* Campo de preenchimento obrigatório. 
					</div>									
					
					<div class="text-right box-send">
						<button type="submit" name="send">Entrar</button>
					</div>						
				</form>

				<div class="box-flex">
					<a href="<?php echo $data["url"]; ?>registar">Registar</a>
				</div>
			</div>
		</main>
				

<?php include 'includes/bottom.php'; ?>