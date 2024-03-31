<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_paging\Traits\THelpingText;
use kalanis\kw_paging\Translations;


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

    public function testTranslations(): void
    {
        $position = $this->getPositions();
        $position->getPager()->setActualPage(4);
        $lib = new HelpingText();
        $this->assertEmpty($lib->getFilledText($position));
        $lib->setKpgLang(new Translations());
        $this->assertNotEmpty($lib->getFilledText($position));
    }
}


class HelpingText
{
    use THelpingText;
}
