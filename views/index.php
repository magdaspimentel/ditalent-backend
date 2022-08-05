<?php include 'includes/head.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>
<?php include 'includes/social-media.php'; ?>


		<div class="banner banner-home">		
			<div class="layer"></div>

			<?php include 'includes/header.php'; ?>

			<div class="banner-title">
				<h1>Empresas e talentos digitais num único lugar</h1>	

				<!-- mostrar botão de registar caso o login não esteja feito -->
				<?php if(!isset($_SESSION["loggedin"])) : ?>	
					<a href="<?php echo $data["url"]; ?>registar">
						<div class="hiperlink">Registar</div>   
					</a>
				<?php endif; ?>

			</div>	
		</div>
		

		<main id="home" class="container">

			<!-- talentos -->
			<section class="main-top">
				<h2>Talentos Digitais</h2>	
				<p>Descobre os talentos mais recentes.</p>	

				<div class="wrap">

					<!-- mostrar a imagem de cada talento inserido na base de dados --> 
					<?php foreach ($data["talento_all"] as $talentoAll) : ?>
		                <div class="wrap-content">
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

				<a href="<?php echo $data["url"]; ?>talentos">
					<div class="hiperlink" aria-label="Aceder à página Talentos">VER MAIS</div>
				</a>	
			</section>

				
			<!-- empresas -->
			<section class="top-extra">
				<h2>Empresas Digitais</h2>
				<p>Descobre as empresas mais recentes.</p>	

		        <div class="carousel">
			        <div class="carousel-wrap">
			        	
						<!-- mostrar a imagem de cada empresa inserida na base de dados --> 
		                <?php foreach ($data["empresa_all"] as $empresaAll) : ?>
		                    <div class="wrap-content">
								<a href="<?php echo $data['url']; ?>empresas/<?php echo $empresaAll['id_empresa']; ?>">
		                            <img src="<?php echo $data['url']; ?>assets/images/uploads/empresas/<?php echo $empresaAll['imagem_empresa']; ?>">
		                        </a>                        
		                    </div>
		                <?php endforeach; ?>  

			        </div> 

					<a href="<?php echo $data["url"]; ?>empresas">
						<div class="hiperlink" aria-label="Aceder à página Empresas">Ver Mais</div>
					</a>
			    </div>
			</section>  

		</main>


		<!-- aceitar cookies -->
		<?php if(!isset($_SESSION["accept_cookies"])) : ?>
			<div id="cookiesMensage">   
				<p>Utilizamos cookies para te proporcionar a melhor experiência no nosso site</p>  
				<a href="?cookies=accept"><button id="cookiesClose">Aceitar</button></a>   
			</div>
		<?php endif; ?>	     
		

<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>		