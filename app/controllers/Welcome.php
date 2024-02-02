<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Welcome
 *
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Welcome extends HungNG_CI_Base_Controllers
{
    /**
     * Welcome constructor.
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');
    }

    /**
     * Function index
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 23/06/2022 08:45
     */
    public function index(): void
    {
        $data = [];
        $data['author'] = arrayToObject(config_item('site_author'));
        $data['site_data'] = arrayToObject(config_item('site_data'));
        $data['tracking'] = arrayToObject(config_item('tracking_code'));
        $this->load->view('my_welcome', $data);
    }

    /**
     * Function api
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 23/06/2022 02:03
     */
    public function api(): void
    {
        $response = [
            'code' => StatusCodes::HTTP_OK,
            'message' => StatusCodes::$statusTexts[StatusCodes::HTTP_OK],
            'data' => [
                'author_name' => POWERED_HUNGNG_SHORT_NAME,
                'author_email' => HUNGNG_EMAIL,
                'author_web' => HUNGNG_WEBSITE
            ],
            'support' => [
                'issues' => 'https://github.com/nguyenanhung/codeigniter3-skeleton/issues',
                'wiki' => 'https://github.com/nguyenanhung/codeigniter3-skeleton/wiki',
                'source' => 'https://github.com/nguyenanhung/codeigniter3-skeleton',
                'packages' => 'https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton',
            ],
            'you' => [
                'ip' => getIPAddress(),
                'user_agent' => $this->input->user_agent(true)
            ]
        ];
        $this->output
            ->set_status_header()
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function command(): void
    {
        ResponseOutput::writeLn("Welcome CodeIgniter 3 Framework at Time " . date('Y-m-d H:i:s'));
    }
}
