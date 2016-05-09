<?php
/**
 * CadastreSeController - Controller de exemplo
 *
 * @package HamsahMVC
 * @since 0.1
 */
class CadastreSeController extends MainController
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
    public $permission_required = 's';
 
    /**
     * Carrega a página "/views/cadastre-se/index.php"
     */
    public function index() {
		// Page title
		$this->title = 'Cadastre-se';
		
		// Verifica se o usuário está logado
		if ( $this->logged_in ) {
			
			// Redireciona para a página de login
			$this->goto_page(ABSPATH);
			
			// Garante que o script não vai passar daqui
			return;
		
		}
	
	// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
	// Carrega o modelo para este view
        $modelo = $this->load_model('cadastre-se/cadastre-se-model');
				
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/_includes/cart.php
        require ABSPATH . '/views/_includes/cart.php';

	// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
	// /views/user-register/index.php
        require ABSPATH . '/views/cadastre-se/cadastre-se-view.php';
		
	// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
} // class CadastreSeController
?>