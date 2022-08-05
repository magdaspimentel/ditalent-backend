        <footer>
            <div>
                <ul>
                    <li>
                        <a class="<?php echo $data['controller'] === 'sobre' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>sobre">Sobre</a>  
                    </li>

                    <!-- mostrar registar em todas as páginas caso o login não esteja feito -->
                    <?php if(!isset($_SESSION["loggedin"])) : ?>
                        <li>
                            <a class="<?php echo $data['controller'] === 'registar' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>registar">Registar</a> 
                        </li>
                    <?php endif; ?>     

                    <li id="newsletterBtn">Newsletter</li>
                    
                    <li>
                        <a class="<?php echo $data['controller'] === 'contacto' ? 'active' : ''; ?>" href="<?php echo $data['url']; ?>contacto">Contacto</a> 
                    </li>
                </ul>
            </div>  

            <div class="social-media-mobile">
                <a href="https://pt-pt.facebook.com/" target="_blank">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </a>
                <a href="https://pt.linkedin.com/" target="_blank">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/?lang=pt_pt" target="_blank">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
            </div>  

            <div class="copyright">
                <p>© 2020 DiTalent | Design e Programação por 
                    <a href="#">Magda Pimentel</a>
                </p>
            </div>
        </footer>