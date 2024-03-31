<?php

namespace TraitsTests;


use kalanis\kw_pager\BasicPager;
use kalanis\kw_paging\Interfaces\IPositions;
use kalanis\kw_paging\Positions;
use kalanis\kw_paging\Traits\TPositions;


class PositionTest extends \CommonTestClass
{
    public function testPass(): void
    {
        $lib = new XPos();
        $lib->setPosition(new Positions(new BasicPager()));
        $this->assertInstanceOf(IPositions::class, $lib->getPositions());
    }

    public function testFail(): void
    {
        $lib = new XPos();
        $this->expectException(\LogicException::class);
        $lib->getPositions();
    }
}


class XPos
{
    use TPositions;

    public function setPosition(?IPositions $positions): void
    {
        $this->positions = $positions;
    }
}
