<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_paging\Render;


class CliExpandPagerTest extends CommonTestClass
{
    public function testMiddle(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setActualPage(4);
        $pager = new Render\CliExpandPager($position);
        $this->assertEquals($this->middle(), strval($pager));
    }

    protected function middle(): string
    {
        return '<< 1 | < 3 | 1 | 2 | 3 | *4* | 5 | 6 | 7 | 5 > | 7 >>' . PHP_EOL . 'Showing results 37 - 48 of total 75';
    }

    public function testStart(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setActualPage($position->getFirstPage());
        $pager = new Render\CliExpandPager($position);
        $this->assertEquals($this->start(), strval($pager));
    }

    protected function start(): string
    {
        return '-- | - | *1* | 2 | 3 | 4 | 5 | 6 | 7 | 2 > | 7 >>' . PHP_EOL . 'Showing results 1 - 12 of total 75';
    }

    public function testEnd(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setActualPage($position->getLastPage());
        $pager = new Render\CliExpandPager($position);
        $this->assertEquals($this->end(), strval($pager));
    }

    protected function end(): string
    {
        return '<< 1 | < 6 | 1 | 2 | 3 | 4 | 5 | 6 | *7* | - | --' . PHP_EOL . 'Showing results 73 - 75 of total 75';
    }

    public function testNothing(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setMaxResults(10)->setActualPage($position->getFirstPage());
        $pager = new Render\CliExpandPager($position);
        $this->assertEquals($this->nothing(), strval($pager));
    }

    protected function nothing(): string
    {
        return 'Showing results 1 - 10 of total 10';
    }
}
