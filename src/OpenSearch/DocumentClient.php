<?php
/**
 * Created by IntelliJ IDEA.
 * User: rek
 * Date: 2017/9/20
 * Time: 上午11:54
 */

namespace x2lib\aliyun\OpenSearch;


class DocumentClient extends \OpenSearch\Client\DocumentClient {
    /**
     * @param array $fields
     *
     * @return $this
     */
    public function add($fields) {
        parent::add($fields);
        return $this;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function update($fields) {
        parent::update($fields);
        return $this;
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function remove($fields) {
        parent::remove($fields);
        return $this;
    }

    /**
     * @param string $appName
     * @param string $tableName
     *
     * @return \OpenSearch\Generated\Common\OpenSearchResult
     */
    public function commit($appName, $tableName) {
        $result = parent::commit($appName, $tableName);
        $this->docs = [];
        return $result;
    }
}