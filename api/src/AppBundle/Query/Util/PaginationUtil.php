<?php

namespace AppBundle\Query\Util;

class PaginationUtil
{
    const DEFAULT_PAGE = 1;
    const DEFAULT_LIMIT = 10;

    private $page;
    private $limit;

    public function __construct(int $page = self::DEFAULT_PAGE, int $limit = self::DEFAULT_LIMIT)
    {
        $this->limitGuard($limit);
        $this->pageGuard($page);

        $this->page = $page;
        $this->limit = $limit;
    }

    public function limit() : int
    {
        return $this->limit;
    }

    public function page() : int
    {
        return $this->page;
    }

    public function offset() : int
    {
        return ceil(($this->page - 1) * $this->limit);
    }

    private function limitGuard($limit)
    {
        if ($limit <= 0) {
            throw new \InvalidArgumentException('Invalid limit value: ' . $limit);
        }
    }

    private function pageGuard($page)
    {
        if ($page <= 0) {
            throw new \InvalidArgumentException('Invalid page value: ' . $page);
        }
    }
}