<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 14:03
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsSelectTest extends TestCase
{
    protected static $quickFormInputsSelectInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_SELECT;
    protected static $testStringValue = 'TestValue';
    protected static $testSuccessIndexOfArray = 'label';
    protected static $testFailedIndexOfArray = 'fail';
    protected static $nameOfElement = 'testName';
    protected static $attributes = ['name' => 'testName', 'label' => 'TestAttribute'];
    protected static $newValueOfAttribute = 'TestNewAttribute';
    protected static $html = '<div>Test HTML</div>';
    protected static $templateStart = '<select';
    protected static $templateEnd = '>';
    protected static $incorrectType = A_QuickFormInputsFactoryPHP7::TYPE_FILE;
    protected static $size = 10;


    public static function setUpBeforeClass()
    {
        self::$quickFormInputsSelectInstance = new QuickFormInputsSelect(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsSelectInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsSelect class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsSelectInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsSelect class';
        $test = new QuickFormInputsSelect(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsSelectInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsSelect class';
        $this->assertTrue(is_array(self::$quickFormInputsSelectInstance->getAttributes()) && count(self::$quickFormInputsSelectInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsSelect class';
        $test = new QuickFormInputsSelect(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsSelectInstance->getAttributes()) && count(self::$quickFormInputsSelectInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsSelect class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsSelectInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsSelectInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsSelectInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsSelect class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsSelectInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsSelectInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsSelectInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsSelect class';
        $this->assertEquals(self::$type, self::$quickFormInputsSelectInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setType(self::$incorrectType);
        self::$quickFormInputsSelectInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsSelectInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsSelect class';
        $this->assertEquals('', self::$quickFormInputsSelectInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setChecked('checked');
        self::$quickFormInputsSelectInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsSelectInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsSelect class';
        $this->assertEquals('', self::$quickFormInputsSelectInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setPattern('{0,9}');
        self::$quickFormInputsSelectInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsSelectInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsSelect class';
        $this->assertEquals('', self::$quickFormInputsSelectInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setPlaceholder('placeholder');
        self::$quickFormInputsSelectInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsSelectInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsSelect class';
        $this->assertEquals('', self::$quickFormInputsSelectInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsSelectInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsSelect class';
        $this->assertEquals(0, self::$quickFormInputsSelectInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setSize(self::$size);
        self::$quickFormInputsSelectInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsSelectInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsSelect class';
        $this->assertEquals('', self::$quickFormInputsSelectInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsSelectInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsSelectInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsSelectInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsSelectInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsSelectInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setType(self::$type);
        self::$quickFormInputsSelectInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsSelectInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setRequired(true);
        self::$quickFormInputsSelectInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsSelectInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsSelect class';
        $this->assertEquals(false, self::$quickFormInputsSelectInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setHidden(true);
        self::$quickFormInputsSelectInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsSelectInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsSelectInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsSelectInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsSelectInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsSelectInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsSelectInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsSelectInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->getDefaultValue(), $message);
    }

    public function testGetOptions_validValue_successful()
    {
        $message = 'Incorrect attribute $options in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setOptions(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->getOptions(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetOptions_invalidValue_failed()
    {
        $message = 'Incorrect attribute $options in QuickFormInputsSelect class';
        self::$quickFormInputsSelectInstance->setOptions(self::$html);
        self::$quickFormInputsSelectInstance->setOptions(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsSelectInstance->setOptions(), $message);
    }
}
