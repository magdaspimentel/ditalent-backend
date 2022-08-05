<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/modal-newsletter.php'; ?>
<?php include 'includes/social-media.php'; ?>


		<main id="company" class="container top-header">				
			<div class="company-wrap">
				
				<!-- esquerda -->
				<div class="company-left">
	                <div>
	                    <img src="<?php echo $data['url']; ?>assets/images/uploads/empresas/<?php echo $data["empresa_info"]["imagem_empresa"]; ?>">
	                </div> 
				</div>

				<!-- direita -->
				<div class="company-right">
					<div>
						<h1><?php echo $data["empresa_info"]["nome_empresa"]; ?></h1>
						<p><?php echo $data["empresa_info"]["descricao_empresa"]; ?></p>
						<a href="https://<?php echo $data["empresa_info"]["website_empresa"]; ?>" target="_blank"><?php echo $data["empresa_info"]["website_empresa"]; ?></a>
					</div>		
				</div>							
			</div>
		</main>
		
		
<?php include 'includes/footer.php'; ?>	
<?php include 'includes/bottom.php'; ?>