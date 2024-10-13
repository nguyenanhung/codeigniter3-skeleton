<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Command
 *
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Command extends HungNG_CI_Base_Controllers
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');
    }

    public function index(): void
    {
        if (!is_cli()) {
            show_404();
        }
        ResponseOutput::writeLn('CodeIgniter Command Interface');
    }

    public function clean_cache()
    {
        if (!is_cli()) {
            show_404();
        }
        $this->command_clean_cache_file();
    }

    public function clean_opcache()
    {
        if (!is_cli()) {
            show_404();
        }
        $this->opcache_flush_reset();
    }

    public function flush_logs()
    {
        if (!is_cli()) {
            show_404();
        }
        $this->default_base_flush_logs();
    }
}
