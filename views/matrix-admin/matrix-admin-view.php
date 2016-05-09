<?php if ( ! defined('ABSPATH')) exit; ?>

<div class="product-widget-area" style="background-color:transparent;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-12">
                <div class="single-product-widget">                        
                    <div class="col-sm-12 col-md-12">
                        <div class="col-md-12 head-grd-1">
                            <div class="main-emma">
                                <div class="montain-matrix"></div>
                                <div class="emma-heading">
									<div class="wrap">
										<div class="matrix-admin">
									 
											<?php
											if ( $this->logged_in ) {
												echo '<p class="alert">Olá, '.$_SESSION['userdata']['nome'].'!</p>';																								
											}
											?>
										 
											<form method="post">
												<table class="table-responsive matrix-table">
													<thead>
														<tr>
															<th id="th-titulo" class="matrix-font">VENDAS</th> 
															<th id="th-titulo" class="matrix-font">CONTEÚDO</th>
															<th id="th-titulo" class="matrix-font">CONFIGURAÇÕES</th>
														</tr>
														<tr>
															<td id="td-titulo" class="matrix-font">e-commerce</td>
															<td id="td-titulo" class="matrix-font">website</td>
															<td id="td-titulo" class="matrix-font">settings</td>
														</tr>
														<tr>
															<td id="td-titulo">&nbsp;</td>
															<td id="td-titulo">&nbsp;</td>
															<td id="td-titulo">&nbsp;</td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><a href="<?php echo HOME_URL;?>/matrix-clientes/">Clientes</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-fotos/">Fotos</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-administradores/">Administradores</a></td>
														</tr>
														<tr>
															<td><a href="<?php echo HOME_URL;?>/matrix-mensagens/">Mensagens</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-looks/">Looks</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-categorias/">Categorias</a></td>
														</tr>
														<tr>
															<td><a href="<?php echo HOME_URL;?>/matrix-pagamentos/">Pagamentos</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-menus/">Menus</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-subcategorias/">Subcategorias</a></td>
														</tr>
														<tr>
															<td><a href="<?php echo HOME_URL;?>/matrix-pedidos/">Pedidos</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-newsletters/">Newsletters</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-fretes/">Fretes</a></td>
														</tr>
														<tr>
															<td><a href="<?php echo HOME_URL;?>/matrix-produtos/">Produtos</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-videos/">Vídeos</a></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-temas/">Temas</a></td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td><a href="<?php echo HOME_URL;?>/matrix-transportes/">Transportes</a></td>
														</tr>
													</tbody>		
												</table>
											</form>
										
										</div>
									</div> <!-- .wrap -->
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->  