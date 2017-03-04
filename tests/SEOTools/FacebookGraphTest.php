<?php

namespace Artesaos\SEOTools\Tests;

use Artesaos\SEOTools\FacebookGraph;

/**
 * Class FacebookGraphTest.
 */
class FacebookGraphTest extends BaseTest {
    /**
     * @var FacebookGraph
     */
    protected $facebookGraph;

    /**
     * {@inheritdoc}
     */
    public function setUp() {
        parent::setUp();

        $this->facebookGraph = $this->app->make('seotools.facebook');
    }

    public function test_set_app_id() {
        $this->facebookGraph->setAppId('83748374387434009');

        $expected = '<meta property="fb:app_id" content="83748374387434009" />';

        $this->setRightAssertion($expected);
    }

    /**
     * @param $expectedString
     */
    protected function setRightAssertion($expectedString) {
        $expectedDom = $this->makeDomDocument($expectedString);
        $actualDom = $this->makeDomDocument($this->facebookGraph->generate());

        $this->assertEquals($expectedDom->C14N(), $actualDom->C14N());
    }
}
