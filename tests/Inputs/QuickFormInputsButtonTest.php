<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 10:44
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsButtonTest extends TestCase
{
    protected static $quickFormInputsButtonInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_BUTTON;
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
        self::$quickFormInputsButtonInstance = new QuickFormInputsButton(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsButtonInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsButton class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsButtonInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsButton class';
        $test = new QuickFormInputsButton(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsButtonInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsButton class';
        $this->assertTrue(is_array(self::$quickFormInputsButtonInstance->getAttributes()) && count(self::$quickFormInputsButtonInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsButton class';
        $test = new QuickFormInputsButton(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsButtonInstance->getAttributes()) && count(self::$quickFormInputsButtonInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsButton class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsButtonInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsButtonInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsButtonInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsButton class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsButtonInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsButtonInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsButtonInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsButton class';
        $this->assertEquals(self::$type, self::$quickFormInputsButtonInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setType(self::$incorrectType);
        self::$quickFormInputsButtonInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsButtonInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsButton class';
        $this->assertEquals('', self::$quickFormInputsButtonInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setChecked('checked');
        self::$quickFormInputsButtonInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsButtonInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsButton class';
        $this->assertEquals('', self::$quickFormInputsButtonInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setPattern('{0,9}');
        self::$quickFormInputsButtonInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsButtonInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsButton class';
        $this->assertEquals('', self::$quickFormInputsButtonInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setPlaceholder('placeholder');
        self::$quickFormInputsButtonInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsButtonInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsButton class';
        $this->assertEquals('', self::$quickFormInputsButtonInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsButtonInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsButton class';
        $this->assertEquals(0, self::$quickFormInputsButtonInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setSize(self::$size);
        self::$quickFormInputsButtonInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsButtonInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsButton class';
        $this->assertEquals('', self::$quickFormInputsButtonInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsButtonInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsButtonInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsButtonInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsButtonInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsButtonInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setType(self::$type);
        self::$quickFormInputsButtonInstance->setRequired(true);
        $this->assertEquals(false, self::$quickFormInputsButtonInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setRequired(true);
        self::$quickFormInputsButtonInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsButtonInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsButton class';
        $this->assertEquals(false, self::$quickFormInputsButtonInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setHidden(true);
        self::$quickFormInputsButtonInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsButtonInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsButtonInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsButtonInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsButtonInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsButtonInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsButtonInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsButtonInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsButtonInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsButtonInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsButtonInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsButton class';
        self::$quickFormInputsButtonInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsButtonInstance->getDefaultValue(), $message);
    }
}
