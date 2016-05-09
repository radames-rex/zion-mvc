<?php 
/**
 * Classe para ativação dos temas
 *
 * @package HamsahMVC
 * @since 0.1
 */
 
class MatrixTemasModel
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
	 * temas.
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
		
		// Verifica se o tema existe
		$db_check_tema = $this->db->query (
			'SELECT * FROM `temas` WHERE `id` = ? OR `nome` = ?', 
			array( 
				chk_array( $this->form_data, 'id'),
				chk_array( $this->form_data, 'nome'),			
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_tema ) {
			$this->form_msg = '<p class="form_error">Erro Interno.</p>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_tema = $db_check_tema->fetch();
		
		// Configura o ID da tema
		$tema_id = $fetch_tema['id'];				
		
		// Se o ID do tema não estiver vazio, atualiza os dados
		if ( ! empty( $tema_id ) ) {
 
			$query = $this->db->update('temas', 'id', $tema_id, array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {				
				$this->form_msg = '<p class="form_success">Tema atualizado com sucesso.</p>';
				
				// Termina
				return;
			}
		// Se o ID do tema estiver vazio, insere os dados
		} else {
		
			// Executa a consulta 
			$query = $this->db->insert('temas', array(
				'nome' => chk_array( $this->form_data, 'nome'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<p class="form_error">Erro Interno. Os dados não serão enviados.</p>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<p class="form_success">Tema registrado com sucesso.</p>';
				
				// Termina
				return;
			}
		}
	} // validate_register_form
	
	/**
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para temas registrados
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form ( $tema_id = false ) {
	
		// O ID de tema que vamos pesquisar
		$s_tema_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $tema_id ) ) {
			$s_tema_id = (int)$tema_id;
		}
		
		// Verifica se existe um ID de tema
		if ( empty( $s_tema_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `temas` WHERE `id` = ?', array( $s_tema_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<p class="form_error">Tema não existe</p>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_temadata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_temadata ) ) {
			$this->form_msg = '<p class="form_error">Tema não existe.</p>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_temadata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
		
	} // get_register_form
	
	/**
	 * Obtém a lista de temas
	 * 
	 * @since 0.1
	 * @access public
	 */
	public function get_tema_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `temas` ORDER BY id ASC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do tema
		return $query->fetchAll();
	} // get_tema_list			
}
?>