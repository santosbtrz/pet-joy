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
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    

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
        <a href="#">HOME</a>
        <a href="loja.php">LOJA</a>
      </div>
      <div class="logo"><img src="images/petjoy-icon.png" alt="" onclick="redirecionar()"/></div>
      <div class="menu-right">
        <a href="consulta.php">SERVIÇOS</a>
        <a href="contato.php">CONTATO</a>
      </div>

      <div class="menu-mobile" id="menu-mobile">
        <a href="#">HOME</a>
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

    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            class="d-block w-100"
            src="images/banner-img1.png"
            alt="Primeiro Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="images/banner-img2.png"
            alt="Segundo Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="images/banner-img3.png"
            alt="Terceiro Slide"
          />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>

    <div class="banner">
      <div class="banner-frete">
        <h2>FRETE GRÁTIS</h2>
        <div class="repeat-frete">
          FRETE GRÁTIS FRETE GRÁTIS FRETE GRÁTIS
        </div>
        <h3>
          Em compras acima de R$150,00, o frete é grátis para todas as regiões!
        </h3>
        <div class="ctn-frete">
          <p>APROVEITE<br /><span style="letter-spacing: 4px; font-weight: bold">AGORA!</span></p>
          <img src="images/truck-icon.png" alt="" />
          <button class="btn-frete" onclick="window.location.href='loja.php'">Acessar loja</button>
        </div>
      </div>
      <div class="banner-nwl">
        <h2>NEWSLETTER</h2>
        <div class="repeat-nwl">
          NEWSLETTER NEWSLETTER NEWSLETTER
        </div>
        <h3>
          se inscreva para receber descontos, notícias do mundo pet, novidades
          da loja e muito mais!
        </h3>
        <div class="ctn-nwl">
          <form action="processa_nwl.php" method="post">
            <img src="images/email-icon.png" alt="" class="icon-nwl" />
            <input type="email" name="email" placeholder="Digite seu email" required/>
            <button><img src="images/btn-nwl.svg" alt="" class="btn-nwl"></button>
          </form>
        </div>
      </div>
    </div>

    <div class="ctn-loja">
      <div class="title-loja">
      <a href="loja.php" class="link-loja">LOJA</a><img src="images/btn-loja.png" alt="" class="btn-loja1">
      </div>
      <div class="ctn-cat">
        <div class="title-cat">
          <h2>NOSSAS <span> CATEGORIAS</span></h2>
        </div>

        <div class="ctn-carousel">
          <div class="carousel-wrapper">
  
            <div class="ctn-cat-items">
              <div class="ctn-circle cat">
                <img src="images/cat-cat-img.jpg" alt="">
                <div class="circle">
                  <img src="images/cat-cat.png" alt="ícone de categoria de gatos">
                </div>
            </div>
    
            <div class="ctn-circle dog">
              <img src="images/cat-dog-img.jpg" alt="">
                <div class="circle">
                  <img src="images/cat-dog.png" alt="ícone de categoria de cachorros">
                </div>
            </div>
    
            <div class="ctn-circle bird">
              <img src="images/cat-bird-img.jpg" alt="">
                <div class="circle">
                  <img src="images/cat-bird.png" alt="ícone de categoria de pássaros">
                </div>
            </div>

              <div class="ctn-circle fish">
                <img src="images/cat-fish-img.jpg" alt="">
                  <div class="circle">
                    <img src="images/cat-fish.png" alt="ícone de categoria de peixes">
                  </div>
              </div>
    
            <div class="ctn-circle ham">
              <img src="images/cat-ham-img.jpg" alt="">
                <div class="circle">
                  <img src="images/cat-ham.png" alt="ícone de categoria de hamsters">
                </div>
            </div>
    
            <div class="spacer"></div>
          </div>
        </div>
        <button class="btn-carousel prev">‹</button>
        <button class="btn-carousel next">›</button>
      </div>

      <!-- MARCAS PARCEIRAS !-->
      <div class="title-marcas">
        <h2>MARCAS <span> PARCEIRAS</span></h2>
      </div>
        <div class="wrp-marcas">
          <div class="ctn-marcas">
            <div class="box-marca">
              <img src="images/pedigree.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/whiskas.jpg" alt="">
            </div>
            <div class="box-marca">
              <img src="images/hills.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/premier.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/kong.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/frontline.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/pethead.png" alt="">
            </div>
            <div class="box-marca">
              <img src="images/alcon.png" alt="">
            </div>
          </div>
        </div>

      <!-- PRODUTOS EM DESTAQUE !-->
      <div class="ctn-prod">
        <div class="title-prod">
          <h2>PRODUTOS EM <span> DESTAQUE</span></h2>
        </div>
        <div class="ctn-tab">
          <div class="tab-wrapper">
            <div class="tab-buttons">
                <button class="btn-dest" onclick="filterProducts(event, 'prod-fish')">PEIXES</button>

                <button class="btn-dest" onclick="filterProducts(event, 'prod-bird')">PÁSSAROS</button>

                <button class="btn-dest" onclick="filterProducts(event, 'prod-dog')">CACHORROS</button>

                <button class="btn-dest" onclick="filterProducts(event, 'prod-cat')">GATOS</button>

              <button class="btn-dest" id="btn-todos" onclick="filterProducts(event, 'all')">TODOS</button>
            </div>
          </div>
        </div>
        <div class="ctn-crs2">
          <div class="ctn-carousel">
            <div class="carousel-wrapper">
              <div class="prod-card prod-cat">
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              
              </div>
    
              <div class="prod-card prod-dog">
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-cat">
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              

              <div class="prod-card prod-fish">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/peixe-aquario.png  " alt="">
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>
              
    
              <div class="prod-card prod-bird">
                <div class="prod-img">
                  <div class="img-phd">
                    <img src="images/passaro-prod.png " alt="">
                  </div>
                </div>
                <div class="prod-detalhes">
                  <p class="prod-nome">Petisco Zootekna Barritas de Coco para Papagaio e Arara 200g</p>
                  <p class="descricao">à vista</p>
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>

              <div class="prod-card prod-dog">
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
                  <button class="btn-comprar" onclick="window.location.href='loja.php'">COMPRAR</button>
                  <a href="manutencao.html" class="add-lista">adicionar à lista</a>
                </div>
              </div>
              
              
            </div>  
          </div>
        </div>
      
        </div>
      <div class="ctn-btn-loja">
        <div class="acessar-loja">
          <a href="loja.php" class="btn-acessar-loja"><img src="images/acessar-loja.svg" alt=""></a>
        </div>
      </div>
      </div>
    </div>

    <div class="ctn-atendimento">
      <div class="ctn-title">
        <h2>PRECISA AGENDAR UM <span class="atend-title">ATENDIMENTO?</span></h2>
        <div class="ctn-title-txt">
          <p>Sed nisi justo, porta eget magna et, varius congue velit. Fusce libero diam, venenatis ut consequat faucibus, sagittis vel felis. Vestibulum id ligula vitae elit maximus semper. Sed sed mi libero. </p>
        </div>
      </div>
      
      <div class="ctn-servicos">
        <div class="title-servicos">
          <h3>NOSSOS <span>SERVIÇOS</span></h3>
        </div>
      </div>

      <div class="ctn-wpr">
        <div class="opcoes-servicos">
          <div class="servicos-wpr">
            <div class="ctn-vet">
              <img src="https://th.bing.com/th/id/R.e22f94d3431058266818d986751f6b4a?rik=DDTISFHOxeQGvg&pid=ImgRaw&r=0" onclick="redParametro('veterinário')" alt="">
              <p>veterinário</p>
            </div>
            <div class="ctn-banho">
              <img src="https://img.freepik.com/fotos-gratis/processo-de-lavagem-cachorro-pequeno-se-senta-na-mesa-castracao-de-caes-por-um-profissional_1157-48817.jpg?t=st=1727218716~exp=1727222316~hmac=32dd206989a8eec9abfdca53599c790288351656b5c91cc409b7d6234e528231&w=996" onclick="redParametro('banho')" alt="">
              <p>banho & tosa</p>
            </div>
          </div>
          <div class="ctn-hosp">
            <img src="https://3.bp.blogspot.com/-1aN-oEWTKMU/XwWxmRK9FHI/AAAAAAAA5sk/XNUO_pSe7aQs8_NXZi3jjT1FpQykuTemQCLcBGAsYHQ/s1600/_MG_3659.JPG" onclick="redParametro('hospedagem')" alt="">
            <p>hospedagem</p>
          </div>
        </div>
      </div>

      <div class="ctn-func">
        <div class="title-func">
          <h3>FUNCIONAMENTO</h3>
        </div>
        <div class="ctn-etapas">
          <div class="ctn-etapa">
            <div class="title-etapa">
              <img src="images/agendar-icone.png" alt="">
              <p>1. AGENDAR</p>
            </div>
            <div class="txt-etapa">
              <p>Sed nisi justo, porta eget magna et, varius congue velit. Fusce libero diam, venenatis ut consequat.

                Aenean tellus libero, luctus non quam sed, imperdiet tincidunt sem. Cras vitae pretium urna. Integer.
                </p>
            </div>
          </div>

          <div class="ctn-etapa">
            <div class="title-etapa">
              <img src="images/comparecer-icone.png " alt="">
              <p>2. COMPARECER </p>
            </div>
            <div class="txt-etapa">
              <p>Sed nisi justo, porta eget magna et, varius congue velit. Fusce libero diam, venenatis ut consequat</p>
                <ul>
                  <li>Nulla facilisi</li>
                  <li>Vivamus</li>
                  <li>Neque porro</li>
                </ul>           
                <p>Sed nisi justo, porta eget magna et.</p>
            </div>
          </div> 

          <div class="ctn-etapa">
            
            <div class="title-etapa">
              <img src="images/check-icone.png" alt="">
              <p>3. CHECK-UP</p>
            </div>
            <div class="txt-etapa">
              <p>Sed nisi justo, porta eget magna et, varius congue velit. Fusce libero diam, venenatis  vel felis.</p>
                <ul>
                  <li>Suspendisse potenti</li>
                  <li>Fermentum ipsum</li>
                  <li>Ultricies suscipit</li>
                </ul> 
                <p>Vestibulum id ligula vitae elit maximus semper. Sed sed mi.</p>
            </div>
          </div>

          <div class="ctn-etapa">
            <div class="title-etapa">
              <img src="images/retorno-icone.png" alt="">
              <p>4. RETORNO</p>
            </div>
            <div class="txt-etapa">
              <p>Sed nisi justo, porta eget magna et, varius congue velit. Fusce libero diam, venenatis  vel felis.</p>
              <p>Vestibulum id ligula vitae elit maximus semper. Sed sed mi.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="ctn-vets">
        <div class="title-vet">
          <h3>VETERINÁRIOS ESPECIALIZADOS</h3>
          <div class="title-vet-txt">
            <p>Possuímos atendimento especializado para vários casos, além de profissionais preparados para lidar com os mais diversos tipos de pets! <br>
          </div>
            <hr>
          <span>Agende agora mesmo uma consulta!</span></p>
        </div>
        <div class="out-ctn-esp">
          <div class="ctn-especialistas">
            
            <div class="especialista">
              <div class="img-vet">
                <img src="images/vet-profile.png" alt="">
              </div>
              <div class="content-vet">
                <p>dra. <span>BEATRIZ</span></p>
                <p class="crmv">CRMV 01234</p>
                <ul><li>especialista em <span>RÉPTEIS</span></li></ul>
                <a href="consulta.php"><img src="images/agendar-consulta-btn.png" alt=""></a>
              </div>
            </div>
            <hr>
            <div class="especialista">
              <div class="img-vet">
                <img src="images/vet-profile.png" alt="">

              </div>
              <div class="content-vet">
                <p>dra. <span>ISABELLE</span></p>
                <p class="crmv">CRMV 01234</p>
                <ul><li>especialista em <span>FELINOS</span></li></ul>
                <a href="consulta.php"><img src="images/agendar-consulta-btn.png" alt=""></a>
              </div>
            </div>
            <hr>
            <div class="especialista">
              <div class="img-vet">
                <img src="images/vet-profile.png" alt="">

              </div>
              <div class="content-vet">
                <p>dr. <span>JOHN</span></p>
                <p class="crmv">CRMV 01234</p>
                <ul><li>especialista em <span>PÁSSAROS</span></li></ul>
                <a href="consulta.php"><img src="images/agendar-consulta-btn.png" alt=""></a>
              </div>
            </div>
            <hr>
            <div class="especialista">
              <div class="img-vet">
                <img src="images/vet-profile.png" alt="">
              </div>
              <div class="content-vet">
                <p>dr. <span>RAFAEL</span></p>
                <p class="crmv">CRMV 01234</p>
                <ul><li>especialista em <span>ROEDORES</span></li></ul>
                <a href="consulta.php"><img src="images/agendar-consulta-btn.png" alt=""></a>
              </div>
            </div>
            <hr>

          </div>
          <a href="manutencao.html"><img src="images/mais-vets-button.png" class="btn-mais-vets" alt=""></a>
        </div>

      </div>  
    </div>

    <div class="ctn-contact">
      <hr>
      <div class="ctt-nwl">
        <div class="ctt-nwl-txt">
          <div class="ctt-texts">
            <p>não se esqueça de se inscrever em nossa <span>NEWSLETTER!</span></p>
          </div>
          <div class="ctt-input-nwl">
            <form action="processa_nwl.php" method="post">
              <img src="images/email-icon2.png" alt="" class="icon-nwl" />
              <input type="email" name="email" placeholder="Digite seu email" required/>
              <button><img src="images/btn-nwl.svg" alt="" class="btn-nwl"></button>
            </form>
          </div>  
        </div>
        <hr>
      </div>
    </div>
    <div class="ctn-footer">
      <div class="content-ft">
        <div class="ctn-ft info">
          <h4 class="title-ft info">mais <span>INFORMAÇÕES</span></h4>
          <div class="links-ft info">
            <a href="manutencao.html">link 1</a>
            <a href="manutencao.html">link 2</a>
            <a href="manutencao.html">link 3</a>
          </div>
        </div>
        <div class="ctn-ft social">
          <h4 class="title-ft social">redes <span>SOCIAIS</span></h4>
          <div class="links-ft2 social">
            <a href="https://www.facebook.com/"><img src="images/fb-fticon.png" alt="ícone facebook">Facebook</a>
            <a href="https://www.instagram.com/"><img src="images/insta-fticon.png" alt="ícone instagram">Instagram</a>
            <a href="https://x.com/"><img src="images/twitter-fticon.png" alt="ícone twitter">Twitter</a>
          </div>
        </div>
        <div class="ctn-ft lojas">
          <h4 class="title-ft lojas">nossas <span>LOJAS</span></h4>
          <div class="links-ft lojas">
            <div class="ft-lojas">
              <img src="images/icon-pin.png" alt="">
              <div class="lojas-txt">
                <p>Rua Fictícia, 15 - Bairro</p>
                <p><strong>Rio de Janeiro/RJ</strong></p>
                <p>CEP: 01234-567</p>
              </div>
            </div>

            <div class="ft-lojas">
              <img src="images/icon-pin.png" alt="">
              <div class="lojas-txt">
                <p>Rua Fictícia, 15 - Bairro</p>
                <p><strong>Rio de Janeiro/RJ</strong></p>
                <p>CEP: 01234-567</p>
              </div>
            </div>

            <div class="ft-lojas">
              <img src="images/icon-pin.png" alt="">
              <div class="lojas-txt">
                <p>Rua Fictícia, 15 - Bairro</p>
                <p><strong>Rio de Janeiro/RJ</strong></p>
                <p>CEP: 01234-567</p>
              </div>
            </div>
          </div>
        </div>
        <div class="ctn-ft contato">
          <h4 class="title-ft contato">entre em <span>CONTATO</span></h4>
          <div class="ft-contato">
            <div class="horario-contato">
              <p>todos os dias, exceto feriados</p>
              <p>de 10h às 18h</p>
            </div>
            <div class="contato-1">
              <img src="images/icon-fone.png" alt="">
              <p>(21) 5678-4321</p>
            </div>
            <div class="contato-2">
              <img src="images/icon-wpp.png" alt="">
              <p>(21) 91234-5678</p>
            </div>
            <div class="contato-3">
              <img src="images/icon-email-ctt.png" alt="">
              <p>atendimento@petjoy.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="ctn-ft rodape">
        <p>Pet.Joy S/A - CNPJ 01.234.567/8901-23 - Endereço: Avenida Paris, 84 - Bonsucesso - Rio de Janeiro - RJ - CEP: 21041-020
          Copyright© 2024 Pet.Joy S/A - Todos os direitos reservados</p>
      </div>





    </div>

    




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
      function redParametro(servico) {
        const url = `consulta.php?tipo_servico=${encodeURIComponent(servico)}`;
        window.location.href = url;
      }
      </script>

<script>
  window.addEventListener('DOMContentLoaded', (event) => { 
    document.getElementById('btn-todos').focus({ preventScroll: true }); 
  }); 
</script>

  </body>
</html>
