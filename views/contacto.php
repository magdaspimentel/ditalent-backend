<?php include 'includes/head.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>
<?php include 'includes/social-media.php'; ?>


		<div class="banner banner-contacts">		
			<div class="layer"></div>

			<?php include 'includes/header.php'; ?> 

			<div class="banner-title">
				<h1>Um contacto está à distância de um clique</h1>	
			</div>				
		</div>


		<main id="contacts" class="container">
			<div class="content">
				<h2>Contacto</h2>
				<p>Se tens alguma questão, dúvida ou sugestão para melhorar esta plataforma, preenche o formulário que se encontra em baixo.</p>

				<form class="main-top" method="post" action="<?php echo $data["url"]; ?>contacto">		

					<div class="contacts-form">				
						<label for="name">Nome *</label>
						<input type="text" id="name" name="contact_name" placeholder="Escrever nome" required>
					</div>		
							
					<div class="contacts-form">	
						<label for="email">Email *</label>
						<input type="email" id="email" name="contact_email" placeholder="Escrever e-mail" required>
					</div>

					<div class="contacts-form">	
						<label for="subject">Assunto *</label>
						<input type="text" id="subject" name="contact_subject" placeholder="Escrever assunto" required>
					</div>

					<div class="contacts-form">
						<label for="message">Mensagem *</label>
						<textarea id="message" name="contact_message" placeholder="Escrever mensagem" required></textarea>		
					</div>

					<div class="error-message">
						* Campo de preenchimento obrigatório. 
					</div>			

					<div class="text-right contacts-send">
						<button type="submit" name="contact_send">Enviar</button>
					</div>						
				</form>
			</div>	
		</main>


<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>