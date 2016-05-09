<?php if ( ! defined('ABSPATH')) exit; ?>
 
<div class="wrap">
 
<?php
// Carrega todos os métodos do modelo
$modelo->validate_register_form();
$modelo->get_register_form( chk_array( $parametros, 1 ) );
$modelo->del_user( $parametros );
?>
 
	<form method="post" action="">
		<table class="form-table">
			<tr>
				<td>Name: </td>
				<td> <input type="text" name="user_name" value="<?php 
					echo htmlentities( chk_array( $modelo->form_data, 'user_name') );
					?>" /></td>
			</tr>
			<tr>
				<td>User: </td>
				<td> <input type="text" name="user" value="<?php
					echo htmlentities( chk_array( $modelo->form_data, 'user') );
				?>" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td> <input type="password" name="user_password" value="<?php
				echo htmlentities( chk_array( $modelo->form_data, 'user_password') );
				?>" /></td>
			</tr>
			<tr>
				<td>Permissions <br><small>(Separate permissions using commas)</small>: </td>
				<td> <input type="text" name="user_permissions" value="<?php
				echo htmlentities( chk_array( $modelo->form_data, 'user_permissions') );
				?>" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $modelo->form_msg;?>
					<input type="submit" value="Save" />
				</td>
			</tr>
		</table>
	</form>
 
</div> <!-- .wrap -->