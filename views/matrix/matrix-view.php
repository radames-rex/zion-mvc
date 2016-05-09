<?php if ( ! defined('ABSPATH')) exit; 
$_SESSION['goto_url'] = HOME_URL.'/matrix-admin/ ';
?>

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
										<div>
									 
											<?php
											if ( $this->logged_in ) {
												echo '<p class="alert">Olá, '.$_SESSION['userdata']['nome'].'. Bem Vindo a Matrix!</p>';													
											}
											?>
										 
											<form method="post">
												<table class="form-table">
													<tr>
														<td>Administrador</td> 
														<td><input name="userdata[user]"></td>
													</tr>
													<tr>
														<td>Código de Acesso</td>
														<td><input type="password" name="userdata[user_password]"></td>
													</tr>
													<?php
													if ( $this->login_error ) {
														echo '<tr><td colspan="2" class="error">' . $this->login_error . '</td></tr>';
													}
													?>
													<tr>
														<td>&nbsp;</td>
													</tr>
													<tr>
														<td colspan="2">
															<input type="submit" value="ENTRAR"> 
														</td>
													</tr>
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