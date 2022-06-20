<?php
    include ('../model/db.php');
    session_start();
 
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

    $proprietario = $_POST['proprietario'];

    $result= $con-> prepare ("INSERT INTO Devolvidos (Email_proprietario) VALUES ($proprietario)");
    //$result->bind_param($proprietario);
    //$stmt = $result->execute();
    //$result->close();

    //Inicio enviar email
    require 'PHPMailer/PHPMailerAutoload.php';

    $Mailer = new PHPMailer();

    //Define que sera usado SMTP
    $Mailer->IsSMTP();

    //Enviar email em HTML
    $Mailer->isHTML(true);

    //Aceitar caracteres especiais
    $Mailer->Charset = 'UFT-8';

    //Configurações
    $Mailer->SMTPAuth = true;
    $Mailer->SMTPSecure = 'ssl';
/*
    //nome do servidor
    $Mailer->Host = 'srv84.prodnd.com.br';
    //Porta de saida de email
    $Mailer->Port = 465;*/

    //Dados do email de saida - autenticaçao
    $Mailer->Username = $_POST['email'];
    $Mailer->Password = $_POST['password'];

    //Email remetente (deve ser o mesmo de quem fez a autenticacao)
    $Mailer->From = $_POST['email'];

    //Nome do remetente
    $Mailer->FromName='Achados&Perdidos';

    //Nome da mensagem
    $Mailer->Subject='Título - Confirmação de email'; 

    //$Mailer-> FROM = 'wesleybol@gmail.com';
    
    //Corpo da Mensagem 
    $mensagem = "Olá <br>";
    $mensagem .= "Confirme seu emaio para receber o item! <br>";
    $mensagem .= "Clique aqui para confirmar seu email <br> <br>";
    $mensagem .= "Se você recebeu este email por engano, por favor desconsidere. <br> <br>";
    $mensagem .= "Achados&Perdidos"; 
    
    $Mailer->Body = $mensagem;

    //Corpo da mensagemem texto
    $Mailer->AltBody='conteudo do email em texto';

    //Destinatario
    $Mailer->AddAddress($proprietario);

    if($Mailer->Send()){
        echo "Email enviado com sucesso";
    }else{
        echo "Erro no envio do email: " . $Mailer->ErrorInfo;
    }

    //Fim enviar email


?>