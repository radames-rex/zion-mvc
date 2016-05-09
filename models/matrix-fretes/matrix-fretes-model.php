<?php 
/**
 * Classe para registros de fretes
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixFretesModel
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
	 * fretes.
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
		
		// Verifica se o frete existe
		$db_check_frete = $this->db->query (
			'SELECT * FROM `fretes` WHERE `id` = ? OR (`faixa_cep_de` = ? AND `faixa_cep_ate` = ?)', 
			array( 
				chk_array( $this->form_data, 'id'),
				chk_array( $this->form_data, 'faixa_cep_de'),	
				chk_array( $this->form_data, 'faixa_cep_ate'),		
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_frete ) {
			$this->form_msg = '<p class="form_error">Erro Interno.</p>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_frete = $db_check_frete->fetch();
		
		// Configura o ID do frete
		$frete_id = $fetch_frete['id'];				
		
		// Se o ID do frete não estiver vazio, atualiza os dados
		if ( ! empty( $frete_id ) ) {
 
			$query = $this->db->update('fretes', 'id', $frete_id, array(
				'faixa_cep_de' => chk_array( $this->form_data, 'faixa_cep_de'),
				'faixa_cep_ate' => chk_array( $this->form_data, 'faixa_cep_ate'),
				'valor' => chk_array( $this->form_data, 'valor'),
				'transporte_id' => chk_array( $this->form_data, 'transporte_id'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {				
				$this->form_msg = '<p class="form_success">Frete atualizado com sucesso.</p>';
				
				// Termina
				return;
			}
		// Se o ID do frete estiver vazio, insere os dados
		} else {
		
			// Executa a consulta 
			$query = $this->db->insert('fretes', array(
				'faixa_cep_de' => chk_array( $this->form_data, 'faixa_cep_de'),
				'faixa_cep_ate' => chk_array( $this->form_data, 'faixa_cep_ate'),
				'valor' => chk_array( $this->form_data, 'valor'),
				'transporte_id' => chk_array( $this->form_data, 'transporte_id'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<p class="form_success">Frete registrado com sucesso.</p>';
				
				// Termina
				return;
			}
		}
	} // validate_register_form
	
	/**
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para fretes registrados
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form ( $frete_id = false ) {
	
		// O ID de frete que vamos pesquisar
		$s_frete_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $frete_id ) ) {
			$s_frete_id = (int)$frete_id;
		}
		
		// Verifica se existe um ID de frete
		if ( empty( $s_frete_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `fretes` WHERE `id` = ?', array( $s_frete_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<p class="form_error">Frete não existe</p>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_fretedata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_fretedata ) ) {
			$this->form_msg = '<p class="form_error">Frete não existe.</p>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_fretedata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
		
	} // get_register_form
	
	/**
	 * Apaga fretes
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function del_frete ( $parametros = array() ) {
 
		// O ID do frete
		$frete_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
 
			// Mostra uma mensagem de confirmação
			echo '<p class="alert">Tem certeza que deseja apagar este valor?</p>';
			echo '<p><a href="' . $_SERVER['REQUEST_URI'] . '/confirma">Sim</a> | 
			<a href="' . HOME_URL . '/matrix-fretes/">Não</a> </p>';
			
			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do frete a ser apagado
				$frete_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $frete_id ) ) {
		
			// O ID precisa ser inteiro
			$frete_id = (int)$frete_id;
			
			// Deleta o frete
			$query = $this->db->delete('fretes', 'id', $frete_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URL . '/matrix-fretes/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URL . '/matrix-fretes/";</script>';
			return;
		}
	} // del_frete
	
	/**
	 * Obtém a lista de fretes
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_frete_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `fretes` ORDER BY id ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do frete
		return $query->fetchAll();
	} // get_frete_list	

	/**
	 * Obtém a lista de transportes
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_transporte_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `transportes` ORDER BY id ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do transporte
		return $query->fetchAll();
	} // get_frete_list				
}
?>