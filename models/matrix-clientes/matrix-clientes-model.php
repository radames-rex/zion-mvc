<?php 
/**
 * Classe para visualização de clientes
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixClientesModel
{
 
	/**
	 * $db
	 *
	 * O objeto da nossa conexão PDO
	 *
	 * @access public
	 */
	public $db;
 
	/**
	 * Construtor
	 * 
	 * Carrega  o DB.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function __construct( $db = false ) {
                // Carrega o BD
		$this->db = $db;
	}
	
	/**
	 * Obtém a lista de clientes
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_cliente_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `clientes` ORDER BY id ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do cliente
		return $query->fetchAll();
	} // get_cliente_list			
}
?>