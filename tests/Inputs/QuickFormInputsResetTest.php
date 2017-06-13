<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:59
 */

use PHPUnit\Framework\TestCase;

class QuickFormInputsResetTest extends TestCase
{
    protected static $quickFormInputsResetInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_RESET;
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
        self::$quickFormInputsResetInstance = new QuickFormInputsReset(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsResetInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsReset class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsResetInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsReset class';
        $test = new QuickFormInputsReset(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsResetInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsReset class';
        $this->assertTrue(is_array(self::$quickFormInputsResetInstance->getAttributes()) && count(self::$quickFormInputsResetInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsReset class';
        $test = new QuickFormInputsReset(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsResetInstance->getAttributes()) && count(self::$quickFormInputsResetInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsReset class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsResetInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsResetInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsResetInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsReset class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsResetInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsResetInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsResetInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsReset class';
        $this->assertEquals(self::$type, self::$quickFormInputsResetInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setType(self::$incorrectType);
        self::$quickFormInputsResetInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsResetInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsReset class';
        $this->assertEquals('', self::$quickFormInputsResetInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setChecked('checked');
        self::$quickFormInputsResetInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsResetInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsReset class';
        $this->assertEquals('', self::$quickFormInputsResetInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setPattern('{0,9}');
        self::$quickFormInputsResetInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsResetInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsReset class';
        $this->assertEquals('', self::$quickFormInputsResetInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setPlaceholder('placeholder');
        self::$quickFormInputsResetInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsResetInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsReset class';
        $this->assertEquals('', self::$quickFormInputsResetInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsResetInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsReset class';
        $this->assertEquals(0, self::$quickFormInputsResetInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setSize(self::$size);
        self::$quickFormInputsResetInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsResetInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsReset class';
        $this->assertEquals('', self::$quickFormInputsResetInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsResetInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsResetInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsResetInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsResetInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsResetInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setType(self::$type);
        self::$quickFormInputsResetInstance->setRequired(true);
        $this->assertEquals(false, self::$quickFormInputsResetInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setRequired(true);
        self::$quickFormInputsResetInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsResetInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsReset class';
        $this->assertEquals(false, self::$quickFormInputsResetInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setHidden(true);
        self::$quickFormInputsResetInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsResetInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsResetInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsResetInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsResetInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsResetInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsResetInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsResetInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsResetInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsResetInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsResetInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsReset class';
        self::$quickFormInputsResetInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsResetInstance->getDefaultValue(), $message);
    }
}
