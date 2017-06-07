<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 14:24
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsSubmitTest extends TestCase
{
    protected static $quickFormInputsSubmitInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_SUBMIT;
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
        self::$quickFormInputsSubmitInstance = new QuickFormInputsSubmit(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsSubmitInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsSubmit class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsSubmitInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsSubmit class';
        $test = new QuickFormInputsSubmit(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsSubmitInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsSubmit class';
        $this->assertTrue(is_array(self::$quickFormInputsSubmitInstance->getAttributes()) && count(self::$quickFormInputsSubmitInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsSubmit class';
        $test = new QuickFormInputsSubmit(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsSubmitInstance->getAttributes()) && count(self::$quickFormInputsSubmitInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsSubmit class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsSubmitInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsSubmitInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsSubmitInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsSubmit class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsSubmitInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsSubmitInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsSubmitInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsSubmit class';
        $this->assertEquals(self::$type, self::$quickFormInputsSubmitInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setType(self::$incorrectType);
        self::$quickFormInputsSubmitInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsSubmitInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsSubmit class';
        $this->assertEquals('', self::$quickFormInputsSubmitInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setChecked('checked');
        self::$quickFormInputsSubmitInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsSubmitInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsSubmit class';
        $this->assertEquals('', self::$quickFormInputsSubmitInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setPattern('{0,9}');
        self::$quickFormInputsSubmitInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsSubmitInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsSubmit class';
        $this->assertEquals('', self::$quickFormInputsSubmitInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setPlaceholder('placeholder');
        self::$quickFormInputsSubmitInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsSubmitInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsSubmit class';
        $this->assertEquals('', self::$quickFormInputsSubmitInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsSubmitInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsSubmit class';
        $this->assertEquals(0, self::$quickFormInputsSubmitInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setSize(self::$size);
        self::$quickFormInputsSubmitInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsSubmitInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsSubmit class';
        $this->assertEquals('', self::$quickFormInputsSubmitInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsSubmitInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsSubmitInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsSubmitInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsSubmitInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsSubmitInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setType(self::$type);
        self::$quickFormInputsSubmitInstance->setRequired(true);
        $this->assertEquals(false, self::$quickFormInputsSubmitInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setRequired(true);
        self::$quickFormInputsSubmitInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsSubmitInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsSubmit class';
        $this->assertEquals(false, self::$quickFormInputsSubmitInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setHidden(true);
        self::$quickFormInputsSubmitInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsSubmitInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsSubmitInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsSubmitInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsSubmitInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsSubmitInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsSubmitInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsSubmitInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsSubmitInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsSubmitInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsSubmitInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsSubmit class';
        self::$quickFormInputsSubmitInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsSubmitInstance->getDefaultValue(), $message);
    }
}
