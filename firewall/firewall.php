<?php
defined('HUNGNG_FIREWALL_STATUS') or define('HUNGNG_FIREWALL_STATUS', false);

if (HUNGNG_FIREWALL_STATUS === true) {
    require_once __DIR__ . '/../vendor/autoload.php';

    // Setup constants HUNGNG_IP_WHITELIST
    defined('HUNGNG_IP_WHITELIST') or define('HUNGNG_IP_WHITELIST', array(
        '222.252.35.139', // IP v4 mạng FPT của nhà, IP này cần thường xuyên cập nhật vì đặc thù xài ip động
        '172.104.35.45', // VPN IP
        '127.0.0.1', // Local IP
    ));

    // Setup constants HUNGNG_IP_BLACKLIST
    defined('HUNGNG_IP_BLACKLIST') or define('HUNGNG_IP_BLACKLIST', array());

    // Connecting User IP
    // echo 'Your IP ' . getIPAddress() . ' is ' . PHP_EOL;

    // Firewall Filter
    php_basic_firewall_save_log(__DIR__ . '/../logs/accessDenied.log');
}
