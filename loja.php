<?php session_start();
$usuarioLogado = isset($_SESSION['usuario']); 
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, max-scale=1.0, shrink-to-fit=no"
    />
    
    <title>Pet.Joy - O melhor hub para seu pet!</title>
    <link href="css/loja.css" rel="stylesheet" type="text/css" />
    

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
        <a href="#">LOJA</a>
    </div>

    <div class="logo"><img src="images/petjoy-icon.png" alt="" onclick="redirecionar()"/></div>
    <div class="menu-right">
        <a href="consulta.php">SERVIÇOS</a>
        <a href="contato.php">CONTATO</a>
    </div>

    <div class="menu-mobile" id="menu-mobile">
        <a href="index.php">HOME</a>
        <a href="#">LOJA</a>
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

    
<div class="ctn-loja">
    <div class="title-loja">
    <h3>LOJA</h3>
</div>

<div class="hr-line"></div>


<div class="banner-contato">
    <img id="categoria-banner" src="images/todas-categorias.png" alt="">
</div>
    
<div class="ctn-main">

    <div class="ctn-categorias">
        <div class="hr-line"></div>
        <div class="lista-categorias">
            <div class="title-categorias">
                <h3>CATEGORIAS</h3>
            </div>
            <div class="ctt-categorias">
                <ul>
                    <li data-category="gatos" data-banner-src="images/gato-categoria.png"><img src="images/cat-cat.png" alt=""><a href="#">Gatos</a></li>
                    <li data-category="cachorros" data-banner-src="images/cachorro-categoria.png"><img src="images/cat-dog.png" alt=""><a href="#">Cachorros</a></li>
                    <li data-category="pássaros" data-banner-src="images/passaro-categoria.png"><img src="images/cat-bird.png" alt=""><a href="#">Pássaros</a></li>
                    <li data-category="peixes" data-banner-src="images/peixe-categoria.png"><img src="images/cat-fish.png" alt=""><a href="#">Peixes</a></li>
                    <li data-category="roedores" data-banner-src="images/roedor-categoria.png"><img src="images/cat-ham.png" alt=""><a href="#">Roedores</a></li>
                    <li><a href="#" id="ver-tudo">Ver tudo</a></li>
                </ul>
            </div>
        </div>
</div>

<div class="ctn-produtos">
    <div class="area-produtos">

        <div class="prod-card prod-cat" data-category="gatos">
            <div class="prod-img">
                <span class="prod-desconto">10% OFF</span>
                <div class="img-phd">
                    <img src="images/areia-gatissimo.png" alt="">
                </div>
            </div>
                <div class="prod-detalhes">
                    <p class="prod-nome">Areia Higiênica Gatíssimo</p>
                    <p class="preco-antigo">R$30,00</p>
                    <p class="preco-novo">R$27,00</p>
                    <p class="parcelamento">em até 3x sem juros</p>
                    <div class="prod-info">
                    <div class="avaliacoes">
                        <img src="images/star-icon.png" alt="" />
                        <p>4.7</p>
                        </div>
                        <span class="line"> | </span>
                        <div class="frete">
                        <img src="images/truck-icon.png" alt="" />
                        <p>grátis!*</p>
                    </div>
                </div>
            <button class="btn-comprar">COMPRAR</button>
            <a href="manutencao.html" class="add-lista">adicionar à lista</a>
        </div>

        

    </div>

    <div class="prod-card prod-dog" data-category="cachorros">
                <div class="prod-img">
                  <span class="prod-desconto">10% OFF</span>
                  <div class="img-phd">
                    <img src="https://www.somospet2pet.com.br/media/catalog/product/cache/eb43e666ee19a5049256b92e563cceb5/M/D/MDRO02986234000185-SKU-00213-2_1.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Ração Golden Special para Cães Adultos Frango e Carne</p>
                  <p class="preco-antigo">R$149,90</p>
                  <p class="preco-novo">R$134,91</p>
                  <p class="parcelamento">em até 6x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-dog" data-category="cachorros">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="https://images.tcdn.com.br/img/img_prod/1089311/racao_golden_formula_caes_filhotes_carne_e_arroz_562_1_7d73f81d47180d14581902b6b88a54c8.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Ração Golden Formula Cães Filhotes - Frango e Arroz</p>
                  <p class="descricao">15kg</p>
                  <p class="preco-novo">R$175,90</p>    
                  <p class="parcelamento">em até 6x sem juros</p>
                  <div class="prod-info">   
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-fish" data-category="peixes">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/peixe-aquario.png" alt=""> 
                  </div>
                </div>  
                <div class="prod-detalhes">
                  <p class="prod-nome">Aquário Boyu Curvo 80 148 Litros Preto Champagne
