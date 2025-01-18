<?php session_start();
$usuarioLogado = isset($_SESSION['usuario']);
require_once 'db_connection.php';
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/consulta.css">

    <title>Pet.Joy - Formulário de Consulta</title>

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
</nav>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$successClass = 'success-border-radius';
require_once 'db_connection.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na configuração do PDO: " . $e->getMessage();
}

$petjoy_email = "assist.petjoy@gmail.com";

?>

<div class="ctn-main">
    <div class="form-serv <?php echo $successClass; ?>">
        <div class="ctn-form-serv">
            <img src="images/icon-voltar.svg" alt="">
            <a href="consulta.php">voltar para serviços</a>
        </div>
        <div class="form-title">
            <h2>Solicitação de Serviço Veterinário</h2>
        </div>

        <?php
        $successClass = '';
        $hideForm = false;
        $error_message = '';
        $veterinario = '';
        $tipoServico = '';

        if (isset($_GET['tipo_servico'])) {
            $tipoServico = htmlspecialchars($_GET['tipo_servico']);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars(trim($_POST['nome']));
            $email = htmlspecialchars(trim($_POST['email']));
            $telefone = htmlspecialchars(trim($_POST['telefone']));
            $pet_nome = htmlspecialchars(trim($_POST['pet_nome']));
            $tipo_servico = isset($_POST['tipo_servico']) ? htmlspecialchars(trim($_POST['tipo_servico'])) : '';
            $mensagem = htmlspecialchars(trim($_POST['mensagem']));
            $pet_tipo = htmlspecialchars(trim($_POST['pet_tipo']));

            $servicos = [
                'consulta' => 'Consulta Veterinária',
                'vacina' => 'Vacinação',
                'exame' => 'Exame de Rotina',
                'banho' => 'Banho/Tosa',
                'hospedagem' => 'Hospedagem'
            ];
            
            if ($pet_tipo == 'felino') {
                $veterinario = 'Dra. Isabelle';
            } elseif ($pet_tipo == 'canino') {
                $veterinario = 'Dr. Pedro';
            } elseif ($pet_tipo == 'passaro') {
                $veterinario = 'Dr. John';
            } elseif ($pet_tipo == 'roedor') {
                $veterinario = 'Dr. Rafael';
            } elseif ($pet_tipo == 'reptil') {
                $veterinario = 'Dra. Beatriz';
            } else {
                $veterinario = 'Veterinário não encontrado';
            }

            $cortarNome = explode(' ', $nome);
            $primeiroNome = $cortarNome[0];

            if (empty($nome) || empty($email) || empty($telefone) || empty($pet_nome) || empty($tipo_servico) || empty($pet_tipo)) {
                $error_message = "Por favor, preencha todos os campos.";
            } else {
                if (array_key_exists($tipo_servico, $servicos)) {
                    $tipo_servico_texto = $servicos[$tipo_servico];

                    try {
                        $sql = "INSERT INTO agendamentos (nome_cliente, nome_animal, telefone_contato, email_contato, veterinario_responsavel, tipo_servico, detalhes_adicionais) VALUES (:nome, :pet_nome, :telefone, :email, :veterinario, :tipo_servico, :mensagem)";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':nome', $nome);
                        $stmt->bindParam(':pet_nome', $pet_nome);
                        $stmt->bindParam(':telefone', $telefone);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':veterinario', $veterinario);
                        $stmt->bindParam(':tipo_servico', $tipo_servico_texto);
                        $stmt->bindParam(':mensagem', $mensagem);

                        if ($stmt->execute()) {
                            // Enviar e-mail para a PetJoy
                            $mail = new PHPMailer(true);

                            try {
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'assist.petjoy@gmail.com';
                                $mail->Password = 'nyjiuqvuoygeqwcm'; // Substitua pela senha correta
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587;

                                $mail->setFrom('assist.petjoy@gmail.com', 'PET.JOY');
                                $mail->addAddress('assist.petjoy@gmail.com');

                                $mail->isHTML(true);
                                $mail->Subject = "NOVO AGENDAMENTO: $tipo_servico_texto";
                                $mail->Body = "Nome: $nome<br>Email: $email<br>Telefone: $telefone<br>Nome do Pet: $pet_nome<br>Tipo de Pet: $pet_tipo<br>Tipo de Serviço: $tipo_servico_texto<br>Mensagem:<br>$mensagem";
                                $mail->AltBody = "Nome: $nome\nEmail: $email\nTelefone: $telefone\nNome do Pet: $pet_nome\nTipo de Pet: $pet_tipo\nTipo de Serviço: $tipo_servico_texto\nMensagem:\n$mensagem";

                                $mail->send();

                            } catch (Exception $e) {
                            
                            }

                            echo "<br>";
                            echo "<h2>Obrigado(a), $primeiroNome!</h2>";
                            echo "<div class='ctn-txt-success'>";
                            echo "<p class='txt-success'>Recebemos sua solicitação de serviço para o/a <span>" . strtoupper($pet_nome) . "</span>.</p><br>";
                            echo "<p>Entraremos em contato pelo telefone <strong>$telefone</strong> ou e-mail <strong>$email</strong> para marcar a data e horário do atendimento.</p><br>";
                            echo "<p><strong>INFORMAÇÕES DO PEDIDO DE CONSULTA:</strong></p><br>";
                            echo "<p>Veterinário Responsável: <strong>$veterinario</strong></p>";
                            echo "<p>Tipo de serviço solicitado: <strong>$tipo_servico_texto</strong></p>";
                            echo "<p>Detalhes adicionais: <strong>$mensagem</strong></p>";
                            echo "</div>";
                            echo "</div>";
                            $hideForm = true;
                            $successClass = 'success-border-radius';
                        } else {
                            $error_message = "Erro ao inserir dados.";
                        }
                    } catch (PDOException $e) {
                        $error_message = "Erro: " . $e->getMessage();
                    }
                }
            }
        }
        ?>

        <?php if ($error_message): ?>
            <div class='error-message'><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <form id="servicoForm" action="" method="POST" class="<?php echo $hideForm ? 'hidden' : ''; ?>">
            <label for="nome">nome do tutor*</label>
            <input type="text" id="nome" name="nome" min-lenght="2">

            <label for="email">e-mail:*</label>
            <input type="email" id="email" name="email">

            <label for="telefone">telefone:*</label>
            <input type="tel" id="telefone" name="telefone" max-lenght="15">

            <label for="pet_tipo">tipo de pet:*</label>
            <select id="pet_tipo" name="pet_tipo" required>
                <option value="option" disabled>Selecione um tipo</option>
                <option value="felino">Felino</option>
                <option value="canino" >Canino</option>
                <option value="roedor" >Roedor</option>
                <option value="passaro">Pássaro</option>
                <option value="reptil">Réptil</option>
            </select>

            <label for="pet_nome">nome do pet:*</label>
            <input type="text" id="pet_nome" name="pet_nome" required >

            <label for="tipo_servico">tipo de serviço:*</label>
            <select id="tipo_servico" name="tipo_servico" required>
                <option value="option" disabled <?php echo $tipoServico === '' ? 'selected' : ''; ?>>Selecione um serviço</option>
                <option value="consulta" <?php echo $tipoServico === 'consulta' ? 'selected' : ''; ?>>Consulta Veterinária</option>
                <option value="vacina" <?php echo $tipoServico === 'vacina' ? 'selected' : ''; ?>>Vacinação</option>
                <option value="exame" <?php echo $tipoServico === 'exame' ? 'selected' : ''; ?>>Exame de Rotina</option>
                <option value="banho" <?php echo $tipoServico === 'banho' ? 'selected' : ''; ?>>Banho/Tosa</option>
                <option value="hospedagem" <?php echo $tipoServico === 'hospedagem' ? 'selected' : ''; ?>>Hospedagem</option>
            </select>

            <label for="mensagem">Descrição do Problema:</label>
            <textarea id="mensagem" name="mensagem" rows="3"></textarea>

            <div class="ctn-btn-serv">
                <button type="submit">SOLICITAR SERVIÇO</button>
            </div>
        </form>
    </div>
