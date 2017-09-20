<?php
/**
 * Created by IntelliJ IDEA.
 * User: rek
 * Date: 2017/9/19
 * Time: 下午8:47
 */

namespace x2lib\aliyun;


use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Client\SearchClient;
use x2lib\aliyun\OpenSearch\DocumentClient;
use x2ts\Component;

/**
 * Class OpenSearch
 *
 * @package x2lib\aliyun
 *
 * @property-read OpenSearchClient $client
 * @property-read DocumentClient   $document
 * @property-read SearchClient     $search
 */
class OpenSearch extends Component {
    protected static $_conf = [
        'accessKeyId'     => '',
        'accessKeySecret' => '',
        'apiEndpoint'     => '',
        'appName'         => '',
        'debug'           => false,
        'gzip'            => false,
        'connectTimeout'  => 1,
        'timeout'         => 10,
    ];

    private $osc;

    public function getClient(): OpenSearchClient {
        if (!$this->osc instanceof OpenSearchClient) {
            $this->osc = new OpenSearchClient(
                $this->conf['accessKeyId'],
                $this->conf['accessKeySecret'],
                $this->conf['apiEndpoint'],
                [
                    'debug'          => $this->conf['debug'],
                    'gzip'           => $this->conf['gzip'],
                    'connectTimeout' => $this->conf['connectTimeout'],
                    'timeout'        => $this->conf['timeout'],
                ]
            );
        }
        return $this->osc;
    }

    private $doc;

    public function getDocument(): DocumentClient {
        if (!$this->doc instanceof DocumentClient) {
            $this->doc = new DocumentClient($this->client);
        }
        return $this->doc;
    }

    public function getSearch(): SearchClient {
        return new SearchClient($this->client);
    }
}