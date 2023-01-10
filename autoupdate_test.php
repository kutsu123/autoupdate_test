<?php
/**
 * Plugin name: AutoUpdaterのテスト
 * Description: fugafugahogehoge
 * Version: 0.0.1
 *
 * @package autoupdate_test
 * @author kutsu123
 * @license GPL-2.0+
 */

namespace AutoupdateTest;
use Inc2734\WP_GitHub_Plugin_Updater\Bootstrap as Updater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * declaration constant.
 */
define( 'AUTOUPDATETEST_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) . '/' );  // このプラグインのURL.
define( 'AUTOUPDATETEST_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/' ); // このプラグインのパス.

/**
 * include files.
 */
require_once(AUTOUPDATETEST_PLUGIN_PATH . 'vendor/autoload.php'); //アップデート用composer.

/**
 * 初期設定.
 */
class Bootstrap {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'autoupdate' ) );
	}

	public function autoupdate() {
		new Updater(
			'Autoupdate_test',
			'kutsu123',
			'autoupdate_test',
			[
				'tested'       => '6.1.1', // Tested up WordPress version
				'requires_php' => '5.6.0', // Requires PHP version
				'requires'     => '6.1', // Requires WordPress version
			]
		);
	}
}

new Bootstrap();
