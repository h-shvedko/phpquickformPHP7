<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:49
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsFileTest extends TestCase
{
    protected static $quickFormInputsFileInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_FILE;
    protected static $testStringValue = 'TestValue';
    protected static $testSuccessIndexOfArray = 'label';
    protected static $testFailedIndexOfArray = 'fail';
    protected static $nameOfElement = 'testName';
    protected static $attributes = ['name' => 'testName', 'label' => 'TestAttribute'];
    protected static $newValueOfAttribute = 'TestNewAttribute';
    protected static $html = '<div>Test HTML</div>';
    protected static $templateStart = '<input';
    protected static $templateEnd = ' />';
    protected static $incorrectType = A_QuickFormInputsFactoryPHP7::TYPE_INPUT;
    protected static $size = 10;


    public static function setUpBeforeClass()
    {
        self::$quickFormInputsFileInstance = new QuickFormInputsFile(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsFileInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsFile class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsFileInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsFile class';
        $test = new QuickFormInputsFile(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsFileInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsFile class';
        $this->assertTrue(is_array(self::$quickFormInputsFileInstance->getAttributes()) && count(self::$quickFormInputsFileInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsFile class';
        $test = new QuickFormInputsFile(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsFileInstance->getAttributes()) && count(self::$quickFormInputsFileInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsFile class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsFileInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsFileInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsFileInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsFile class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsFileInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsFileInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsFileInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsFile class';
        $this->assertEquals(self::$type, self::$quickFormInputsFileInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setType(self::$incorrectType);
        self::$quickFormInputsFileInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsFileInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsFile class';
        $this->assertEquals('', self::$quickFormInputsFileInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setChecked('checked');
        self::$quickFormInputsFileInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsFileInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsFile class';
        $this->assertEquals('', self::$quickFormInputsFileInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setPattern('{0,9}');
        self::$quickFormInputsFileInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsFileInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsFile class';
        $this->assertEquals('', self::$quickFormInputsFileInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setPlaceholder('placeholder');
        self::$quickFormInputsFileInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsFileInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsFile class';
        $this->assertEquals('', self::$quickFormInputsFileInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsFileInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsFile class';
        $this->assertEquals(0, self::$quickFormInputsFileInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setSize(self::$size);
        self::$quickFormInputsFileInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsFileInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsFile class';
        $this->assertEquals('', self::$quickFormInputsFileInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsFileInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsFileInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsFileInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsFileInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsFileInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setType(self::$type);
        self::$quickFormInputsFileInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsFileInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setRequired(true);
        self::$quickFormInputsFileInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsFileInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsFile class';
        $this->assertEquals(false, self::$quickFormInputsFileInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setHidden(true);
        self::$quickFormInputsFileInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsFileInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsFileInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsFileInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsFileInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsFileInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsFileInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsFileInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsFileInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsFileInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsFileInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsFile class';
        self::$quickFormInputsFileInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsFileInstance->getDefaultValue(), $message);
    }
}
