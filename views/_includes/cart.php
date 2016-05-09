<?php if ( ! defined('ABSPATH')) exit; ?>
   
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
