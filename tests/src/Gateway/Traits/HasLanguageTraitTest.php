<?php

namespace Paytic\Omnipay\Common\Tests\Gateway\Traits;

use Paytic\Omnipay\Common\Tests\AbstractTest;
use Paytic\Omnipay\Common\Tests\Fixtures\Gateway;

/**
 * Class HasLanguageTraitTest
 * @package Paytic\Omnipay\Common\Tests\Gateway\Traits
 */
class HasLanguageTraitTest extends AbstractTest
{
    /**
     * @param $lang
     * @param $params
     * @param $expectedParams
     * @dataProvider data_populateRequestLangParam
     */
    public function test_populateRequestLangParam($lang, $params, $expectedParams)
    {
        $gateway = new Gateway();
        $gateway->setLang($lang);
        $gateway->populateRequestLangParam($params);
        self::assertSame($expectedParams, $params);
    }

    /**
     * @return array[]
     */
    public function data_populateRequestLangParam()
    {
        return [
            [null, [], []],
            ['', [], []],
            [false, [], []],
            ['en', [], ['lang' => 'en']],
            ['en', ['lang' => ''], ['lang' => 'en']],
            ['en', ['lang' => null], ['lang' => 'en']],
            ['en', ['lang' => false], ['lang' => 'en']],
            ['en', ['lang' => 'ro'], ['lang' => 'ro']],
        ];
    }
}
