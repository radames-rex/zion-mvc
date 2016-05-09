<?php
/**
 * MatrixAdministradoresController - Controller de exemplo
 *
 * @package HamsahMVC
 * @since 0.1
 */
class MatrixAdministradoresController extends MatrixMainController
{
 
   /**
    * $login_required
    *
    * Se a página precisa de login
    *
    * @access public
    */
    public $login_required = true;
 
    /**
     * $permission_required
     *
     * Permissão necessária
     *
     * @access public
     */
    public $permission_required = 'neo';
 
    /**
     * Carrega a página "/views/matrix-administradores/index.php"
     */
    public function index() {
		// Page title
		$this->title = 'Administradores';
		
		// Verifica se o usuário está logado
		if ( ! $this->logged_in ) {
		
			// Se não; garante o logout
			$this->logout();
			
			// Redireciona para a página de login
			$this->goto_login();
			
			// Garante que o script não vai passar daqui
			return;
		
		}
		
		// Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {

			// Exibe uma mensagem
			echo 'Você não tem permissões para acessar essa página.';
			
			// Finaliza aqui
			return;
		}
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('matrix-administradores/matrix-administradores-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
				
	// /views/matrix-administradores/index.php
        require ABSPATH . '/views/matrix-administradores/matrix-administradores-view.php';		
		
    } // index
	
} // class MatrixAdministradoresController
?>