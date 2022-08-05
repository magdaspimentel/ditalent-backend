<?php include 'includes/head.php'; ?>


		<main class="box">
			<div class="box-content">
				<div class="home-icon">
					<a href="<?php echo $data["url"]; ?>./">
						<i class="fas fa-times" aria-hidden="true" title="Fechar"></i>
					</a>
				</div>

                <h1>Entrar</h1>

				<div class="box-anchor box-anchor-extra"> 
                    <a href="<?php echo $data["url"]; ?>entrar/talento">Sou um Talento</a>
                    <a href="<?php echo $data["url"]; ?>entrar/empresa">Sou uma Empresa</a> 
                </div>

				<div class="box-flex">
					<a href="<?php echo $data["url"]; ?>registar">Registar</a>
				</div>
			</div>
		</main>
				
				
<?php include 'includes/bottom.php'; ?>