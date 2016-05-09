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
											$modelo->del_produto( $parametros );
											?>

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">Produtos</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">products</td>														
													</tr>
													<tr>
														<td id="td-titulo">&nbsp;</td>														
													</tr>
												</thead>
											</table>
												
											<form method="post" action="">
												<table class="table-condensed table-responsive form-table col-md-12">
													<tr>
														<td colspan="1">Código: </td>
														<td colspan="1"> <input type="text" size="12" name="codigo" value="<?php 
															echo htmlentities( chk_array( $modelo->form_data, 'codigo') );
															?>" /></td>
														<td colspan="2">Nome: </td>
														<td colspan="2"> <input type="text" size="30" name="nome" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'nome') );
														?>" /></td>
													</tr>
													<tr>
														<td colspan="2">Descrição: </td>
														<td colspan="4"> <input type="text" size="60" name="descricao" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'descricao') );
														?>" /></td>
													</tr>
													<tr>
														<td>Material: </td>
														<td> <input type="text" size="12" name="material" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'material') );
														?>" /></td>
														<td>Peso <br><small>(Em gramas)</small>: </td>
														<td> <input type="text" size="5" name="peso" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'peso') );
														?>" /></td>
														<td>Tamanho: </td>
														<td> <input type="text" size="17" name="tamanho" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'tamanho') );
														?>" /></td>
													</tr>
													<tr>
														<td colspan="1">Valor <br><small>(Em Reais)</small>: </td>
														<td colspan="2"> <input type="text" size="26" name="valor" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'valor') );
														?>" /></td>
														<td colspan="1">Desconto: </td>
														<td colspan="2"> <input type="text" size="30" name="desconto" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'desconto') );
														?>" /></td>
													</tr>

													<?php 
													// Lista as categorias
													$categorias = $modelo->get_categoria_list(); 
													// Lista as subcategorias
													$subcategorias = $modelo->get_subcategoria_list(); 
													// Lista as cores
													$cores = $modelo->get_cor_list(); 
													?>

													<tr>
														<td colspan="1">Categoria: </td>
														<td colspan="2">
															<select name="categoria" class="form-control">
																<option value="">--</option>

															<?php foreach ($categorias as $fetch_categoriadata): ?>					
																<option value="<?php echo $fetch_categoriadata['id'] ?>">
																	<?php echo $fetch_categoriadata['nome'] ?>
																</option>

															<?php endforeach;?>	

															</select>
														<!--<input type="text" size="60" name="categoria" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'categoria') );
														?>" />-->
														</td>
														<td colspan="1">Subcategoria: </td>
														<td colspan="2">
															<select name="subcategoria" class="form-control">
																<option value="">--</option>

															<?php foreach ($subcategorias as $fetch_subcategoriadata): ?>					
																<option value="<?php echo $fetch_subcategoriadata['id'] ?>">
																	<?php echo $fetch_subcategoriadata['nome'] ?>
																</option>

															<?php endforeach;?>	

															</select>
														<!--<input type="text" size="60" name="categoria" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'categoria') );
														?>" />-->
														</td>
													</tr>
													<tr>
														<td colspan="1">Imagem: </td>
														<td colspan="2"><input type="file"></td>
														<td colspan="2">Cores: </td>
														<td colspan="4">
															
															<select name="cor" class="form-control">
																<option value="">--</option>

															<?php foreach ($cores as $fetch_cordata): ?>	

																<option value="<?php echo $fetch_cordata['id'] ?>">
																	<?php echo $fetch_cordata['cor'] ?>						    
																</option>

															<?php endforeach;?>	

															</select>

														</td>
													</tr>
													<tr>
														<td colspan="6">
															<?php echo $modelo->form_msg;?>
															<input type="submit" value="Salvar" />
															<a href="<?php echo HOME_URL . '/matrix-produtos/';?>">Novo Produto</a>
														</td>
													</tr>
												</table>
											</form>
											 
											<?php 
											// Lista os produtos
											$lista = $modelo->get_produto_list(); 
											?>
											 
											 
											<table class="list-table table table-striped table-hover table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Usuário</th>
														<th>Telefone</th>
														<th>Permissões</th>
														<th>Edição</th>
													</tr>
												</thead>
														
												<tbody>
														
													<?php foreach ($lista as $fetch_produtodata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_produtodata['id'] ?> </td>
															<td> <?php echo $fetch_produtodata['codigo'] ?> </td>
															<td> <?php echo $fetch_produtodata['nome'] ?> </td>
															<td> <?php echo $fetch_produtodata['valor']  ?> </td>
															
															<td> 
																<a href="<?php echo HOME_URL ?>/matrix-produtos/index/edit/<?php echo $fetch_produtodata['id'] ?>">Edit</a>
																<a href="<?php echo HOME_URL ?>/matrix-produtos/index/del/<?php echo $fetch_produtodata['id'] ?>">Delete</a>
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