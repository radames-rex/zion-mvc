<?php if ( ! defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página não encontrada! | Hamsáh - Fashion Geek</title>
    <link href="<?php echo HOME_URL;?>/views/_img/favicon404.png" rel="SHORTCUT ICON" />
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/views/_css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/views/_css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/views/_css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/views/_css/style.css">
    <link rel="stylesheet" href="<?php echo HOME_URL;?>/views/_css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="<?php echo HOME_URL;?>/minha-conta/"><i class="fa fa-user"></i> Minha Conta</a></li>
                            <!-- <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li> -->
                            <li><a href="<?php echo HOME_URL;?>/login/"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="<?php echo HOME_URL;?>/cadastre-se/"><i class="fa fa-users"></i> Cadastre-se</a></li>
                            <li><a href="<?php echo HOME_URL;?>/favoritos/"><i class="fa fa-heart"></i> Favoritos</a></li>
                            <li><a href="<?php echo HOME_URL;?>/meu-carrinho/"><i class="fa fa-shopping-cart"></i> Meu Carrinho</a></li>                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Moeda :</span><span class="value">R$ </span><b class="caret"></b></a>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Linguagem :</span><span class="value">Português </span><b class="caret"></b></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?php echo HOME_URL;?>" style='font-family: "kaushan";color: black;'>                            
                            <img src="<?php echo HOME_URL;?>/views/_img/logo.png" style="height:106px;border:6px white double;">
                            <!--<span style="font-size:0.3em;font-family:verdana;color:black">EASY FASHION</span>-->
                        </a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?php echo HOME_URL;?>/meu-carrinho/">Carrinho - <span class="cart-amunt">R$0</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo HOME_URL;?>">Home</a></li>
                        <li class="dropdown">
                          <a href="<?php echo HOME_URL;?>/moda-feminina/">Moda Feminina</a>
                          <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/bottom-feminino/" class="dropdown-toggle" data-toggle="dropdown" >Bottom</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/saias/">Saias</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/shorts/">Shorts</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/bermudas-femininas/">Bermudas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/calcas-femininas/">Calças</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/macacao/">Macacão</a></li>
                                </ul>    
                            </li>  
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/top-feminino/">Top</a>  
                                <ul class="dropdown-menu">                                                                               
                                    <li><a href="<?php echo HOME_URL;?>/blusas/">Blusas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/regatas-femininas/">Regatas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/camisetas-femininas/">Camisetas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/camisas-femininas/">Camisas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/coletes-femininos/">Coletes</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/casacos/">Casacos</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/moletons-femininos/">Moletons</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/vestidos/">Vestidos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/intima-feminina/" class="dropdown-toggle" data-toggle="dropdown" >Íntima</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/calcinhas/">Calcinhas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/sutias/">Sutiãs</a></li>
                                </ul>    
                            </li>       
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="<?php echo HOME_URL;?>/moda-masculina">Moda Masculina</a>
                          <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/bottom-masculino/" class="dropdown-toggle" data-toggle="dropdown" >Bottom</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/bermudas-masculinas/">Bermudas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/calcas-masculinas/">Calças</a></li>
                                </ul>    
                            </li>  
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/top-masculino/">Top</a>  
                                <ul class="dropdown-menu">                                                                               
                                    <li><a href="<?php echo HOME_URL;?>/camisetas-masculinas/">Camisetas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/camisas-masculinas/">Camisas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/polo/">Polo</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/intima-masculina" class="dropdown-toggle" data-toggle="dropdown" >Íntima</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/cuecas/">Cuecas</a></li>
                                </ul>    
                            </li>       
                          </ul>
                        </li>                        
                        <li class="dropdown">
                          <a href="<?php echo HOME_URL;?>/mundo-geek/">Mundo Geek</a>
                          <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/acessorios/" class="dropdown-toggle" data-toggle="dropdown" >Acessórios</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/almofadas-de-pescoco/">Almofadas de Pescoço</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/canecas/">Canecas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/chaveiros/">Chaveiros</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/colares/">Colares</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/pulseiras/">Pulseiras</a></li>
                                </ul>    
                            </li>  
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/camisas-geek/">Camisas</a>  
                                <ul class="dropdown-menu">                                                                               
                                    <li><a href="<?php echo HOME_URL;?>/camisas-estampadas/">Estampadas</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/camisas-3d/">3D</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/camisas-hamsah/">Hamsáh</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/colecionaveis/" class="dropdown-toggle" data-toggle="dropdown" >Colecionáveis</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/action-figures/">Action Figures</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/bonecos/">Bonecos</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/funko-pop/">Funko POP</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/pelucias/">Pelúcias</a></li>
                                </ul>    
                            </li>    
                            <li class="dropdown-submenu">
                                <a href="<?php echo HOME_URL;?>/decoracao/" class="dropdown-toggle" data-toggle="dropdown" >Decoração</a>  
                                <ul class="dropdown-menu">                         
                                    <li><a href="<?php echo HOME_URL;?>/adesivos-de-parede/">Adesivos de Parede</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/porta-livros/">Porta Livros</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/prateleira/">Prateleira</a></li>
                                    <li><a href="<?php echo HOME_URL;?>/quadros/">Quadros</a></li>
                                </ul>    
                            </li>    
                          </ul>
                        </li>
                        <li><a href="<?php echo HOME_URL;?>/fashion-geek/">Fashion Geek</a></li>
                        <li><a href="<?php echo HOME_URL;?>/novidades/">Novidades</a></li>                       
                        <li><a href="<?php echo HOME_URL;?>/sobre/">Sobre</a></li>
                        <li class="dropdown">
                            <a href="<?php echo HOME_URL;?>/galeria/">Galeria</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">                         
                                <li><a href="<?php echo HOME_URL;?>/fotos/">Fotos</a></li>
                                <li><a href="<?php echo HOME_URL;?>/videos/">Vídeos</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo HOME_URL;?>/contato/">Contato</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->    

	<div class="product-widget-area" style="background-color:transparent;">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <div class="single-product-widget">                        
                        <div class="col-sm-12 col-md-12">
                            <div class="col-md-12 head-grd-1">
                                <div class="main-emma">
                                    <div class="montain"></div>
                                    <div class="emma-heading">
                                        <h1>ERROR 404</h1>
                                        <div style="font-family:verdana;"> Ops! A página que você está procurando não existe ou não pode ser encontrada! Desculpe-nos pelo incômodo!</div>
                                        <div class="emma-btn">
                                            <a href="<?php echo HOME_URL;?>">VOLTAR A PÁGINA PRINCIPAL</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->      

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span class="paintcans-font">Hamsah - <span style="font-size:14px">Fashion Geek</span></span></h2>
                        <p>Somos uma mistura que deu certo. <br>Quem disse que Geek não pode ter Estilo ou que o Fashion não pode ser Nerd? Nós viemos provar que pode sim. <br>Chega de rótulo! <br>Conheça a Hamsáh - Fashion Geek e encontre a revolução da moda.</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/hamsahfashiongeek" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-google"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Hamsáh </h2>
                        <ul>
                            <li><a href="<?php echo HOME_URL;?>/minha-conta/">Minha Conta</a></li>
                            <li><a href="<?php echo HOME_URL;?>/historia/">História</a></li>
                            <li><a href="<?php echo HOME_URL;?>/favoritos/">Favoritos</a></li>
                            <li><a href="<?php echo HOME_URL;?>/fale-conosco/">Fale Conosco</a></li>
                            <li><a href="<?php echo HOME_URL;?>/trabalhe-conosco/">Trabalhe Conosco</a></li>
                            <li><a href="<?php echo HOME_URL;?>/consultoria/">Consultoria</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Informações</h2>
                        <ul>
                            <li><a href="<?php echo HOME_URL;?>/como-comprar/">Como Comprar</a></li>
                            <li><a href="<?php echo HOME_URL;?>/trocas-e-devolucoes/">Trocas e Devoluções</a></li>
                            <li><a href="<?php echo HOME_URL;?>/perguntas-frequentes/">Perguntas Frequentes</a></li>
                            <li><a href="<?php echo HOME_URL;?>/acompanhe-seus-pedidos/">Acompanhe seus pedidos</a></li>
                            <li><a href="<?php echo HOME_URL;?>/politica-de-privacidade/">Política de Privacidade</a></li>
                            <li><a href="<?php echo HOME_URL;?>/politica-de-entrega/">Política de Entrega</a></li>
                            <li><a href="<?php echo HOME_URL;?>/pagamento-e-parcelamento/">Pagamento e Parcelamento</a></li>
                            <li><a href="<?php echo HOME_URL;?>/codigo-do-consumidor/">Código do Consumidor</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Registre-se na nossa newsletter e obtenha ofertas exclusivas direto para sua caixa de entrada!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Digite seu e-mail">
                                <input type="submit" value="INSCREVA-SE">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 Hamsáh - Fashion Geek. Todos os Direitos Reservados. Powered By <a href="http://www.rex.tk" target="_blank">Rádames Rex</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <!-- <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                        <i class="fa fa-cc-amex"></i>
                        <i class="fa fa-cc-diners-club"></i> -->
                        <img src="<?php echo HOME_URL;?>/views/_img/pagseguro.jpg" alt="">
                        <img src="<?php echo HOME_URL;?>/views/_img/cartoesc.jpg" alt="">
                        <img src="<?php echo HOME_URL;?>/views/_img/cartoesd.jpg" alt="">
                        <img src="<?php echo HOME_URL;?>/views/_img/boleto.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="<?php echo HOME_URL;?>/views/_js/owl.carousel.min.js"></script>
    <script src="<?php echo HOME_URL;?>/views/_js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="<?php echo HOME_URL;?>/views/_js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="<?php echo HOME_URL;?>/views/_js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="<?php echo HOME_URL;?>/views/_js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo HOME_URL;?>/views/_js/script.slider.js"></script>
  </body>
</html>