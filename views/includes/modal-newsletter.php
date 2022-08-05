<div id="newsletterModal">
	<div class="box-content">
		<div id="newsletterClose">
			<button type="button" aria-label="Fechar" title="Fechar">
	            <i class="fas fa-times" aria-hidden="true"></i>
	        </button>
		</div>	
		<h1>Subscrever Newsletter</h1>
		<p>Subscreve a newsletter e recebe informação exclusiva no teu e-mail.</p>

		<form method="post" action="<?php echo $data["url"]; ?>/">	
			<div class="box-form">				
				<label for="newsletter-name">Nome *</label>
				<input type="text" id="newsletter-name" name="newsletter_name" placeholder="Escrever nome" required>
			</div>

			<div class="box-form">				
				<label for="newsletter-email">E-mail *</label>
				<input type="email" id="newsletter-email" name="newsletter_email" placeholder="Escrever e-mail" required>
			</div>	

			<div class="error-message">
				* Campo de preenchimento obrigatório.
			</div>	

			<div class="text-right box-send newsletter-button">
				<button type="submit" name="newsletter_send">Enviar</button>
			</div>						
		</form>
	</div>
</div>