<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $senha = htmlspecialchars(trim($_POST['senha']));
    $senha_2 = htmlspecialchars(trim($_POST['senha_2']));

    if ($senha !== $senha_2) {
        echo "As senhas não coincidem.";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
        $data_nascimento = htmlspecialchars(trim($_POST['data_nascimento']));
        $genero = htmlspecialchars(trim($_POST['genero']));
        $cep = htmlspecialchars(trim($_POST['cep']));
        $rua_logradouro = htmlspecialchars(trim($_POST['rua_logradouro']));
        $numero = htmlspecialchars(trim($_POST['numero']));
        $complemento = htmlspecialchars(trim($_POST['complemento']));
        $bairro = htmlspecialchars(trim($_POST['bairro']));
        $cidade = htmlspecialchars(trim($_POST['cidade']));
        $estado_uf = htmlspecialchars(trim($_POST['estado_uf']));
        $referencia = htmlspecialchars(trim($_POST['referencia']));
        $nome_pet = htmlspecialchars(trim($_POST['nome_pet']));
        $raca = htmlspecialchars(trim($_POST['raca']));
        $especie = htmlspecialchars(trim($_POST['especie']));
        $idade = htmlspecialchars(trim($_POST['idade']));
        $peso = htmlspecialchars(trim($_POST['peso']));
        $genero_pet = isset($_POST['genero_pet']) ? htmlspecialchars(trim($_POST['genero_pet'])) : '';
        $observacoes = htmlspecialchars(trim($_POST['observacoes']));

        try {
            $sql = "INSERT INTO usuarios (nome, email, telefone, senha, data_nasc, genero, cep, rua, numero, complemento, bairro, cidade, estado_uf, referencia, nome_pet, raca, especie, idade, peso, genero_pet, observacoes)
                    VALUES (:nome, :email, :telefone, :senha, :data_nascimento, :genero, :cep, :rua_logradouro, :numero, :complemento, :bairro, :cidade, :estado_uf, :referencia, :nome_pet, :raca, :especie, :idade, :peso, :genero_pet, :observacoes)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':senha', $senha_hash);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':rua_logradouro', $rua_logradouro);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado_uf', $estado_uf);
            $stmt->bindParam(':referencia', $referencia);
            $stmt->bindParam(':nome_pet', $nome_pet);
            $stmt->bindParam(':raca', $raca);
            $stmt->bindParam(':especie', $especie);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':genero_pet', $genero_pet);
            $stmt->bindParam(':observacoes', $observacoes);

            if ($stmt->execute()) {
                echo "Registro efetuado com sucesso.";
            } else {
                echo "Erro ao registrar.";
            }
        } catch(PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Formulário Login</title>

    <style>
        input[type=number]::-webkit-outer-spin-button, 
        input[type=number]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; },
        input[type=number] { -moz-appearance: textfield; } 
    </style>

<script> 
    function redirecionar() { 
        window.location.href = "index.php";} 
</script>

