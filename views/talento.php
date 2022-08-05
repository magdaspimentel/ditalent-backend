<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>
<?php include 'includes/social-media.php'; ?>

		
		<main id="talent" class="container top-header">				
			<div class="talent-wrap">
				
				<!-- esquerda -->
				<div class="talent-left">
					<div>
						<img src="<?php echo $data['url']; ?>assets/images/uploads/talentos/<?php echo $data["talento_info"]["imagem_talento"]; ?>">
					</div>	
					<div>
						<h1><?php echo $data["talento_info"]["nome_talento"]; ?></h1>
						<h2><?php echo $data["talento_info"]["ocupacao_talento"]; ?></h2>
						<p><?php echo $data["talento_info"]["cidade_talento"]; ?></p>
						<a href="https://<?php echo $data["talento_info"]["portfolio_talento"]; ?>" target="_blank"><?php echo $data["talento_info"]["portfolio_talento"]; ?></a>
						<p><?php echo $data["talento_info"]["resumo_talento"]; ?></p>	
					</div>									
				</div>

				<!-- direita -->
				<div class="talent-right">
					<div> 
						<h3>Talentos</h3>
						<p><?php echo $data["talento_info"]["competencia_talento"]; ?></p>
					</div>	

					<div>
						<h3>Experiência</h3>
						<p><?php echo $data["talento_info"]["experiencia_talento"]; ?></p>
					</div>	

					<div>
						<h3>Formação</h3>
						<p><?php echo $data["talento_info"]["formacao_talento"]; ?></p> 
					</div>	
				</div>							
			</div>
		</main>
		

<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>		