<?php	if( ! defined( 'DATALIFEENGINE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/iPSWeb/DLE-Billing
 * @author        PSWeb.ru <i@psweb.ru>
 * @copyright     Copyright (c) 2019, pligin
 */

define( 'BILLING_MODULE', TRUE );
define( 'MODULE_PATH', ENGINE_DIR . "/modules/billing" );
define( 'MODULE_DATA', ENGINE_DIR . "/data/billing" );

# Требуется установка модуля
#
if( ! file_exists( MODULE_DATA . '/config.php' ) )
{
	header("Location: /index.php");
	exit();
}

require_once MODULE_PATH . '/helpers/library.querys.php';
require_once MODULE_PATH . '/helpers/api.php';
require_once MODULE_PATH . '/helpers/devtools.php';

DevTools::Start();
