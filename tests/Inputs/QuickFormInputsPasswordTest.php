<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:55
 */

use PHPUnit\Framework\TestCase;

class QuickFormInputsPasswordTest extends TestCase
{
    protected static $quickFormInputsPasswordInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_PASSWORD;
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
        self::$quickFormInputsPasswordInstance = new QuickFormInputsPassword(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsPasswordInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsPassword class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsPasswordInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsPassword class';
        $test = new QuickFormInputsPassword(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsPasswordInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsPassword class';
        $this->assertTrue(is_array(self::$quickFormInputsPasswordInstance->getAttributes()) && count(self::$quickFormInputsPasswordInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsPassword class';
        $test = new QuickFormInputsPassword(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsPasswordInstance->getAttributes()) && count(self::$quickFormInputsPasswordInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsPassword class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsPasswordInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsPasswordInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsPasswordInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsPassword class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsPasswordInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsPasswordInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsPasswordInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsPassword class';
        $this->assertEquals(self::$type, self::$quickFormInputsPasswordInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setType(self::$incorrectType);
        self::$quickFormInputsPasswordInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsPasswordInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsPassword class';
        $this->assertEquals('', self::$quickFormInputsPasswordInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setChecked('checked');
        self::$quickFormInputsPasswordInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsPasswordInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsPassword class';
        $this->assertEquals('', self::$quickFormInputsPasswordInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setPattern('{0,9}');
        self::$quickFormInputsPasswordInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsPasswordInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsPassword class';
        $this->assertEquals('', self::$quickFormInputsPasswordInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setPlaceholder('placeholder');
        self::$quickFormInputsPasswordInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsPasswordInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsPassword class';
        $this->assertEquals('', self::$quickFormInputsPasswordInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsPasswordInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsPassword class';
        $this->assertEquals(0, self::$quickFormInputsPasswordInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setSize(self::$size);
        self::$quickFormInputsPasswordInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsPasswordInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsPassword class';
        $this->assertEquals('', self::$quickFormInputsPasswordInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsPasswordInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsPasswordInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsPasswordInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsPasswordInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsPasswordInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setType(self::$type);
        self::$quickFormInputsPasswordInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsPasswordInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setRequired(true);
        self::$quickFormInputsPasswordInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsPasswordInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsPassword class';
        $this->assertEquals(false, self::$quickFormInputsPasswordInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setHidden(true);
        self::$quickFormInputsPasswordInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsPasswordInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsPasswordInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsPasswordInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsPasswordInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsPasswordInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsPasswordInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsPasswordInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsPasswordInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsPasswordInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsPasswordInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsPassword class';
        self::$quickFormInputsPasswordInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsPasswordInstance->getDefaultValue(), $message);
    }
}
