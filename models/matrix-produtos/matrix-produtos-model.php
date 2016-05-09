<?php 
/**
 * Classe para registros de produtos
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixProdutosModel
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
	 * produtos.
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
		
		// Verifica se o produto existe
		$db_check_produto = $this->db->query (
			'SELECT * FROM `produtos` WHERE `id` = ? OR `nome` = ?', 
			array( 
				chk_array( $this->form_data, 'id'),
				chk_array( $this->form_data, 'nome'),			
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_produto ) {
			$this->form_msg = '<p class="form_error">Erro Interno.</p>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_produto = $db_check_produto->fetch();
		
		// Configura o ID do produto
		$produto_id = $fetch_produto['id'];				
		
		// Se o ID do produto não estiver vazio, atualiza os dados
		if ( ! empty( $produto_id ) ) {
 
			$query = $this->db->update('produtos', 'id', $produto_id, array(
				'codigo' => chk_array( $this->form_data, 'codigo'), 
				'nome' => chk_array( $this->form_data, 'nome'),
				'descricao' => chk_array( $this->form_data, 'descricao'), 
				'valor' => chk_array( $this->form_data, 'valor'),
				'peso' => chk_array( $this->form_data, 'peso'), 
				'tamanho' => chk_array( $this->form_data, 'tamanho'),
				'material' => chk_array( $this->form_data, 'material'), 
				'desconto' => chk_array( $this->form_data, 'desconto'),
				'categoria_id' => chk_array( $this->form_data, 'categoria_id'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {				
				$this->form_msg = '<p class="form_success">Produto atualizado com sucesso.</p>';
				
				// Termina
				return;
			}
		// Se o ID do produto estiver vazio, insere os dados
		} else {
		
			// Executa a consulta 
			$query = $this->db->insert('produtos', array(
				'codigo' => chk_array( $this->form_data, 'codigo'), 
				'nome' => chk_array( $this->form_data, 'nome'),
				'descricao' => chk_array( $this->form_data, 'descricao'), 
				'valor' => chk_array( $this->form_data, 'valor'),
				'peso' => chk_array( $this->form_data, 'peso'), 
				'tamanho' => chk_array( $this->form_data, 'tamanho'),
				'material' => chk_array( $this->form_data, 'material'), 
				'desconto' => chk_array( $this->form_data, 'desconto'),
				'categoria_id' => chk_array( $this->form_data, 'categoria_id'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<p class="form_success">Produto registrado com sucesso.</p>';
				
				// Termina
				return;
			}
		}
	} // validate_register_form
	
	/**
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para produtos registrados
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form ( $produto_id = false ) {
	
		// O ID de produto que vamos pesquisar
		$s_produto_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $produto_id ) ) {
			$s_produto_id = (int)$produto_id;
		}
		
		// Verifica se existe um ID de produto
		if ( empty( $s_produto_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `produtos` WHERE `id` = ?', array( $s_produto_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<p class="form_error">Produto não existe</p>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_produtodata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_produtodata ) ) {
			$this->form_msg = '<p class="form_error">Produto não existe.</p>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_produtodata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
		
	} // get_register_form
	
	/**
	 * Apaga produtos
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function del_produto ( $parametros = array() ) {
 
		// O ID do produto
		$produto_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
 
			// Mostra uma mensagem de confirmação
			echo '<p class="alert">Tem certeza que deseja apagar este valor?</p>';
			echo '<p><a href="' . $_SERVER['REQUEST_URI'] . '/confirma">Sim</a> | 
			<a href="' . HOME_URL . '/matrix-produtos/">Não</a> </p>';
			
			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do produto a ser apagado
				$produto_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $produto_id ) ) {
		
			// O ID precisa ser inteiro
			$produto_id = (int)$produto_id;
			
			// Deleta o produto
			$query = $this->db->delete('produtos', 'id', $produto_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URL . '/matrix-produtos/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URL . '/matrix-produtos/";</script>';
			return;
		}
	} // del_produto
	
	/**
	 * Obtém a lista de produtos
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_produto_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `produtos` ORDER BY id DESC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do produto
		return $query->fetchAll();
	} // get_produto_list

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

	/**
	 * Obtém a lista de subcategorias
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_subcategoria_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `subcategorias` ORDER BY nome ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da subcategoria
		return $query->fetchAll();
	} // get_subcategoria_list	

	/**
	 * Obtém a lista de cores
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_cor_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `cores` ORDER BY cor ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados da cor
		return $query->fetchAll();
	} // get_subcategoria_list		
}
?>