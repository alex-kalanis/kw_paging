<?php

namespace TraitsTests;


use kalanis\kw_paging\Interfaces\IPGTranslations;
use kalanis\kw_paging\Traits\TLang;
use kalanis\kw_paging\Translations;


class LangTest extends \CommonTestClass
{
    public function testSimple(): void
    {
        $lib = new XLang();
        $this->assertNotEmpty($lib->getKpgLang());
        $this->assertInstanceOf(Translations::class, $lib->getKpgLang());
        $lib->setKpgLang(new XTrans());
        $this->assertInstanceOf(XTrans::class, $lib->getKpgLang());
        $lib->setKpgLang(null);
        $this->assertInstanceOf(Translations::class, $lib->getKpgLang());
    }
}


class XLang
{
    use TLang;
}


class XTrans implements IPGTranslations
{
    public function kpgShowResults(int $from, int $to, int $max): string
    {
        return 'mock';
    }
}
