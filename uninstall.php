<?php
/**
 * Uninstall handler for Life OS.
 */

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('life_os_version');
delete_option('life_os_settings');