</p>
                  <p class="descricao">220v</p>
                  <p class="preco-novo">R$3.199,99
  </p>
                  <p class="parcelamento">em até 12x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

                  
              <div class="prod-card prod-bird" data-category="pássaros">
                <div class="prod-img">
                  <span class="prod-desconto">10% OFF</span>
                  <div class="img-phd">
                    <img src="images/passaro-prod.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Petisco Zootekna Barritas de Coco para Papagaio e Arara 200g</p>
                  <p class="preco-antigo">R$44,43</p>
                  <p class="preco-novo">R$39,99</p>
                  <p class="parcelamento">ou em até 2x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-dog" data-category="cachorros">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/prod-gato.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Ração Úmida GranPlus Gourmet Sachê para Cães Adultos Sabor Ovelha - 100g</p>
                  <p class="descricao">à vista</p>
                  <p class="preco-novo">R$3,19</p>
                  <p class="parcelamento">em até 1x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-cat" data-category="gatos">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/petisco-gato.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Petisco Dreamies para Gatos Adultos Sabor Carne 40g</p>
                  <p class="descricao">à vista</p>
                  <p class="preco-novo">R$6,20</p>
                  <p class="parcelamento">ou em até 2x</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-fish" data-category="peixes">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/alimento-peixe.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Alimento para peixe Alcon Guppy
  </p>
                  <p class="descricao">20g</p>
                  <p class="preco-novo">R$25,99
  </p>
                  <p class="parcelamento">em até 1x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-cat" data-category="gatos">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/catnip-gato.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Brinquedo Chalesco Abacate Catnip para Gatos</p>
                  <p class="descricao">1 unid.</p>
                  <p class="preco-novo">R$26,99</p>
                  <p class="parcelamento">em até 1x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-cat" data-category="gatos">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/petisco-gato.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Petisco Dreamies para Gatos Adultos Sabor Carne 40g</p>
                  <p class="descricao">à vista</p>
                  <p class="preco-novo">R$6,20</p>
                  <p class="parcelamento">ou em até 2x</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

                  
              <div class="prod-card prod-dog" data-category="cachorros">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/shampoo-dog.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Shampoo Fresh Care Peles Sensíveis para Cães </p>
                  <p class="descricao">500ml</p>
                  <p class="preco-novo">R$14,39</p>
                  <p class="parcelamento">em até 1x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-bird" data-category="pássaros">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/poleiro-passaro.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Poleiro Monaco para Calopsita </p>
                  <p class="descricao">Lilás</p>
                  <p class="preco-novo">R$ 189,99</p>
                  <p class="parcelamento">ou em até 4x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              
              <div class="prod-card prod-ham" data-category="roedores">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/gaiola-ham.png" alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Gaiola para Roedores Quatiguá Home Tubo para Hamsters</p>
                  <p class="descricao">Azul</p>
                  <p class="preco-novo">R$227,99</p>
                  <p class="parcelamento">em até 5x sem juros</p>
                  <div class="prod-info">
                    <div class="avaliacoes">
                      <img src="images/star-icon.png" alt="" />
                      <p>4.7</p>
                    </div>
                    <span class="line"> | </span>
                    <div class="frete">
                      <img src="images/truck-icon.png" alt="" />
                      <p>grátis!*</p>
                    </div>
                  </div>
                  <button class="btn-comprar">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

</div>


<script src="script.js"></script>
</body>

