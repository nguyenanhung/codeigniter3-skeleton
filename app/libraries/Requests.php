<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Project my-portfolio
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/01/2020
 * Time: 23:30
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Class Requests
 *
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Requests
{
    protected $mono;
    protected $DEBUG;
    protected $logger_path;
    protected $logger_file;
    protected $timeout = 60;
    protected $header  = [];

    /**
     * Requests constructor.
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct()
    {
        $this->DEBUG       = TRUE;
        $this->logger_path = __DIR__.'/../../storage/logs/Requests/';
        $this->logger_file = 'Log-' . date('Y-m-d') . '.log';
        $this->mono        = [
            'dateFormat'         => "Y-m-d H:i:s u",
            'outputFormat'       => "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
            'monoBubble'         => TRUE,
            'monoFilePermission' => 0777
        ];
    }

    /**
     * Function setTimeout
     *
     * @param $timeout
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 31:11z
     */
    public function setTimeout($timeout): Requests
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Function setHeader
     *
     * @param array $header
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 31:22
     */
    public function setHeader(array $header = []): Requests
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Function sendRequest
     *
     * @param string $url
     * @param array  $data
     * @param string $method
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/18/2021 54:32
     */
    public function sendRequest(string $url = '', array $data = [], string $method = 'GET'): ?string
    {
        try {
            $getMethod = strtoupper($method);
            // create a log channel
            $formatter = new LineFormatter($this->mono['outputFormat'], $this->mono['dateFormat']);
            $stream    = new StreamHandler($this->logger_path . 'sendRequest/' . $this->logger_file, Logger::INFO, $this->mono['monoBubble'], $this->mono['monoFilePermission']);
            $stream->setFormatter($formatter);
            $logger = new Logger('Curl');
            $logger->pushHandler($stream);
            if ($this->DEBUG === TRUE) {
                $logger->info('||=========== Logger Requests ===========||');
                $logger->info('Method: ' . $getMethod);
                $logger->info('Request: ' . $url, $data);
            }
            // Curl
            $curl = new Curl\Curl();
            $curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);
            $curl->setOpt(CURLOPT_ENCODING, "utf-8");
            $curl->setOpt(CURLOPT_MAXREDIRS, 10);
            $curl->setOpt(CURLOPT_TIMEOUT, 300);
            // Request
            if ('POST' === $getMethod) {
                $curl->post($url, $data);
            } else {
                $curl->get($url, $data);
            }
            // Response
            $response = $curl->error ? "cURL Error: " . $curl->errorMessage : $curl->response;
            // Close Request
            $curl->close();
            // Log Response
            if ($this->DEBUG === TRUE) {
                if (is_array($response) || is_object($response)) {
                    $logger->info('Response: ' . json_encode($response));
                } else {
                    $logger->info('Response: ' . $response);
                }
                if (isset($curl->requestHeaders)) {
                    if (is_array($curl->requestHeaders)) {
                        $logger->info('Request Header: ', $curl->requestHeaders);
                    } else {
                        $logger->info('Request Header: ' . json_encode($curl->requestHeaders));
                    }
                }
                if (isset($curl->responseHeaders)) {
                    if (is_array($curl->responseHeaders)) {
                        $logger->info('Response Header: ', $curl->responseHeaders);
                    } else {
                        $logger->info('Response Header: ' . json_encode($curl->responseHeaders));
                    }
                }
            }

            // Return Response
            return $response;
        }
        catch (Exception $e) {
            log_message('error', $e->getMessage());
            log_message('error', $e->getTraceAsString());

            return NULL;
        }
    }

    // ========================================================================== //

    /**
     * Function xmlRequest
     *
     * @param string $url
     * @param string $data
     * @param int    $timeout
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 32:35
     */
    public function xmlRequest(string $url = '', string $data = '', int $timeout = 60)
    {
        if (empty($url) || empty($data)) {
            return NULL;
        }
        try {
            // create a log channel
            $formatter = new LineFormatter($this->mono['outputFormat'], $this->mono['dateFormat']);
            $stream    = new StreamHandler($this->logger_path . 'xmlRequest/' . $this->logger_file, Logger::INFO, $this->mono['monoBubble'], $this->mono['monoFilePermission']);
            $stream->setFormatter($formatter);
            $logger = new Logger('request');
            $logger->pushHandler($stream);
            if ($this->DEBUG === TRUE) {
                $logger->info('||=========== Logger xmlRequest ===========||');
                $logger->info('Request URL: ' . $url);
                $logger->info('Request Data: ' . $data);
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            $head[] = "Content-type: text/xml;charset=utf-8";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $page = curl_exec($ch);
            curl_close($ch);
            if ($this->DEBUG === TRUE) {
                $logger->info('Response from Request: ' . $page);
            }

            return $page;
        }
        catch (Exception $e) {
            log_message('error', $e->getMessage());
            log_message('error', $e->getTraceAsString());

            return NULL;
        }
    }

    /**
     * Function xmlGetValue
     *
     * @param $xml
     * @param $openTag
     * @param $closeTag
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 32:32
     */
    public function xmlGetValue($xml, $openTag, $closeTag)
    {
        $f = strpos($xml, $openTag) + strlen($openTag);
        $l = strpos($xml, $closeTag);

        return ($f <= $l) ? substr($xml, $f, $l - $f) : "";
    }
}
