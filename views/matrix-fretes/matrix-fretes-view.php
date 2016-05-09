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
											$modelo->del_frete( $parametros );
											?>

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">Fretes</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">shippings</td>														
													</tr>
													<tr>
														<td id="td-titulo">&nbsp;</td>														
													</tr>
												</thead>
											</table>
												
											<form method="post" action="">
												<table class="table-condensed table-responsive form-table col-md-12">
													<tr>														
														<td>De <br><small>(CEP)</small>: </td>
														<td> <input type="text" size="30" name="faixa_cep_de" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'faixa_cep_de') );
														?>" /></td>	
														<td>Até <br><small>(CEP)</small>: </td>
														<td> <input type="text" size="30" name="faixa_cep_ate" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'faixa_cep_ate') );
														?>" /></td>													
													</tr>
													<tr>														
														<td>Valor: </td>
														<td> <input type="text" size="30" name="valor" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'valor') );
														?>" /></td>	
														<td>Transporte: </td>
														<td> 

															<?php 
															// Lista os transportes
															$transportes = $modelo->get_transporte_list(); 
															?>

															<select name="transporte_id" class="form-control">
																<option value="">--</option>

															<?php foreach ($transportes as $fetch_transportedata): ?>					
																<option value="<?php echo $fetch_transportedata['id'] ?>">
																	<?php echo $fetch_transportedata['nome'] ?>
																</option>

															<?php endforeach;?>	

															</select>

														</td>													
													</tr>	
														<td> <input type="hidden" name="id" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'id') );
														?>" /></td>														
													</tr>												
													<tr>
														<td colspan="4">
															<?php echo $modelo->form_msg;?>
															<input type="submit" value="Salvar" />
															<a href="<?php echo HOME_URL . '/matrix-fretes/';?>">Novo Frete
														</td>
													</tr>
												</table>
											</form>
											 
											<?php 
											// Lista os fretes
											$lista = $modelo->get_frete_list(); 
											?>
											 
											 
											<table class="list-table table table-striped table-hover table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Faixa de Cep</th>
														<th>Valor</th>
														<th>Edições</th>
													</tr>
												</thead>
														
												<tbody>
														
													<?php foreach ($lista as $fetch_fretedata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_fretedata['id'] ?> </td>
															<td> <?php echo $fetch_fretedata['faixa_cep_de'].' a '.$fetch_fretedata['faixa_cep_ate'] ?> </td>
															<td> <?php echo $fetch_fretedata['valor'] ?> </td>
															
															<td> 
																<a href="<?php echo HOME_URL ?>/matrix-fretes/index/edit/<?php echo $fetch_fretedata['id'] ?>">Edit</a>
																<a href="<?php echo HOME_URL ?>/matrix-fretes/index/del/<?php echo $fetch_fretedata['id'] ?>">Delete</a>
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