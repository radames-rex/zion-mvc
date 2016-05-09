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

											<table class="table-responsive matrix-table">
												<thead>
													<tr>
														<th id="th-titulo-sub" class="matrix-font">Clientes</th> 														
													</tr>
													<tr>
														<td id="td-titulo-sub" class="matrix-font">clients</td>														
													</tr>
													<tr>
														<td id="td-titulo">&nbsp;</td>														
													</tr>
												</thead>
											</table>												
											 
											<?php 
											// Lista os clientes
											$lista = $modelo->get_cliente_list(); 
											?>
											 
											 
											<table class="list-table table table-striped table-hover table-bordered">
												<thead>
													<tr>
														<th>ID</th>
														<th>Cliente</th>
														<th>Email</th>
														<th>Sexo</th>
														<th>CPF</th>
														<th>Data de Nascimento</th>
														<th>Telefone Fixo</th>
														<th>Telefone Celular</th>
														<th>CEP</th>
														<th>Cidade (Estado)</th>
													</tr>
												</thead>
														
												<tbody>
														
													<?php foreach ($lista as $fetch_clientedata): ?>
											 
														<tr>
														
															<td> <?php echo $fetch_clientedata['id'] ?> </td>
															<td> <?php echo $fetch_clientedata['nome'] ?> </td>
															<td> <?php echo $fetch_clientedata['email'] ?> </td>
															<td> <?php echo $fetch_clientedata['sexo'] ?> </td>
															<td> <?php echo $fetch_clientedata['cpf'] ?> </td>
															<td> <?php echo $fetch_clientedata['data_nascimento'] ?> </td>
															<td> <?php echo $fetch_clientedata['telefone_id'] ?> </td>
															<td> <?php echo $fetch_clientedata['telefone_id'] ?> </td>
															<td> <?php echo $fetch_clientedata['endereco_id'] ?> </td>
															<td> <?php echo $fetch_clientedata['endereco_id'] ?> </td>											 
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