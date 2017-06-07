<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 14:25
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsHiddenTest extends TestCase
{
    protected static $quickFormInputsHiddenInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_HIDDEN;
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
        self::$quickFormInputsHiddenInstance = new QuickFormInputsText(self::$nameOfElement, self::$attributes, self::$type);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsHiddenInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsHiddenInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsText class';
        $test = new QuickFormInputsText(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsHiddenInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsText class';
        $this->assertTrue(is_array(self::$quickFormInputsHiddenInstance->getAttributes()) && count(self::$quickFormInputsHiddenInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsText class';
        $test = new QuickFormInputsText(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsHiddenInstance->getAttributes()) && count(self::$quickFormInputsHiddenInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsHiddenInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsHiddenInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsHiddenInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsHiddenInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsHiddenInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsHiddenInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsText class';
        $this->assertEquals(self::$type, self::$quickFormInputsHiddenInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setType(self::$incorrectType);
        self::$quickFormInputsHiddenInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsHiddenInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsHiddenInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setChecked('checked');
        self::$quickFormInputsHiddenInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsHiddenInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsHiddenInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setPattern('{0,9}');
        self::$quickFormInputsHiddenInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsHiddenInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsHiddenInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setPlaceholder('placeholder');
        self::$quickFormInputsHiddenInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsHiddenInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsHiddenInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsHiddenInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsText class';
        $this->assertEquals(0, self::$quickFormInputsHiddenInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setSize(self::$size);
        self::$quickFormInputsHiddenInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsHiddenInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsText class';
        $this->assertEquals('', self::$quickFormInputsHiddenInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsHiddenInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsHiddenInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsHiddenInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsHiddenInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsHiddenInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setType(self::$type);
        self::$quickFormInputsHiddenInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsHiddenInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setRequired(true);
        self::$quickFormInputsHiddenInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsHiddenInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsText class';
        $this->assertEquals(true, self::$quickFormInputsHiddenInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setHidden(true);
        self::$quickFormInputsHiddenInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsHiddenInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsHiddenInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsHiddenInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsHiddenInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsHiddenInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsHiddenInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsHiddenInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsHiddenInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsHiddenInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsHiddenInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsText class';
        self::$quickFormInputsHiddenInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsHiddenInstance->getDefaultValue(), $message);
    }
}
