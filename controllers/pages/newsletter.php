<?php

    use config\config;
    use config\view;
    use PHPMailer\PHPMailer\PHPMailer;

 
    // modal newsletter
    // recebe o que vem do formulário do modal newsletter
    $app->post("/", function() {

        $newsletterName = $_POST["newsletter_name"];
        $newsletterEmail = $_POST["newsletter_email"];

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;

        // dados da conta de envio de email  
        $mail->Username = 'magda.pimentel.teste@gmail.com';
        $mail->Password = 'testemagdapimentel';

        $mail->setFrom($newsletterEmail, $newsletterName);

        // destinatário
        $mail->addAddress('magda.pimentel.teste@gmail.com', 'Ditalent');

        $mail->isHTML(true); 

        // assunto
        $mail->Subject = "Newsletter";

        // mensagem
        $mail->Body = "Foi efetuado um novo pedido de subscrição da newsletter com os seguintes dados: <br>Nome: $newsletterName<br> Email: $newsletterEmail"; 
                                 
        if($mail->send() ) {
            echo("<script>window.location = 'newsletter/sucesso';</script>");

        } 

        else {
            echo("<script>window.location = '/';</script>");
        }
        
    });



    // página newsletter sucesso
	$app->get("/newsletter/sucesso", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "newsletter-sucesso",
        ];

        $view->showView("newsletter-sucesso", $data);
        
    });