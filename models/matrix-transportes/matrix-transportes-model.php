<?php 
/**
 * Classe para registros de transportes
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixTransportesModel
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
	 * Transportes.
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
		
		// Verifica se o transporte existe
		$db_check_transporte = $this->db->query (
			'SELECT * FROM `transportes` WHERE `id` = ? OR `nome` = ?', 
			array( 
				chk_array( $this->form_data, 'id'),
				chk_array( $this->form_data, 'nome'),			
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_transporte ) {
			$this->form_msg = '<p class="form_error">Erro Interno.</p>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_transporte = $db_check_transporte->fetch();
		
		// Configura o ID do transporte
		$transporte_id = $fetch_transporte['id'];				
		
		// Se o ID do transporte não estiver vazio, atualiza os dados
		if ( ! empty( $transporte_id ) ) {
 
			$query = $this->db->update('transportes', 'id', $transporte_id, array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {				
				$this->form_msg = '<p class="form_success">Transporte atualizado com sucesso.</p>';
				
				// Termina
				return;
			}
		// Se o ID do transporte estiver vazio, insere os dados
		} else {
		
			// Executa a consulta 
			$query = $this->db->insert('transportes', array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<p class="form_success">Transporte registrado com sucesso.</p>';
				
				// Termina
				return;
			}
		}
	} // validate_register_form
	
	/**
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para transportes registrados
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form ( $transporte_id = false ) {
	
		// O ID de transporte que vamos pesquisar
		$s_transporte_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $transporte_id ) ) {
			$s_transporte_id = (int)$transporte_id;
		}
		
		// Verifica se existe um ID de transporte
		if ( empty( $s_transporte_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `transportes` WHERE `id` = ?', array( $s_transporte_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<p class="form_error">Transporte não existe</p>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_transportedata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_transportedata ) ) {
			$this->form_msg = '<p class="form_error">Transporte não existe.</p>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_transportedata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
		
	} // get_register_form
	
	/**
	 * Apaga transportes
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function del_transporte ( $parametros = array() ) {
 
		// O ID do transporte
		$transporte_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
 
			// Mostra uma mensagem de confirmação
			echo '<p class="alert">Tem certeza que deseja apagar este valor?</p>';
			echo '<p><a href="' . $_SERVER['REQUEST_URI'] . '/confirma">Sim</a> | 
			<a href="' . HOME_URL . '/matrix-transportes/">Não</a> </p>';
			
			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do transporte a ser apagado
				$transporte_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $transporte_id ) ) {
		
			// O ID precisa ser inteiro
			$transporte_id = (int)$transporte_id;
			
			// Deleta o transporte
			$query = $this->db->delete('transportes', 'id', $transporte_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URL . '/matrix-transportes/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URL . '/matrix-transportes/";</script>';
			return;
		}
	} // del_transporte
	
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
	} // get_transporte_list			
}
?>