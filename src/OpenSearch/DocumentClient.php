<?php
/**
 * Created by IntelliJ IDEA.
 * User: rek
 * Date: 2017/9/20
 * Time: 上午11:54
 */

namespace x2lib\aliyun\OpenSearch;


use OpenSearch\Client\OpenSearchClient;

class DocumentClient {
    /**
     * @var \OpenSearch\Client\DocumentClient
     */
    protected $dc;

    /**
     * @var string
     */
    public $appName;

    public function __construct(OpenSearchClient $client, string $appName) {
        $this->dc = new \OpenSearch\Client\DocumentClient($client);
        $this->appName = $appName;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function add($fields) {
        $this->dc->add($fields);
        return $this;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function update($fields) {
        $this->dc->update($fields);
        return $this;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function remove($fields) {
        $this->dc->remove($fields);
        return $this;
    }

    /**
     * @param string $tableName
     *
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     */
    public function commit($tableName) {
        $result = $this->dc->commit($this->appName, $tableName);
        $this->dc->docs = [];
        return $result;
    }
}