<script> 
function buscarCEP() { 
    var cep = document.getElementById('cep').value; 
    if (cep.length === 8) 
        { fetch(`https://viacep.com.br/ws/${cep}/json/`) 
            .then(response => response.json()) 
            .then(data => {
                if (!('erro' in data)) {
                    document.getElementById('rua_logradouro').value = data.logradouro; 
                    document.getElementById('bairro').value = data.bairro; 
                    document.getElementById('cidade').value = data.localidade; 
                    document.getElementById('estado_uf').value = data.uf; 
                } else { 
                    alert("CEP não encontrado!");
                }
            }) 
            .catch(error => console.error('Erro ao buscar endereço:', error)); 
        } 
} 
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
        <a href="contato.html">CONTATO</a>
    </div>

    <div class="menu-mobile" id="menu-mobile">
        <a href="index.php">HOME</a>
        <a href="loja.php">LOJA</a>
        <a href="consulta.php">SERVIÇOS</a>
        <a href="contato.html">CONTATO</a>
    </div>

    <div class="profile">
        <div class="profile-icon">
    <a href="login.html"><img src="images/profile-icon.png" alt="" /></a>
        </div>
    </div>
    </nav>




    
    <div class="ctn-main">
        <div class="form-serv <?php echo $successClass; ?>">
            <div class="ctn-form-serv">
                <img src="images/icon-voltar.svg" alt="">
                <a href="index.php">voltar para home</a>
            </div>
            <div class="form-title">
                <h2>REGISTRO</h2>
            </div>

        <form action="cadastro.php" method="POST" id="form">
                <div class="pre-form">

                    <p>Faça seu cadastro em nosso site e aproveite <b>benefícios exclusivos!</b></p>

                    <p>Ao se cadastrar, você terá acesso a <b>descontos especiais</b> e <b>ofertas exclusivas</b> na nossa loja, além de <b>facilidade</b> na reserva de serviços como <b>consultas, banho, tosa e hospedagem.</b></p>
                    
                    <p><b>Junte-se ao Clube Pet.Joy!</b></p>

                </div>
                <div class="hr-line"></div>

                <div class="ctn-dados">

                    <h3>DADOS PESSOAIS</h3>

                    <div class="inputbox">
                        <label for="nome" class="labelnovo">nome completo*</label>    
                        <input type="text" id="nome" name="nome" min-lenght="2" required>
                    </div>
                    
                    <div class="inputbox">
                        <label for="email">e-mail:*</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="double-info">
                        <div class="inputbox">
                            <label for="data_nascimento">data de nascimento:*</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                        </div>
                        <div class="inputbox">
                            <label for="telefone">celular/telefone:*</label>
                            <input type="tel" id="telefone" name="telefone" max-lenght="15" required>
                        </div>
                    </div>

                    
                    <label for="genero">gênero:* </label>

                    <select id="genero" name="genero" required>
                        <option value="option" disabled selected>selecione uma opção</option>
                        <option value="feminino">feminino</option>
                        <option value="masculino">masculino</option>
                        <option value="outros">outros</option>
                    </select>

                    <div class="inputbox">
                        <label for="senha" class="senha">crie uma senha</label>
                        <div class="input-ctn">
                            <input 
                            type="password" 
                            name="senha" 
                            id="senha" 
                            class="inputUser" 
                            required>
                            <button type="button" class="mostrarSenha" id="mostrarSenha"> <i class="fas fa-eye"></i> </button>
                        </div>
                        <ul id="password-conditions" style="display: none;">
                        <li id="min-length">Mínimo de <b>8 caracteres</b></li>
                        <li id="uppercase">Deve ter pelo menos uma <b>letra maiúscula</b></li>
                        <li id="lowercase">Deve ter pelo menos uma <b>letra minúscula</b></li>
                        </ul>
                    </div>

                    <div class="inputbox">
                        <label for="senha" class="labelnovo">confirme a senha</label>
                        <input type="password" name="senha_2" id="senha_2" class="inputUser" required>
                        <div id="senha-error" style="display: none;">As senhas não coincidem.</div>
                    </div>

                    
                </div>     

                <div class="hr-line-dash"></div>

                <div class="endereco">
                    <h3>ENDEREÇO</h3>

                    <div class="inputbox">
                        <label for="cep" class="labelnovo">CEP*</label>
                        <input type="number" name="cep" id="cep" class="inputUser" onblur="buscarCEP()" required>
                    </div>

                    <div class="rua-numero">
                        <div class="inputRua">
                            <label for="rua_logradouro" class="labelnovo">rua/logradouro*</label>
                            <input type="text" name="rua_logradouro" id="rua_logradouro" class="inputUser" required>
                        </div>
                    
                        <div class="inputNum">
                            <label for="numero" class="labelnovo">número*</label>
                            <input type="number" name="numero" id="numero" class="inputUser" required>
                        </div>
                    </div>
                    <div class="comp-bairro">
                        <div class="inputComp">
                            <label for="complemento" class="labelnovo">complemento*</label>
                            <input type="text" name="complemento" id="complemento" class="inputUser">
                            
                        </div>
                        
                        <div class="inputBairro">
                            <label for="bairro" class="labelnovo">bairro*</label>   
                            <input type="text" name="bairro" id="bairro" class="inputUser" required>
                            
                        </div>
                    </div>
                    
                    <div class="cid-est">
                        <div class="inputCid">
                            <label for="cidade" class="labelnovo">cidade*</label>
                            <input type="text" name="cidade" id="cidade" class="inputUser" required>
                        </div>
                        
                        <div class="inputEst">
                            <label for="estado_uf"class="labelnovo">estado/UF*</label>
                            <input type="text" name="estado_uf" id="estado_uf" class="inputUser" required>
                        </div>
                    </div>
                    
                    <div class="inputbox">
                        <label for="referencia"class="labelnovo">referência</label>
                        <input type="text" name="referencia" id="referencia" class="inputUser">

                    </div>
                </div>

                <div class="hr-line-dash"></div>          
                
                <div class="cadastro-pet">

                    <h3>CADASTRO DE PETS</h3>

                    <div class="inputbox">
                        <label for="nome_pet" class="labelnovo">nome do pet*</label>
                        <input type="text" name="nome_pet" id="nome_pet" class="inputUser" required>
                    </div>

                    <div class="raca-esp">
                    
                        <div class="inputbox">
                            <label for="raca" class="labelnovo">raça*</label>
                            <input type="text" name="raca" id="raca" class="inputUser" required>

                        </div>
                        
                        <div class="inputbox">
                            <label for="especie">espécie*</label>
                            
                            <select id="especie" name="especie" required>
                                <option value="option" disabled selected>selecione um tipo</option>
                                <option value="felino">Felino</option>
                                <option value="canino">Canino</option>
                                <option value="roedor">Roedor</option>
                                <option value="passaro">Pássaro</option>
                                <option value="reptil">Réptil</option>
                            </select>
                        </div>

                    </div>

                    <div class="dados-pet">
                        <div class="inputIdade">
                            <label for="idade" class="labelnovo">idade* <br> (anos)</label>
                            <input type="number" name="idade" id="idade" class="inputUser" required>
                        </div>
                        
                        <div class="inputPeso">
                            <label for="peso" class="labelnovo">peso* <br> (kg)</label>
                            <input type="number" name="peso" id="peso" class="inputUser" required>
                        </div>
                        
                        <div class="inputGen">
                            <label id="genero_pet" class="inputUser" for="genero_pet"> ‎ <br> gênero* </label>
                                <select class="inputbox" name="genero_pet" required>
                                    <option value="option" disabled selected>selecione uma opção</option>
                                    <option value="macho">macho</option>
                                    <option value="femea">fêmea</option>
                                </select>
                        </div>
                    </div>
                    
                    <div class="inputbox">
                        <label for="observacoes" class="labelnovo">observações</label>
                        <input type="text" name="observacoes" id="observacoes" class="inputUser">
                    </div>
                </div>
                
                <div class="hr-line-dash"></div>

                <div class="checkboxes">
                    <input type="checkbox" id="termosCheckbox" class="custom-checkbox"> 
                    <label for="termosCheckbox" class="custom-label">você concorda com nossos termos e políticas e entende como seus dados serão usados?*</label>
                    <span class="error" id="termosErro">Você deve aceitar os termos e condições.</span>
                    
                    <input type="checkbox" id="newsletterCheckbox" class="custom-checkbox"> 
                    <label for="newsletterCheckbox" class="custom-label">você aceita receber nossa newsletter em sua caixa de email contendo novidades, promoções, dicas e lembretes?</label>
                </div>
                
                <div class="ctn-btn-cadastro">
                    <button type="submit" id="submit">Registrar-se</button>
                    </div>
        </form>

    <script src="script.js"></script>
    <script>
    termosCheckbox.addEventListener('change', function() { 
    if (termosCheckbox.checked) { 
        termosErro.style.display = 'none'; 
    }
    });

    document.getElementById('form').addEventListener('submit', function(event) {
    if (!termosCheckbox.checked) { 
        termosErro.style.display = 'block'; 
        event.preventDefault();
        } else { 
        termosErro.style.display = 'none'; 
        }
}); 
</script>

<script>
document.getElementById('form').addEventListener('submit', function(event) {
    var senha = document.getElementById('senha').value;
    var senha_2 = document.getElementById('senha_2').value;
    var senhaErrorDiv = document.getElementById('senha-error');
    
    if (senha !== senha_2) {
        senhaErrorDiv.style.display = 'block';
        event.preventDefault(); // Impede o envio do formulário
    } else {
        senhaErrorDiv.style.display = 'none';
    }
});
</script>


</body>
</html>






