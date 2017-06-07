<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 01/06/2017
 * Time: 13:52
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormInputsImageTest extends TestCase
{
    protected static $quickFormInputsImageInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_IMAGE;
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
        self::$quickFormInputsImageInstance = new QuickFormInputsImage(self::$nameOfElement, self::$attributes);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInputsImageInstance = null;
    }

    public function testConstructorName_validValue_successful()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsImage class';
        $this->assertEquals(self::$nameOfElement, self::$quickFormInputsImageInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorName_invalidValue_failed()
    {
        $message = 'Incorrect attribute $name in constructor of QuickFormInputsImage class';
        $test = new QuickFormInputsImage(self::$attributes, self::$attributes);
        $this->assertNotEquals(self::$nameOfElement . 'not', self::$quickFormInputsImageInstance->getName(), $message);
    }

    public function testConstructorAttributes_validValue_successful()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsImage class';
        $this->assertTrue(is_array(self::$quickFormInputsImageInstance->getAttributes()) && count(self::$quickFormInputsImageInstance->getAttributes()) >= 1, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorAttributes_invalidValue_failed()
    {
        $message = 'Incorrect attribute $attributes in constructor of QuickFormInputsImage class';
        $test = new QuickFormInputsImage(self::$nameOfElement, self::$nameOfElement);
        $this->assertNotEquals(!is_array(self::$quickFormInputsImageInstance->getAttributes()) && count(self::$quickFormInputsImageInstance->getAttributes()) == 0, $message);
    }

    public function testConstructorTemplateStart_validValue_successful()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsImage class';
        $this->assertEquals(self::$templateStart, self::$quickFormInputsImageInstance->getTemplateStart(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateStart_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateStart in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setTemplateStart(self::$templateStart . 'not');
        self::$quickFormInputsImageInstance->setTemplateStart(self::$attributes);
        $this->assertNotEquals(self::$templateStart, self::$quickFormInputsImageInstance->getTemplateStart(), $message);
    }

    public function testConstructorTemplateEnd_validValue_successful()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsImage class';
        $this->assertEquals(self::$templateEnd, self::$quickFormInputsImageInstance->getTemplateEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorTemplateEnd_invalidValue_failed()
    {
        $message = 'Incorrect attribute $templateEnd in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setTemplateEnd(self::$templateEnd . 'not');
        self::$quickFormInputsImageInstance->setTemplateEnd(self::$attributes);
        $this->assertNotEquals(self::$templateEnd, self::$quickFormInputsImageInstance->getTemplateEnd(), $message);
    }

    public function testConstructorType_validValue_successful()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsImage class';
        $this->assertEquals(self::$type, self::$quickFormInputsImageInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testConstructorType_invalidValue_failed()
    {
        $message = 'Incorrect attribute $type in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setType(self::$incorrectType);
        self::$quickFormInputsImageInstance->setType(self::$attributes);
        $this->assertNotEquals(self::$type, self::$quickFormInputsImageInstance->getType(), $message);
    }

    public function testGetChecked_validValue_successful()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsImage class';
        $this->assertEquals('', self::$quickFormInputsImageInstance->getChecked(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetChecked_invalidValue_failed()
    {
        $message = 'Incorrect attribute $checked in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setChecked('checked');
        self::$quickFormInputsImageInstance->setChecked(self::$attributes);
        $this->assertNotEquals('checked', self::$quickFormInputsImageInstance->getChecked(), $message);
    }

    public function testGetPattern_validValue_successful()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsImage class';
        $this->assertEquals('', self::$quickFormInputsImageInstance->getPattern(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPattern_invalidValue_failed()
    {
        $message = 'Incorrect attribute $pattern in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setPattern('{0,9}');
        self::$quickFormInputsImageInstance->setPattern(self::$attributes);
        $this->assertNotEquals('{0,9}', self::$quickFormInputsImageInstance->getPattern(), $message);
    }

    public function testGetPlaceholder_validValue_successful()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsImage class';
        $this->assertEquals('', self::$quickFormInputsImageInstance->getPlaceholder(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetPlaceholder_invalidValue_failed()
    {
        $message = 'Incorrect attribute $placeholder in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setPlaceholder('placeholder');
        self::$quickFormInputsImageInstance->setPlaceholder(self::$attributes);
        $this->assertNotEquals('placeholder', self::$quickFormInputsImageInstance->getPlaceholder(), $message);
    }

    public function testGetReadonly_validValue_successful()
    {
        $message = 'Incorrect attribute $readonly in QuickFormInputsImage class';
        $this->assertEquals('', self::$quickFormInputsImageInstance->getReadonly(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetReadonly_invalidValue_failed()
    {
        self::$quickFormInputsImageInstance->setReadonly(self::$attributes);
    }

    public function testGetSize_validValue_successful()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsImage class';
        $this->assertEquals(0, self::$quickFormInputsImageInstance->getSize(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSize_invalidValue_failed()
    {
        $message = 'Incorrect attribute $size in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setSize(self::$size);
        self::$quickFormInputsImageInstance->setSize(self::$attributes);
        $this->assertNotEquals(self::$size, self::$quickFormInputsImageInstance->getSize(), $message);
    }

    public function testGetValue_validValue_successful()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsImage class';
        $this->assertEquals('', self::$quickFormInputsImageInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetValue_invalidValue_failed()
    {
        $message = 'Incorrect attribute $value in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setValue(self::$newValueOfAttribute);
        self::$quickFormInputsImageInstance->setValue(self::$attributes);
        $this->assertNotEquals(self::$newValueOfAttribute, self::$quickFormInputsImageInstance->getValue(), $message);
    }

    public function testGetHtml_validValue_successful()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormInputsImageInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attribute $html in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setHtml(self::$html . '0000');
        self::$quickFormInputsImageInstance->setHtml(self::$attributes);
        $this->assertNotEquals(self::$html, self::$quickFormInputsImageInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setType(self::$type);
        self::$quickFormInputsImageInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormInputsImageInstance->isRequired(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attribute $required in constructor of QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setRequired(true);
        self::$quickFormInputsImageInstance->setRequired(self::$attributes);
        $this->assertNotEquals(true, self::$quickFormInputsImageInstance->isRequired(), $message);
    }

    public function testSetHidden_validValue_successful()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsImage class';
        $this->assertEquals(false, self::$quickFormInputsImageInstance->isHidden(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHidden_invalidValue_failed()
    {
        $message = 'Incorrect attribute $hidden in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setHidden(true);
        self::$quickFormInputsImageInstance->setHidden(self::$attributes);
        $this->assertNotEquals(false, self::$quickFormInputsImageInstance->isHidden(), $message);
    }

    public function testSetLineWithAttribute_validValue_successful()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setLineWithAttributes(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsImageInstance->getLineWithAttributes(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLineWithAttribute_invalidValue_failed()
    {
        $message = 'Incorrect attribute $lineWithAttributes in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setLineWithAttributes(self::$testStringValue . 'not');
        self::$quickFormInputsImageInstance->setHidden(self::$attributes);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsImageInstance->getLineWithAttributes(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInputsImageInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInputsImageInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInputsImageInstance->setAttributes(self::$testStringValue);
    }

    public function testInDefault_validValue_successful()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertTrue(self::$quickFormInputsImageInstance->inDefault(), $message);
    }

    public function testInDefault_invalidValue_failed()
    {
        $message = 'Incorrect method inDefault() in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertFalse(self::$quickFormInputsImageInstance->inDefault(), $message);
    }

    public function testGetDefaultValue_validValue_successful()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setAttributes(['defaults' => [self::$nameOfElement => self::$testStringValue]]);
        $this->assertEquals(self::$testStringValue, self::$quickFormInputsImageInstance->getDefaultValue(), $message);
    }

    public function testGetDefaultValue_invalidValue_failed()
    {
        $message = 'Incorrect method getDefaultValue() in QuickFormInputsImage class';
        self::$quickFormInputsImageInstance->setAttributes(['defaults' => [self::$testFailedIndexOfArray => self::$testStringValue]]);
        $this->assertNotEquals(self::$testStringValue, self::$quickFormInputsImageInstance->getDefaultValue(), $message);
    }

}
