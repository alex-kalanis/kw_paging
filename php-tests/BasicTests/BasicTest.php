<?php

namespace BasicTests;


use CommonTestClass;


class BasicTest extends CommonTestClass
{
    public function testPositions(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setActualPage(4);
        $this->assertTrue($position->prevPageExists());
        $this->assertTrue($position->nextPageExists());

        $position->getPager()->setActualPage($position->getFirstPage());
        $this->assertFalse($position->prevPageExists());
        $position->getPager()->setActualPage($position->getLastPage());
        $this->assertFalse($position->nextPageExists());
    }
}
