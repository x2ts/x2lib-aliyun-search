<?php
/**
 * Created by IntelliJ IDEA.
 * User: rek
 * Date: 2017/9/27
 * Time: 下午2:45
 */

namespace x2lib\aliyun\OpenSearch;


use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Util\SearchParamsBuilder;

class SearchClient {
    /**
     * @var string
     */
    private $appName;

    /**
     * @var \OpenSearch\Client\SearchClient
     */
    private $search;

    /**
     * @var SearchParamsBuilder
     */
    private $paramBuilder;

    private function initParamBuilder() {
        $this->paramBuilder = new SearchParamsBuilder();
        $this->paramBuilder->setAppName($this->appName);
    }

    public function __construct(OpenSearchClient $osc, string $appName) {
        $this->search = new \OpenSearch\Client\SearchClient($osc);
        $this->appName = $appName;
        $this->initParamBuilder();
    }

    public function execute() {
        $ret = $this->search->execute($this->paramBuilder->build());
        $this->initParamBuilder();
        return $ret;
    }

    public function setStart(int $start) {
        $this->paramBuilder->setStart($start);
        return $this;
    }

    public function setHit(int $hits) {
        $this->paramBuilder->setHits($hits);
        return $this;
    }

    public function setFormat(string $format) {
        $this->paramBuilder->setFormat($format);
        return $this;
    }

    public function setQuery(string $query) {
        $this->paramBuilder->setQuery($query);
        return $this;
    }

    public function addFilter(string $filter, string $condition = 'AND') {
        $this->paramBuilder->addFilter($filter, $condition);
        return $this;
    }

    public function setFilter(string $filter) {
        $this->paramBuilder->setFilter($filter);
        return $this;
    }

    public function addSort(string $field, $desc = true) {
        $this->paramBuilder->addSort($field, $desc ?
            SearchParamsBuilder::SORT_DECREASE : SearchParamsBuilder::SORT_INCREASE
        );
        return $this;
    }

    public function addSummary(array $summaryMeta) {
        $this->paramBuilder->addSummary($summaryMeta);
        return $this;
    }

    public function addDistinct(array $distinct) {
        $this->paramBuilder->addDistinct($distinct);
        return $this;
    }

    public function setKvPairs(string $pairs) {
        $this->paramBuilder->setKvPairs($pairs);
        return $this;
    }

    public function addAggregate(array $agg) {
        $this->paramBuilder->addAggregate($agg);
        return $this;
    }

    public function getParamBuilder(): SearchParamsBuilder {
        return $this->paramBuilder;
    }

    public function setParamBuilder(SearchParamsBuilder $paramBuilder) {
        $this->paramBuilder = $paramBuilder;
        return $this;
    }

    public function addDisableFunctions(string $disabledFunction) {
        $this->paramBuilder->addDisableFunctions($disabledFunction);
        return $this;
    }

    public function addQueryProcessor(array $qpName) {
        $this->paramBuilder->addQueryProcessor($qpName);
        return $this;
    }

    public function setCustomConfig(string $key, $value) {
        $this->paramBuilder->setCustomConfig($key, $value);
        return $this;
    }

    public function setCustomParam(string $key, string $value) {
        $this->paramBuilder->setCustomParam($key, $value);
        return $this;
    }

    public function setFetchFields(array $fetchFields) {
        $this->paramBuilder->setFetchFields($fetchFields);
        return $this;
    }

    public function setRouteValue($routeValue) {
        $this->paramBuilder->setRouteValue($routeValue);
    }

    public function setFirstRankName(string $firstRankName) {
        $this->paramBuilder->setFirstRankName($firstRankName);
        return $this;
    }

    public function setSecondRankName(string $secondRankName) {
        $this->paramBuilder->setSecondRankName($secondRankName);
        return $this;
    }

    public function setScrollExpire(string $expiredTime) {
        $this->paramBuilder->setScrollExpire($expiredTime);
        return $this;
    }

    public function setScrollId(string $scrollId) {
        $this->paramBuilder->setScrollId($scrollId);
        return $this;
    }
}