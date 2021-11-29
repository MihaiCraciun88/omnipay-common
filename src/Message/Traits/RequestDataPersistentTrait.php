<?php

namespace Paytic\Omnipay\Common\Message\Traits;

/**
 * Trait RequestDataPersistentTrait
 * @package ByTIC\Omnipay\Mobilpay\Message\Traits
 */
trait RequestDataPersistentTrait
{
    protected $data = null;

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setDataItem($key, $value)
    {
        $this->checkInitData();
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasDataItem($key)
    {
        $this->checkInitData();

        return isset($this->data[$key]);
    }

    protected function checkInitData()
    {
        $this->data = is_array($this->data) ? $this->data : [];
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getDataItem($key)
    {
        return $this->data[$key];
    }

    /**
     * @return array
     */
    public function getDataArray()
    {
        $this->checkInitData();

        return $this->data;
    }
}
