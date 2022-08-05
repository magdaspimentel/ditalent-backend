<?php

    namespace Models;

    use PDO;    
    use config\config;



        class Base {

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

        

    	// herda funcionalidades da class Base
        class Empresas extends Base {


            // registar empresa 
        	public function registerEmpresa($nomeEmpresa, $emailEmpresa, $passwordEmpresa, $websiteEmpresa, $descricaoEmpresa, $imagemEmpresa) {

                // query 
        		$sql = "INSERT INTO empresas 
                        (nome_empresa, email_empresa, password_empresa, website_empresa, descricao_empresa, imagem_empresa)
                        VALUES
                        (:nome_empresa, :email_empresa, :password_empresa, :website_empresa, :descricao_empresa, :imagem_empresa) 
                ";
               
                // prepare
        		$this->stmt = $this->conn->prepare($sql);

                // utilizar bindValue para evitar SQL Injection  
        		$this->stmt->bindValue(':nome_empresa', $nomeEmpresa, PDO::PARAM_STR);
        		$this->stmt->bindValue(':email_empresa', $emailEmpresa, PDO::PARAM_STR);
        		$this->stmt->bindValue(':password_empresa', $passwordEmpresa, PDO::PARAM_STR);
        		$this->stmt->bindValue(':website_empresa', $websiteEmpresa, PDO::PARAM_STR);
        		$this->stmt->bindValue(':descricao_empresa', $descricaoEmpresa, PDO::PARAM_STR);
        		$this->stmt->bindValue(':imagem_empresa', $imagemEmpresa, PDO::PARAM_STR);
        	
                // execute
        		return $this->stmt->execute();

        	}



            // registar empresa. verificar se email existe na base de dados. impedir que seja introduzido um email repetido
            public function emailDatabaseEmpresa($emailEmpresa) {

                $sql = "SELECT email_empresa
                    FROM empresas 
                    WHERE email_empresa = :email_empresa 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':email_empresa', $emailEmpresa, PDO::PARAM_STR);

                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );     
            } 
                    


            // entrar empresa 
            public function loginEmpresa($emailLogin) {

                $sql = "SELECT id_empresa, email_empresa, password_empresa
                    FROM empresas 
                    WHERE email_empresa = :email_empresa 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':email_empresa', $emailLogin, PDO::PARAM_STR);

                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );     
                
            }              



            // mostrar todas as empresas na página empresas
            public function showAllEmpresas() {               

                $sql = "SELECT * 
                    FROM empresas 
                    ORDER BY id_empresa DESC
                ";
                              
                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll( PDO::FETCH_ASSOC );

            }  



            // mostrar todas as empresas na página home
            public function showAllEmpresasHome() {

                // mostrar até 4 empresas
                $sql = "SELECT *
                    FROM empresas 
                    ORDER BY id_empresa DESC LIMIT 4
                ";
                              
                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll( PDO::FETCH_ASSOC );

            }            



            // mostrar cada empresa individualmente pelo id na página empresa 
            public function showEmpresaById($idEmpresa) {

                $sql = "SELECT *
                        FROM empresas
                        WHERE id_empresa = $idEmpresa
                ";    
             
                $this->stmt = $this->conn->prepare($sql);
 
                $this->stmt->execute();

                return $this->stmt->fetch( PDO::FETCH_ASSOC );                  
                
            }



            // update de editar perfil empresa
            public function updateEmpresaProfile($websiteEmpresa, $descricaoEmpresa, $imagemEmpresa, $idEmpresa) {

                $sql = "UPDATE empresas
                        SET website_empresa = :website_empresa, descricao_empresa = :descricao_empresa, imagem_empresa = :imagem_empresa
                        WHERE id_empresa = :id_empresa
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':website_empresa', $websiteEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':descricao_empresa', $descricaoEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':imagem_empresa', $imagemEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_empresa', $idEmpresa, PDO::PARAM_STR);

                return $this->stmt->execute();

            }



            // update de dados da conta empresa
            public function updateEmpresaDadosConta($nomeEmpresa, $emailEmpresa, $idEmpresa) {

                $sql = "UPDATE empresas
                        SET nome_empresa = :nome_empresa, email_empresa = :email_empresa
                        WHERE id_empresa = :id_empresa 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':nome_empresa', $nomeEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':email_empresa', $emailEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_empresa', $idEmpresa, PDO::PARAM_STR);

                return $this->stmt->execute();

            }



            // update de alterar password empresa
            public function updateEmpresaAlterarPassword($passwordEmpresa, $idEmpresa) {

                $sql = "UPDATE empresas
                        SET password_empresa = :password_empresa
                        WHERE id_empresa = :id_empresa 
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':password_empresa', $passwordEmpresa, PDO::PARAM_STR);
                $this->stmt->bindValue(':id_empresa', $idEmpresa, PDO::PARAM_STR);

                return $this->stmt->execute();

            }



            // apagar conta da empresa
            public function deleteEmpresa($idEmpresa) {

                $sql = "DELETE FROM empresas
                        WHERE id_empresa = :id_empresa
                ";

                $this->stmt = $this->conn->prepare($sql);

                $this->stmt->bindValue(':id_empresa', $idEmpresa, PDO::PARAM_STR);

                return $this->stmt->execute();    

            } 



            // logout empresa e talento
            public function logout() {

                session_unset();
                session_destroy();

            } 


        }