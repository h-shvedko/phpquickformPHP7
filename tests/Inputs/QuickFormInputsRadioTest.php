<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:43
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsRadioTest extends TestCase
{
    protected static $quickFormInputsRadioInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_RADIO;
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
        self::$quickFormInputsRadioInstance = new QuickFormInputsCheckBox(self::$nameOfElement, self::$attributes, A_QuickFormInputsFactoryPHP7::TYPE_RADIO);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsRadioInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsRadioInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsCheckBox class';
        $test = new QuickFormInputsCheckBox(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsRadioInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsCheckBox class';
        $this->assertTrue(is_array(self::$quickFormInputsRadioInstance->getAttributes()) && count(self::$quickFormInputsRadioInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsCheckBox class';
        $test = new QuickFormInputsCheckBox(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsRadioInstance->getAttributes()) && count(self::$quickFormInputsRadioInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsRadioInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsRadioInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsRadioInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsRadioInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsRadioInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsRadioInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$type, self::$quickFormInputsRadioInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setType(self::$incorrectType);
        self::$quickFormInputsRadioInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsRadioInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsRadioInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setChecked('checked');
        self::$quickFormInputsRadioInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsRadioInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsRadioInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setPattern('{0,9}');
        self::$quickFormInputsRadioInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsRadioInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsRadioInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setPlaceholder('placeholder');
        self::$quickFormInputsRadioInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsRadioInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsRadioInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsRadioInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsCheckBox class';
        $this->assertEquals(0, self::$quickFormInputsRadioInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setSize(self::$size);
        self::$quickFormInputsRadioInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsRadioInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsRadioInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsRadioInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsRadioInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsRadioInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsRadioInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsRadioInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setType(self::$type);
        self::$quickFormInputsRadioInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsRadioInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setRequired(true);
        self::$quickFormInputsRadioInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsRadioInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsCheckBox class';
        $this->assertEquals(false, self::$quickFormInputsRadioInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setHidden(true);
        self::$quickFormInputsRadioInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsRadioInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsRadioInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsRadioInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsRadioInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsRadioInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsRadioInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsRadioInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsRadioInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsRadioInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsRadioInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsCheckBox class';
        self::$quickFormInputsRadioInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsRadioInstance->getDefaultValue(), $message);
    }
}
