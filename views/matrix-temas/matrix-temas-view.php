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
                                <a href="<?php echo HOME_URL;?>/matrix-admin"><div class="montain-matrix"></div></a>
                                <div class="emma-heading">
									<div class="wrap">
										<div class="matrix-admin">
 
											<?php
											// Carrega todos os métodos do modelo
											$modelo->validate_register_form();
											$modelo->get_register_form( chk_array( $parametros, 1 ) );
											?>

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">Temas</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">themes</td>														
													</tr>
													<tr>
														<td id="td-titulo">&nbsp;</td>														
													</tr>
												</thead>
											</table>
												
											<form method="post" action="">
												<table class="table-condensed table-responsive form-table col-md-12">
													<tr>														
														<td>Nome: </td>
														<td> <input type="text" size="30" name="nome" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'nome') );
														?>" readonly /></td>	
														<td>Ativar: </td>
														<td> <input type="radio" size="30" name="ativo" value="1"/></td>	
														<td>Desativar: </td>
														<td> <input type="radio" size="30" name="ativo" value="0"/></td>												
													</tr>	
														<td> <input type="hidden" name="id" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'id') );
														?>" /></td>														
													</tr>												
													<tr>
														<td colspan="6">
															<?php echo $modelo->form_msg;?>
															<input type="submit" value="Salvar" />
														</td>
													</tr>
												</table>
											</form>
											 
											<?php 
											// Lista os temas
											$lista = $modelo->get_tema_list(); 
											?>
											 
											 
											<table class="list-table table table-striped table-hover table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Tema</th>
														<th>Status</th>
														<th>Edições</th>
													</tr>
												</thead>
														
												<tbody>
														
													<?php foreach ($lista as $fetch_temadata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_temadata['id'] ?> </td>
															<td> <?php echo $fetch_temadata['nome'] ?> </td>
															<td> <?php echo ($fetch_temadata['ativo']=='0'?'Inativo':'Ativo') ?> </td>
															
															<td> 
																<a href="<?php echo HOME_URL ?>/matrix-temas/index/edit/<?php echo $fetch_temadata['id'] ?>">Selecionar</a>
															</td>
											 
														</tr>
														
													<?php endforeach;?>
														
												</tbody>
											</table>
 
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