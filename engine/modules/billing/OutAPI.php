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

if( ! class_exists('BillingAPI') )
{
    include_once MODULE_PATH . '/helpers/api.php';
}

$BillingAPI = new BillingAPI( $db, $member_id, include MODULE_DATA . '/config.php', $_TIME );
