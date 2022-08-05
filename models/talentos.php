<?php

    namespace Models;

    use PDO;    
    use config\config;
    


        class Bases {

            // ligação à base de dados 
            public $db;
            private $db_host = 'localhost';
            private $db_username = 'root';
            private $db_password = '';
            private $db_name = 'ditalent';
            protected $conn;
            protected $stmt;

            public function __construct() {
                
                // ver se ligação à base de dados está a funcionar
                try {

                    $this->conn = new PDO("mysql:host=localhost;dbname=".$this->db_name, $this->db_username, $this->db_password);

                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                }

                catch(PDOException $e) {
                    
                    echo "erro na conexao: " . $e->getMessage();
                
                }

            }
            
        }

        

    	// herda funcionalidades da class Bases
        class Talentos extends Bases {


            // registar talento
        	public function registerTalento($nomeTalento, $emailTalento, $passwordTalento, $imagemTalento, $ocupacaoTalento, $idCategoria, $cidadeTalento,$portfolioTalento, $resumoTalento, $competenciaTalento, $experienciaTalento, $formacaoTalento) {

                // query 
        		$sql = "INSERT INTO talentos 
                        (nome_talento, email_talento, password_talento, imagem_talento, ocupacao_talento, fk_id_categoria, cidade_talento, portfolio_talento, resumo_talento, competencia_talento, experiencia_talento, formacao_talento) 
                        VALUES
                        (:nome_talento, :email_talento, :password_talento, :imagem_talento, :ocupacao_talento, :fk_id_categoria, :cidade_talento, :portfolio_talento, :resumo_talento, :competencia_talento, :experiencia_talento, :formacao_talento) 
                ";
               
                // prepare
        		$this->stmt = $this->conn->prepare($sql);

                // utilizar bindValue para evitar SQL Injection  
        		$this->stmt->bindValue(':nome_talento', $nomeTalento, PDO::PARAM_STR);
        		$this->stmt->bindValue(':email_talento', $emailTalento, PDO::PARAM_STR);
        		$this->stmt->bindValue(':password_talento', $passwordTalento, PDO::PARAM_STR);
        		$this->stmt->bindValue(':imagem_talento', $imagemTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':ocupacao_talento', $ocupacaoTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':fk_id_categoria', $idCategoria, PDO::PARAM_STR);
                $this->stmt->bindValue(':cidade_talento', $cidadeTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':portfolio_talento', $portfolioTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':resumo_talento', $resumoTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':competencia_talento', $competenciaTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':experiencia_talento', $experienciaTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':formacao_talento', $formacaoTalento, PDO::PARAM_STR);
        	
                // execute
        		return $this->stmt->execute();

        	}



            // registar talento. verificar se email existe na base de dados. impedir que seja introduzido um email repetido
            public function emailDatabaseTalento($emailTalento) {

                $sql = "SELECT email_talento
                    FROM talentos 
                    WHERE email_talento = :email_talento 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':email_talento', $emailTalento, PDO::PARAM_STR);

                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );     
            } 
                    


            // entrar talento 
            public function loginTalento($emailLogin) {

                $sql = "SELECT id_talento, email_talento, password_talento
                    FROM talentos 
                    WHERE email_talento = :email_talento 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':email_talento', $emailLogin, PDO::PARAM_STR);

                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );     
                
            }   



            // mostrar todos os talentos na página talentos
            public function showAllTalentos() {
              
                $sql = "SELECT * 
                    FROM talentos 
                    ORDER BY id_talento DESC
                ";
                              
                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll( PDO::FETCH_ASSOC );

            }  



            // mostrar todos os talentos na página home
            public function showAllTalentosHome() {

                // mostrar até 4 talentos
                $sql = "SELECT *
                    FROM talentos 
                    ORDER BY id_talento DESC LIMIT 4
                ";
                              
                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll( PDO::FETCH_ASSOC );

            }            



            // mostrar cada talento individualmente pelo id na página talento 
            public function showTalentoById($idTalento) {

                $sql = "SELECT id_talento, nome_talento, imagem_talento, ocupacao_talento, cidade_talento, portfolio_talento, resumo_talento, competencia_talento, experiencia_talento, formacao_talento 
                        FROM talentos
                        WHERE id_talento = $idTalento
                ";    

                $this->stmt = $this->conn->prepare($sql);
 
                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );                  
                
            }


            
            // mostrar todas as categorias
            public function showAllCategorias() {

                $sql = "SELECT *
                    FROM categorias 
                    ORDER BY id_categoria 
                ";
                              
                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll( PDO::FETCH_ASSOC );

            }  



            // update de editar perfil talento
            public function updateTalentoProfile($ocupacaoTalento, $cidadeTalento, $portfolioTalento, $resumoTalento, $competenciaTalento, $experienciaTalento, $formacaoTalento, $imagemTalento, $idTalento) {

                $sql = "UPDATE talentos
                        SET ocupacao_talento = :ocupacao_talento, cidade_talento = :cidade_talento, portfolio_talento = :portfolio_talento, resumo_talento = :resumo_talento, competencia_talento = :competencia_talento, experiencia_talento = :experiencia_talento, formacao_talento = :formacao_talento, imagem_talento = :imagem_talento  
                        WHERE id_talento = :id_talento
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':ocupacao_talento', $ocupacaoTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':cidade_talento', $cidadeTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':portfolio_talento', $portfolioTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':resumo_talento', $resumoTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':competencia_talento', $competenciaTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':experiencia_talento', $experienciaTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':formacao_talento', $formacaoTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':imagem_talento', $imagemTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_talento', $idTalento, PDO::PARAM_STR);

                return $this->stmt->execute();

            } 



            // update de dados da conta talento
            public function updateTalentoDadosConta($nomeTalento, $idTalento) {

                $sql = "UPDATE talentos
                        SET nome_talento = :nome_talento
                        WHERE id_talento = :id_talento 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':nome_talento', $nomeTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_talento', $idTalento, PDO::PARAM_STR);

                return $this->stmt->execute();

            }



            // update de alterar password talento
            public function updateTalentoAlterarPassword($passwordTalento, $idTalento) {

                $sql = "UPDATE talentos
                        SET password_talento = :password_talento
                        WHERE id_talento = :id_talento
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':password_talento', $passwordTalento, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_talento', $idTalento, PDO::PARAM_STR);

                return $this->stmt->execute();

            }



            // apagar conta do talento
            public function deleteTalento($idTalento) {

                $sql = "DELETE FROM talentos
                        WHERE id_talento = :id_talento
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':id_talento', $idTalento, PDO::PARAM_STR);

                return $this->stmt->execute();    

            } 


        }