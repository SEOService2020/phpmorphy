<?php
/**
 * Test class for phpMorphy_UserDict_EncodingConverter.
 * Generated by PHPUnit on 2010-11-30 at 04:49:28.
 */
class phpMorphy_UserDict_EncodingConverterTest extends \PHPUnit\Framework\TestCase {
    const MORPHY_ENCODING = 'windows-1251';
    const MORPHY_CASE = MB_CASE_UPPER;
    const INTERNAL_ENCODING = 'utf-8';
    const INTERNAL_CASE = MB_CASE_LOWER;

    /**
     * @var phpMorphy_UserDict_EncodingConverter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() : void
    {
        $this->object = new phpMorphy_UserDict_EncodingConverter(
            self::MORPHY_ENCODING,
            self::MORPHY_CASE,
            self::INTERNAL_ENCODING,
            self::INTERNAL_CASE
        );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testToMorphy()
    {
        $this->assertEquals(
            iconv(self::INTERNAL_ENCODING, self::MORPHY_ENCODING, 'АБВ'),
            $this->object->toMorphy('абв')
        );
    }

    public function testToInternal()
    {
        $this->assertEquals(
            'абв',
            $this->object->toInternal(iconv(self::INTERNAL_ENCODING, self::MORPHY_ENCODING, 'АБВ'))
        );
    }
}

