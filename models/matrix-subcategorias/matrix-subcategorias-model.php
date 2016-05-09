<?php 
/**
 * Classe para registros de categorias
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixSubcategoriasModel
{
 
	/**
	 * $form_data
	 *
	 * Os dados do formulário de envio.
	 *
	 * @access public
	 */	
	public $form_data;
 
	/**
	 * $form_msg
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 * @access public
	 */	
	public $form_msg;
 
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
	 * Valida o formulário de envio
	 * 
	 * Este método pode inserir ou atualizar dados dependendo do campo de
	 * subcategorias.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function validate_register_form () {
	
		// Configura os dados do formulário
		$this->form_data = array();
		
		// Verifica se algo foi postado
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
				// Configura os dados do post para a propriedade $form_data
				$this->form_data[$key] = $value;
				
				if($key != 'id'){
					// Nós não permitiremos nenhum campos em branco exceto id
					if ( empty( $value ) ) {
						
						// Configura a mensagem
						$this->form_msg = '<p class="form_error">Existem campos vazios. Os dados não serão enviados.</p>';
						
						// Termina
						return;
						
					}	
				}							
			
			}
		
		} else {
		
			// Termina se nada foi enviado
			return;
			
		}
		
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			return;
		}
		
		// Verifica se a subcategoria existe
		$db_check_subcategoria = $this->db->query (
			'SELECT * FROM `subcategorias` WHERE `id` = ? OR `nome` = ?', 
			array( 
				chk_array( $this->form_data, 'id'),
				chk_array( $this->form_data, 'nome'),			
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_subcategoria ) {
			$this->form_msg = '<p class="form_error">Erro Interno.</p>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_subcategoria = $db_check_subcategoria->fetch();
		
		// Configura o ID da subcategoria
		$subcategoria_id = $fetch_subcategoria['id'];				
		
		// Se o ID da subcategoria não estiver vazio, atualiza os dados
		if ( ! empty( $subcategoria_id ) ) {
 
			$query = $this->db->update('subcategorias', 'id', $subcategoria_id, array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {				
				$this->form_msg = '<p class="form_success">Subcategoria atualizada com sucesso.</p>';
				
				// Termina
				return;
			}
		// Se o ID da subcategoria estiver vazio, insere os dados
		} else {
		
			// Executa a consulta 
			$query = $this->db->insert('subcategorias', array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<p class="form_success">Subcategoria registrada com sucesso.</p>';
				
				// Termina
				return;
			}
		}
	} // validate_register_form
	
	/**
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para subcategorias registradas
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form ( $subcategoria_id = false ) {
	
		// O ID de subcategoria que vamos pesquisar
		$s_subcategoria_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $subcategoria_id ) ) {
			$s_subcategoria_id = (int)$subcategoria_id;
		}
		
		// Verifica se existe um ID de subcategoria
		if ( empty( $s_subcategoria_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `subcategorias` WHERE `id` = ?', array( $s_subcategoria_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<p class="form_error">Subcategoria não existe</p>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_subcategoriadata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_subcategoriadata ) ) {
			$this->form_msg = '<p class="form_error">Subcategoria não existe.</p>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_subcategoriadata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
		
	} // get_register_form
	
	/**
	 * Apaga subcategorias
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function del_subcategoria ( $parametros = array() ) {
 
		// O ID da subcategoria
		$subcategoria_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
 
			// Mostra uma mensagem de confirmação
			echo '<p class="alert">Tem certeza que deseja apagar este valor?</p>';
			echo '<p><a href="' . $_SERVER['REQUEST_URI'] . '/confirma">Sim</a> | 
			<a href="' . HOME_URL . '/matrix-subcategorias/">Não</a> </p>';
			
			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID da subcategoria a ser apagado
				$subcategoria_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $subcategoria_id ) ) {
		
			// O ID precisa ser inteiro
			$subcategoria_id = (int)$subcategoria_id;
			
			// Deleta a subcategoria
			$query = $this->db->delete('subcategorias', 'id', $subcategoria_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URL . '/matrix-subcategorias/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URL . '/matrix-subcategorias/";</script>';
			return;
		}
	} // del_subcategoria
	
	/**
	 * Obtém a lista de subcategorias
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_subcategoria_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `subcategorias` ORDER BY id ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // get_subcategoria_list

	/**
	 * Obtém a lista de categorias
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_categoria_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `categorias` ORDER BY nome ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da categoria
		return $query->fetchAll();
	} // get_categoria_list				
}
?>