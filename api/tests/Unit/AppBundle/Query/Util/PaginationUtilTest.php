<?php

namespace Tests\Unit\AppBundle\Query\Util;

use AppBundle\Query\Util\PaginationUtil;
use PHPUnit\Framework\TestCase;

class PaginationUtilTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function pageEqualZeroIsInvalid()
    {
        new PaginationUtil(0);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function pageLessThanZeroIsInvalid()
    {
        new PaginationUtil(-1);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function limitEqualZeroIsInvalid()
    {
        new PaginationUtil(1, 0);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function limitLessThanZeroIsInvalid()
    {
        new PaginationUtil(1, -1);
    }

    /**
     * @test
     */
    public function limitAndPageGreaterThanZeroAreAcceptable()
    {
        $page = 2;
        $limit = 20;

        $pagination = new PaginationUtil($page, $limit);

        $this->assertEquals($page, $pagination->page());
        $this->assertEquals($limit, $pagination->limit());
    }
}