<?php session_start();
$usuarioLogado = isset($_SESSION['usuario']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetJoy - Contato</title>

  <link href="css/contato.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>

    <script> 
      function redirecionar() { 
          window.location.href = "index.php";} 
      </script>
</head>

<body>
  <nav>
    <div class="hamburger" id="hamburger" onclick="toggleMenu()">
      <div></div>
      <div></div>
      <div></div>
    </div>

    <div class="menu-left">
      <a href="index.php">HOME</a>
      <a href="loja.php">LOJA</a>
    </div>
    <div class="logo"><img src="images/petjoy-icon.png" alt="" onclick="redirecionar()"/></div>
    <div class="menu-right">
      <a href="consulta.php">SERVIÇOS</a>
      <a href="contato.php">CONTATO</a>
    </div>

    <div class="menu-mobile" id="menu-mobile">
      <a href="index.php">HOME</a>
      <a href="loja.php">LOJA</a>
      <a href="consulta.php">SERVIÇOS</a>
      <a href="contato.php">CONTATO</a>
    </div>

    <div class="profile">
    <div class="profile-icon">
          <a href="login.html"><img src="images/profile-icon.png" alt="" /></a>
          <a href="login.html" class="<?php echo $usuarioLogado ? 'hidden' : '' ; ?>">entrar</a>

          <div class="login-content">
            <p class="<?php echo $usuarioLogado ? '' : 'hidden'; ?>">
              olá, <?php echo htmlspecialchars($_SESSION['usuario'] ?? ''); ?>! 
            </p>

            <p class="<?php echo $usuarioLogado ? '' : 'hidden'; ?>">
              não é você? <a href="logout.php">sair</a> 
            </p>
          </div>
        </div>
        
      </div>
    </div>
  </nav>
  <div class="banner-contato">
    <img src="images/banner-contato.png" alt="">
  </div>
  <main>
    <div class="container-contato">
      <div class="title-contato">
        <h2>CONTATO</h2>
      </div>
      <div class="hr-line"></div>
      <div class="form-contato">
        <form action="processa_contato.php" method="POST">
          <label for="name">Nome:* </label>
          <input type="text" name="name" placeholder="Como devemos lhe chamar?" required>

          <label for="email">E-mail:* </label>
          <input type="email" name="email" placeholder="Servirá para responder sua solicitação!" required>

          <label for="assunto">Assunto:* </label>
          <select id="assunto" name="assunto" required>
            <option value="option" disabled selected>Sobre o que deseja falar?</option>
            <option value="duvida">Dúvida</option>
            <option value="elogio">Elogio</option>
            <option value="reclamacao">Reclamação</option>
            <option value="sugestao">Sugestão</option>
            <option value="veterinario">Serviços Veterinários</option>
            <option value="assistencia">Assistência</option>
            <option value="outros">Outros</option>
          </select>

          <label for="message">Mensagem:* </label>
          <textarea name="message" rows="5" placeholder="Aqui vai o seu texto!" required></textarea>

          <div class="button-contato">
            <button type="submit">Enviar</button>
          </div>
        </form>

      </div>
    </div>
  </main>
  <script src="script.js"></script>
</body>
</html> 