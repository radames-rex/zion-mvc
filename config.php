<?php
/**
 * Configuração geral
 */
 
// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );
 
// Caminho para a pasta de uploads
define( 'UP_ABSPATH', ABSPATH . '/views/_uploads' );
 
// URL da home
define( 'HOME_URL', 'http://127.0.0.1/hamsahfg' );
 
// Nome do host da base de dados
define( 'HOSTNAME', 'localhost' );
 
// Nome do DB
define( 'DB_NAME', 'hamsah' );
 
// Usuário do DB
define( 'DB_USER', 'root' );
 
// Senha do DB
define( 'DB_PASSWORD', '' );
 
// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );

// TIMEZONE
define( 'APP_TIMEZONE', 'America/Fortaleza' );
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', true );
 
/**
 * Não edite daqui em diante
 */
 
// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
?>