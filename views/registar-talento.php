<?php include 'includes/head.php'; ?>


		<main class="box">
			<div class="box-content box-scroll">
				<div class="home-icon">
					<a href="<?php echo $data["url"]; ?>registar">
						<i class="fas fa-times" aria-hidden="true" title="Fechar"></i>
					</a>
				</div>

				<h1>Registar</h1>

				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">	
                    <div class="box-form">
                        <label for="name">Nome *</label>
                        <input type="text" id="name" name="nome_talento" placeholder="Escrever nome" required> 
                    </div>
                    
                    <div class="box-form">				
						<label for="email">E-mail *</label>
						<input type="email" id="email" name="email_talento" placeholder="Escrever e-mail" required>
					</div>		

					<!-- caso o email introduzido já se encontre na base de dados aparece mensagem de erro --> 
					<?php 
						if(isset($_SESSION['email_repetido']) && $_SESSION['email_repetido'])  {
							?>
							<div class="error-email">
								O email inserido já se encontra registado. Introduz outro email. 
							</div>
						<?php	
						}
					?>
						
					<div class="box-form">	
						<label for="password">Password *</label>
						<input type="password" id="password" name="password_talento" placeholder="Escrever password" required minlength="8">
                    </div>

                    <div class="box-form">	
						<label for="occupation">Ocupação *</label>
						<input type="text" id="occupation" name="ocupacao_talento" placeholder="Escrever ocupação" required>
                    </div>

                    <div class="box-form edit-category">
						<label>Categoria *</label>						
						<select name="fk_id_categoria">											

							<!-- mostrar cada categoria inserida na base de dados --> 
							<?php foreach ($data["categoria_all"] as $categoriaAll) : ?>

								<option value="<?php echo $categoriaAll['id_categoria']; ?>"><?php echo $categoriaAll['nome_categoria']; ?></option>

							<?php endforeach; ?>  
					
						</select>
					</div>

					<div class="box-form">	
						<label for="city">Cidade *</label>
						<input type="text" id="city" name="cidade_talento" placeholder="Escrever cidade" required>
                    </div>

					<div class="box-form">	
						<label for="portfolio">Portfolio *</label>
						<input type="text" id="portfolio" name="portfolio_talento" placeholder="Link do portfolio" required>
                    </div>

                    <div class="box-form">	
						<label for="resume">Resumo *</label>
						<textarea id="resume" name="resumo_talento" placeholder="Escrever resumo" required></textarea>
                    </div>

                    <div class="box-form">	
						<label for="skills">Competências *</label>
						<textarea id="skills" name="competencia_talento" placeholder="Escrever competências" required></textarea>	
                    </div>

                    <div class="box-form">	
						<label for="experience">Experiência *</label>
						<textarea id="experience" name="experiencia_talento" placeholder="Escrever experiência" required></textarea>	
                    </div>

                    <div class="box-form">	
						<label for="education">Formação *</label>
						<textarea id="education" name="formacao_talento" placeholder="Escrever formação" required></textarea>
                    </div>

                    <div class="box-form">
						<div class="edit-image">
							<img src="<?php echo $data['url']; ?>assets/images/upload-image.jpg" alt="Upload Imagem">

							<span class="upload-image">
								<label for="upload">Upload Imagem *</label>
								<input type="file" name="imagem_talento" id="upload" accept="image/png, image/jpeg" required>					
							</span>	
							<span id="fileName"></span>
						</div>	
					</div>  

					<div class="error-message">
						* Campo de preenchimento obrigatório. 
					</div>	
                                
					<div class="text-right box-send">
						<button type="submit" name="send">Registar</button>
					</div>						
				</form>
			</div>
		</main>
				

<?php include 'includes/bottom.php'; ?>