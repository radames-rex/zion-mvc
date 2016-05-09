<?php
/**
 * MatrixController - Controller para o Login da Matrix-Admin
 *
 * @package HamsahMVC
 * @since 0.1
 */
class MatrixController extends MatrixMainController
{
 
    /**
    * Carrega a página "/views/matrix/index.php"
    */
    public function index() {
	// Título da página
	$this->title = 'Matrix Gate';
		
	// Parametros da função
	$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
	// Matrix não tem Model
		
	/** Carrega os arquivos do view **/
		
	// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
	// /views/matrix/index.php
        require ABSPATH . '/views/matrix/matrix-view.php';		
		
    } // index
	
} // class MatrixController
?>