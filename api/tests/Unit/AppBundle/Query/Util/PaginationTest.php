<?php

namespace Tests\Unit\AppBundle\Query\Util;

use AppBundle\Query\Util\Pagination;
use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function pageEqualZeroIsInvalid()
    {
        new Pagination(0);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function pageLessThanZeroIsInvalid()
    {
        new Pagination(-1);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function limitEqualZeroIsInvalid()
    {
        new Pagination(1, 0);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function limitLessThanZeroIsInvalid()
    {
        new Pagination(1, -1);
    }

    /**
     * @test
     */
    public function limitAndPageGreaterThanZeroAreAcceptable()
    {
        $page = 2;
        $limit = 20;

        $pagination = new Pagination($page, $limit);

        $this->assertEquals($page, $pagination->page());
        $this->assertEquals($limit, $pagination->limit());
    }
}