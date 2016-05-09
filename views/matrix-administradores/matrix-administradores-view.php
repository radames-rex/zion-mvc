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
											$modelo->del_user( $parametros );
											?>

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">ADMINISTRADORES</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">administrators</td>														
													</tr>
													<tr>
														<td id="td-titulo">&nbsp;</td>														
													</tr>
												</thead>
											</table>
												
											<form method="post" action="">
												<table class="form-table col-md-12">
													<tr>
														<td>Nome: </td>
														<td> <input type="text" size="72" name="nome" value="<?php 
															echo htmlentities( chk_array( $modelo->form_data, 'nome') );
															?>" /></td>
													</tr>
													<tr>
														<td>Telefone: </td>
														<td> <input type="text" size="72" name="telefone" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'telefone') );
														?>" /></td>
													</tr>
													<tr>
														<td>Senha: </td>
														<td> <input type="password" size="72" name="senha" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'senha') );
														?>" /></td>
													</tr>
													<tr>
														<td>Permissões <br><small>(Separe as permissões usando vírgulas)</small>: </td>
														<td> <input type="text" size="72" name="permissions" value="<?php
														echo htmlentities( chk_array( $modelo->form_data, 'permissions') );
														?>" /></td>
													</tr>
													</tr>	
														<td> <input type="hidden" name="id" value="<?php
															echo htmlentities( chk_array( $modelo->form_data, 'id') );
														?>" /></td>														
													</tr>
													<tr>
														<td colspan="2">
															<?php echo $modelo->form_msg;?>
															<input type="submit" value="Salvar" />
															<a href="<?php echo HOME_URL . '/matrix-administradores/';?>">Novo Admin</a>
														</td>
													</tr>
												</table>
											</form>
											 
											<?php 
											// Lista os usuários
											$lista = $modelo->get_user_list(); 
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
														
													<?php foreach ($lista as $fetch_userdata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_userdata['id'] ?> </td>
															<td> <?php echo $fetch_userdata['nome'] ?> </td>
															<td> <?php echo $fetch_userdata['telefone'] ?> </td>
															<td> <?php echo implode( ',', unserialize( $fetch_userdata['permissions'] ) ) ?> </td>
															
															<td> 
																<a href="<?php echo HOME_URL ?>/matrix-administradores/index/edit/<?php echo $fetch_userdata['id'] ?>">Edit</a>
																<a href="<?php echo HOME_URL ?>/matrix-administradores/index/del/<?php echo $fetch_userdata['id'] ?>">Delete</a>
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