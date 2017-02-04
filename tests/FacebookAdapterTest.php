<?php

namespace Tests\Marketing\Product\Catalog;

use Verybuy\Marketing\Product\Catalog\Factory\MarketingFactory;
use Verybuy\Marketing\Product\Catalog\Adapter\AdapterContract;

class FacebookAdapterTest extends AbstractTestCase
{
    protected $config;
    protected $resourceStub;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->config = [
            'title' => 'Verybuy Store',
            'link' => 'http://www.verybuy.cc'
        ];

        $this->resourceStub = [
            [
                'id' => '745130',
                'title' => '包郵大碼女內褲性感蕾絲面料透明網紗中腰三角褲包臀無痕提臀胖mm',
                'description' => '包郵大碼女內褲性感蕾絲面料透明網紗中腰三角褲包臀無痕提臀胖mm',
                'brand' => '236',
                'link' => '236',
                'image_link' => '236',
                'condition' => '236',
                'availability' => '236',
                'price' => '236',
                'product_type' => 1,
                'google_product_category' => 1,
                'custom_label_0' => 100,
                'shipping' => [
                    'country' => 'TW',
                    'service' => 'Standard',
                    'price' => '236 TWD',
                ]
            ],
            [
                'id' => '745123',
                'title' => '一片式無肩帶內衣聚攏防滑隱形婚紗禮服專用美背小胸加厚文胸套裝',
                'description' => '一片式無肩帶內衣聚攏防滑隱形婚紗禮服專用美背小胸加厚文胸套裝',
                'price' => 0,
                'brand' => '236',
                'link' => '236',
                'image_link' => '236',
                'condition' => '236',
                'availability' => '236',
                'product_type' => 1,
                'custom_label_0' => 100,
                'google_product_category' => 1,
                'shipping' => [
                    'country' => 'TW',
                    'service' => 'Standard',
                    'price' => '236 TWD',
                ]
            ],
        ];
    }

    public function testRenderXML()
    {
        $xml = MarketingFactory::create(AdapterContract::FACEBOOK)
            ->config($this->config)
            ->import($this->resourceStub)
             ->toXml()
        ;
        //@todo xml assert
    }

    public function testAdapterSetConfig()
    {
        /**
         * @todo set adapter config
         */
    }

    public function testAdapterImport()
    {
        /**
         * @todo assert success resource
         */

        /**
         * @todo assert failure resource
         */
    }
}