</div>


    <script>
        const tel = document.getElementById('telefone');

        const mascaraTelefone = (valor) => {
            valor = valor.replace(/\D/g, "");
            valor = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
            return valor;
        }

        tel.addEventListener('input', (event) => {
            let valor = event.target.value;
            event.target.value = mascaraTelefone(valor);
        });

        document.getElementById('servicoForm').addEventListener('submit', function(event) {
            alert('Formulário validado! Enviando...');

            const name = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const telefone = document.getElementById('telefone').value;
            const nomePet = document.getElementById('pet_nome').value
            const servico = document.getElementById('tipo_servico').value;
            const tipoPet = document.getElementById('pet_tipo').value;

            if (name && email && telefone && nomePet && servico && tipoPet) {
                document.getElementById('servicoForm').classList.add('hidden');
            }
        });
        </script>

        

        
    <script src="script.js"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"
    ></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"
    ></script>
    <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"
    ></script>
    <script>
        function obterParametro(nome) {
            const params = new URLSearchParams(window.location.search);
            return params.get(nome);
        }

        const tipoServico = obterParametro('tipo_servico');
        if (tipoServico) {
            const select = document.getElementById('tipo_servico');
            const option = Array.from(select.options).find(opt => opt.value === tipoServico);
            if (option) {
                option.selected = true;
            }
        }
    </script>

</body>
</html>


