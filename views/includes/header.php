<header id="header">
	
	<div class="logo">
        <a href="<?php echo $data["url"]; ?>./">
        	<img src="<?php echo $data["url"]; ?>assets/images/ditalent-logo.png" alt="">
        </a>
	</div>		

	<nav class="navbar">
		<ul>
			<li>
				<a class="<?php echo $data['controller'] === 'talentos' || $data['controller'] === 'talento' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>talentos">Talentos</a>                
            </li>
			
			<li> 
				<a class="<?php echo $data['controller'] === 'empresas' || $data['controller'] === 'empresa' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>empresas">Empresas</a>    
            </li>
		</ul>				
	</nav>


	<!-- mostrar botão de entrar em todas as páginas caso o login não esteja feito -->
	<?php if(!isset($_SESSION['loggedin'])) : ?>		
		<div class="login">
		    <a href="<?php echo $data["url"]; ?>entrar">Entrar</a>  
		</div>
	<?php endif; ?>			
	  

	<!-- mostrar header empresa em todas as páginas quando o login empresa é feito --> 
	<?php 
		if(isset($_SESSION['loggedinEmpresa']) && $_SESSION['loggedinEmpresa'])  {
			?>
			<div class="avatar"> 	
				<div class="profile-dropdown">
					<div>
						<button type="button" aria-label="Menu" title="Menu" id="dropdownBtn">
							<i class="fas fa-bars" aria-hidden="true"></i>
						</button>	
					</div>	
					<div id="dropdownContent">
						<ul>	
							<li>
								<a class="<?php echo $data['controller'] === 'empresa-editar-perfil' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>empresa/editar-perfil">Editar Perfil</a>
							</li>	  
							<li>
								<a class="<?php echo $data['controller'] === 'empresa-dados-conta' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>empresa/dados-conta">Dados da Conta</a>
							</li>
							<li>
								<a class="<?php echo $data['controller'] === 'empresa-alterar-password' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>empresa/alterar-password">Alterar Password</a>
							</li>
							<li>
								<a class="<?php echo $data['controller'] === 'empresa-remover-conta' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>empresa/remover-conta">Remover Conta</a>
							</li>
							<li>
								<a href="<?php echo $data['url']; ?>home">Sair</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php	
		}
	?>	


	<!-- mostrar header talento em todas as páginas quando o login talento é feito -->
	<?php 
		if(isset($_SESSION['loggedinTalento']) && $_SESSION['loggedinTalento'])  {
			?>
			<div class="avatar">	
				<div class="profile-dropdown">
					<div>
						<button type="button" aria-label="Menu" title="Menu Configurações" id="dropdownBtn">
							<i class="fas fa-bars" aria-hidden="true"></i>
						</button>	
					</div>	
					<div id="dropdownContent">
						<ul>	
							<li>
								<a class="<?php echo $data['controller'] === 'talento-editar-perfil' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>talento/editar-perfil">Editar Perfil</a>
							</li>	  
							<li>
								<a class="<?php echo $data['controller'] === 'talento-dados-conta' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>talento/dados-conta">Dados da Conta</a>
							</li>
							<li>
								<a class="<?php echo $data['controller'] === 'talento-alterar-password' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>talento/alterar-password">Alterar Password</a>
							</li>	
							<li>
								<a class="<?php echo $data['controller'] === 'talento-remover-conta' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>talento/remover-conta">Remover Conta</a>
							</li>
							<li>
								<a href="<?php echo $data['url']; ?>home">Sair</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php	
		}
	?>	

</header>	