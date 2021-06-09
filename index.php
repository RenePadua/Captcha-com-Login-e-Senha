<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap"
	rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <title>Captcha</title>
<style>

form {
  align-items: center;

}

input {
margin: 25px;

width: 80%;
height: auto;


}

</style>
</head>

<body>
  <header>
		<div class="wrapper">
			<grid-container>
			
				<div style="float: right; margin-left: 200px; margin-right: auto; height: 250px; line-height: 250px; text-align: center;"><h1>TESTE de CAPTCHA</h1></div>
				
				<div  style="float: left" id="titulo"><img style="border-radius: 60px 0 60px 0; border-style: solid;" src="img/robot.jpg">	</div>
			
			</grid-container>
	</header>

  <main>
      <div class="wrapper">
        <div class="divider"></div>
           <section class="noticias">
    


  
<form method="post" action="#" style="border: solid; border-color: #fff; display: block; align-content: center; border-radius: 30px; padding: 25px; margin-left: 50%; margin-right: 50%;">
     <input type="text" name="usuario" placeholder="Usuário" required>
     <input type="password" id="senha" name="senha" placeholder="Senha" required>

   <!--  <input type="email" name="email" placeholder="Seu email" required>  -->
     

     <div class="g-recaptcha" data-sitekey="YOUR SITE KEY"></div>
     
     <input type="submit" name="submit" value="Login" style="width: 80%;">
    
    </form>

    <div class="status">
      <?php
        if (isset($_POST['submit']))
        {
          $user = $_POST['usuario'];
          $senha = $_POST['senha'];
         
          $secretKey = "YOUR SECRET KEY HERE";
          $responseKey = $_POST['g-recaptcha-response'];
          $UserIP = $_SERVER['REMOTE_ADDR'];
          $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

          $response = file_get_contents($url);
          $response = json_decode($response);
          #validar captcha
          if ($response->success) {
            #Validar usuário e senha
            if ($user == "admin" && $senha == "admin") {   
              echo "<script>location.href='sucesso.html';</script>";
              }
            else {
              echo "<span>Usuário/Senha inválidos, tente novamente</span>"; 
            }

          }
          else {
            echo "<span>Captcha inválido, tente novamente</span>"; 
          }
        }


      ?>
    </div>
  </div>

</section>
</div>
</main>


</body>

</html>
