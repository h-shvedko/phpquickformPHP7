<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:43
 */

use PHPUnit\Framework\TestCase;

class QuickFormInputsCheckBoxTest extends TestCase
{
    protected static $quickFormInputsCheckBoxInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_CHECKBOX;
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
        self::$quickFormInputsCheckBoxInstance = new QuickFormInputsCheckBox(self::$nameOfElement, self::$attributes, A_QuickFormInputsFactoryPHP7::TYPE_CHECKBOX);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsCheckBoxInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsCheckBoxInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsCheckBox class';
        $test = new QuickFormInputsCheckBox(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsCheckBoxInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsCheckBox class';
        $this->assertTrue(is_array(self::$quickFormInputsCheckBoxInstance->getAttributes()) && count(self::$quickFormInputsCheckBoxInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsCheckBox class';
        $test = new QuickFormInputsCheckBox(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsCheckBoxInstance->getAttributes()) && count(self::$quickFormInputsCheckBoxInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsCheckBoxInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsCheckBoxInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsCheckBoxInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsCheckBoxInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsCheckBoxInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsCheckBoxInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsCheckBox class';
        $this->assertEquals(self::$type, self::$quickFormInputsCheckBoxInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setType(self::$incorrectType);
        self::$quickFormInputsCheckBoxInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsCheckBoxInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsCheckBoxInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setChecked('checked');
        self::$quickFormInputsCheckBoxInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsCheckBoxInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsCheckBoxInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setPattern('{0,9}');
        self::$quickFormInputsCheckBoxInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsCheckBoxInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsCheckBoxInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setPlaceholder('placeholder');
        self::$quickFormInputsCheckBoxInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsCheckBoxInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsCheckBoxInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsCheckBoxInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsCheckBox class';
        $this->assertEquals(0, self::$quickFormInputsCheckBoxInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setSize(self::$size);
        self::$quickFormInputsCheckBoxInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsCheckBoxInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsCheckBox class';
        $this->assertEquals('', self::$quickFormInputsCheckBoxInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsCheckBoxInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsCheckBoxInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsCheckBoxInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsCheckBoxInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsCheckBoxInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setType(self::$type);
        self::$quickFormInputsCheckBoxInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsCheckBoxInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setRequired(true);
        self::$quickFormInputsCheckBoxInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsCheckBoxInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsCheckBox class';
        $this->assertEquals(false, self::$quickFormInputsCheckBoxInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setHidden(true);
        self::$quickFormInputsCheckBoxInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsCheckBoxInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsCheckBoxInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsCheckBoxInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsCheckBoxInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsCheckBoxInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsCheckBoxInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsCheckBoxInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsCheckBoxInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsCheckBoxInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsCheckBoxInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsCheckBox class';
        self::$quickFormInputsCheckBoxInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsCheckBoxInstance->getDefaultValue(), $message);
    }
}
