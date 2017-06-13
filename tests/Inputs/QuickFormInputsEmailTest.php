<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 14:25
 */

use PHPUnit\Framework\TestCase;

class QuickFormInputsEmailTest extends TestCase
{
    protected static $quickFormInputsTextInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_EMAIL;
    protected static $testStringValue = 'TestValue';
    protected static $testSuccessIndexOfArray = 'label';
    protected static $testFailedIndexOfArray = 'fail';
    protected static $nameOfElement = 'testName';
    protected static $attributes = ['name' => 'testName', 'label' => 'TestAttribute'];
    protected static $newValueOfAttribute = 'TestNewAttribute';
    protected static $html = '<div>Test HTML</div>';
    protected static $templateStart = '<input';
    protected static $templateEnd = ' />';
    protected static $incorrectType = A_QuickFormInputsFactoryPHP7::TYPE_FILE;
    protected static $size = 10;


    public static function setUpBeforeClass()
    {
        self::$quickFormInputsTextInstance = new QuickFormInputsEmail(self::$nameOfElement, self::$attributes, self::$type);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsTextInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsTextInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsText class';
        $test = new QuickFormInputsText(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsTextInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsText class';
        $this->assertTrue(is_array(self::$quickFormInputsTextInstance->getAttributes()) && count(self::$quickFormInputsTextInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsText class';
        $test = new QuickFormInputsText(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsTextInstance->getAttributes()) && count(self::$quickFormInputsTextInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsTextInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsTextInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsTextInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsTextInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsTextInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsTextInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$type, self::$quickFormInputsTextInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setType(self::$incorrectType);
        self::$quickFormInputsTextInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsTextInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsTextInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setChecked('checked');
        self::$quickFormInputsTextInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsTextInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsTextInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setPattern('{0,9}');
        self::$quickFormInputsTextInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsTextInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsTextInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setPlaceholder('placeholder');
        self::$quickFormInputsTextInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsTextInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsTextInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsTextInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsText class';
        $this->assertEquals(0, self::$quickFormInputsTextInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setSize(self::$size);
        self::$quickFormInputsTextInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsTextInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsTextInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsTextInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsTextInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsTextInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsTextInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsTextInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setType(self::$type);
        self::$quickFormInputsTextInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsTextInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setRequired(true);
        self::$quickFormInputsTextInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsTextInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsText class';
        $this->assertEquals(false, self::$quickFormInputsTextInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setHidden(true);
        self::$quickFormInputsTextInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsTextInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsTextInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsTextInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsTextInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsTextInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsTextInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsTextInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsTextInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsTextInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsTextInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsText class';
        self::$quickFormInputsTextInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsTextInstance->getDefaultValue(), $message);
    }
}
