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
											$modelo->del_subcategoria( $parametros );
											?>

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">Subcategorias</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">subcategories</td>														
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
														?>" /></td>		
														<td>Categoria: </td>
														<td> 

															<?php 
															// Lista as subcategorias
															$categorias = $modelo->get_categoria_list(); 
															?>

															<select name="categoria" class="form-control">
																<option value="">--</option>

															<?php foreach ($categorias as $fetch_categoriadata): ?>					
																<option value="<?php echo $fetch_categoriadata['id'] ?>">
																	<?php echo $fetch_categoriadata['nome'] ?>
																</option>

															<?php endforeach;?>	

															</select>

															<!--<input type="text" size="30" name="nome" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'nome') );?>" />-->
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
															<a href="<?php echo HOME_URL . '/matrix-subcategorias/';?>">Nova Subcategoria</a>
														</td>
													</tr>
												</table>
											</form>
											 
											<?php 
											// Lista as subcategorias
											$lista = $modelo->get_subcategoria_list(); 
											?>
											 
											 
											<table class="list-table table table-striped table-hover table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Subcategoria</th>
														<th>Edições</th>
													</tr>
												</thead>
														
												<tbody>
														
													<?php foreach ($lista as $fetch_subcategoriadata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_subcategoriadata['id'] ?> </td>
															<td> <?php echo $fetch_subcategoriadata['nome'] ?> </td>
															
															<td> 
																<a href="<?php echo HOME_URL ?>/matrix-subcategorias/index/edit/<?php echo $fetch_subcategoriadata['id'] ?>">Edit</a>
																<a href="<?php echo HOME_URL ?>/matrix-subcategorias/index/del/<?php echo $fetch_subcategoriadata['id'] ?>">Delete</a>
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