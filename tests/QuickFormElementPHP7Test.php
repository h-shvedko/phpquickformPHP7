<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 31/05/2017
 * Time: 15:37
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormElementPHP7Test extends TestCase
{
    protected static $quickFormInstance = null;
    protected static $quickFormElementInstance = null;
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_TEXT;
    protected static $error = [];
    protected static $nameOfForm = 'test_form';
    protected static $testStringValue = 'TestValue';
    protected static $testSuccessIndexOfArray = 'label';
    protected static $testFailedIndexOfArray = 'fail';
    protected static $nameOfElement = 'testName';
    protected static $attributes = ['name' => 'testName', 'label' => 'TestAttribute'];
    protected static $newAttributes = ['label' => 'TestNewAttribute'];
    protected static $newValueOfAttribute = 'TestNewAttribute';
    protected static $html = '<div>Test HTML</div>';


    public static function setUpBeforeClass()
    {
        self::$quickFormInstance = new QuickFormPHP7(self::$nameOfForm);
        self::$quickFormElementInstance = new QuickFormElementPHP7(self::$quickFormInstance);
    }

    public static function tearDownAfterClass()
    {
        self::$quickFormInstance = null;
        self::$quickFormElementInstance = null;
    }

    public function testSetError_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $error of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setError(self::$error);
        $this->assertEquals(self::$error, self::$quickFormElementInstance->getError(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetError_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $error of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setError(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormElementInstance->getError(), $message);
    }

    public function testSetFrozen_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $frozen of QuickFormElementPHP7 class';
        $value = 1;
        self::$quickFormElementInstance->setFrozen($value);
        $this->assertEquals($value, self::$quickFormElementInstance->isFrozen(), $message);
    }

    public function testSetFrozen_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $frozen of QuickFormElementPHP7 class';
        $value = 0;
        self::$quickFormElementInstance->setFrozen($value);
        $value = 1;
        $this->assertNotEquals($value, self::$quickFormElementInstance->isFrozen(), $message);
    }

    public function testSetHtml_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $html of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setHtml(self::$html);
        $this->assertEquals(self::$html, self::$quickFormElementInstance->getHtml(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHtml_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $html of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setHtml(self::$attributes);
        self::$quickFormElementInstance->setHtml(self::$html);
        $this->assertNotEquals(self::$html . '<br>', self::$quickFormElementInstance->getHtml(), $message);
    }

    public function testSetRequired_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $required of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setRequired(true);
        $this->assertEquals(true, self::$quickFormElementInstance->isRequired(), $message);
    }

    public function testSetRequired_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $required of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setRequired(false);
        $this->assertNotEquals(true, self::$quickFormElementInstance->isRequired(), $message);
    }

    public function testSetValue_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $value of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setValue(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getValue(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetValue_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $value of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setValue(self::$attributes);
        self::$quickFormElementInstance->setValue(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getValue(), $message);
    }

    public function testSetTabOffSet_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_tabOffset of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setTabOffset(1);
        $this->assertEquals(1, self::$quickFormElementInstance->getTabOffset(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetTabOffSet_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute _tabOffset of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setTabOffset(self::$attributes);
        self::$quickFormElementInstance->setTabOffset(1);
        $this->assertNotEquals(0, self::$quickFormElementInstance->getTabOffset(), $message);
    }

    public function testSetTab_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_tab of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setTab(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getTab(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetTab_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $_tab of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setTab(self::$attributes);
        self::$quickFormElementInstance->setTab(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getTab(), $message);
    }

    public function testSetLineEnd_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_lineEnd of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setLineEnd(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getLineEnd(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testLineEnd_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $_lineEnd of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setLineEnd(self::$attributes);
        self::$quickFormElementInstance->setLineEnd(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getLineEnd(), $message);
    }

    public function testSetComment_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_comment of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setComment(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getComment(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetComment_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $__comment of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setComment(self::$attributes);
        self::$quickFormElementInstance->setComment(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getComment(), $message);
    }

    public function testSetCurrentGroup_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_currentGroup of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setCurrentGroup(1);
        $this->assertEquals(1, self::$quickFormElementInstance->getCurrentGroup(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetCurrentGroup_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $_currentGroup of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setCurrentGroup(self::$attributes);
        self::$quickFormElementInstance->setCurrentGroup(1);
        $this->assertNotEquals(0, self::$quickFormElementInstance->getCurrentGroup(), $message);
    }

    public function testSetName_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $name of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setName(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getName(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetName_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $__comment of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setName(self::$attributes);
        self::$quickFormElementInstance->setName(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getName(), $message);
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormElementInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormElementInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormElementInstance->setAttributes(self::$testStringValue);
    }

    public function testSetLabel_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $label of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setLabel(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormElementInstance->getLabel(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLabel_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $label of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setLabel(self::$attributes);
        self::$quickFormElementInstance->setLabel(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '_not', self::$quickFormElementInstance->getLabel(), $message);
    }

    public function testSetType_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $type of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setType(self::$type);
        $this->assertEquals(self::$type, self::$quickFormElementInstance->getType(), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetType_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $type of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setType(self::$attributes);
        self::$quickFormElementInstance->setType(self::$type);
        $this->assertNotEquals(A_QuickFormInputsFactoryPHP7::TYPE_FILE, self::$quickFormElementInstance->getType(), $message);
    }

    public function testGetAttrString_validValue_successful()
    {
        $message = 'Incorrect method _getAttrString of QuickFormElementPHP7 class';
        $this->assertTrue(is_string(self::$quickFormElementInstance->_getAttrString(self::$attributes)), $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetAttrString_invalidValue_failed()
    {
        $message = 'Incorrect method _getAttrString of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->_getAttrString(self::$testStringValue);
        $this->assertFalse(is_array(self::$quickFormElementInstance->_getAttrString(self::$attributes)), $message);
    }

    public function testSetElements_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $elements of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setElements(self::$attributes);
        $this->assertTrue(is_array(self::$quickFormElementInstance->getElements()) && count(self::$quickFormElementInstance->getElements()) > 0, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetElements_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $elements of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setElements(self::$attributes);
        self::$quickFormElementInstance->setElements(self::$testStringValue);
        $this->assertFalse(!is_array(self::$quickFormElementInstance->getElements()) && count(self::$quickFormElementInstance->getElements()) == 0, $message);

    }

    public function testToArray_validValue_successful()
    {
        $message = 'Incorrect method toArray of QuickFormElementPHP7 class';
        $this->assertTrue(is_array(self::$quickFormElementInstance->toArray([self::$quickFormElementInstance])) && count(self::$quickFormElementInstance->toArray([self::$quickFormElementInstance])) > 0, $message);
    }

    /**
     * @expectedException TypeError
     */
    public function testToArray_invalidValue_failed()
    {
        $message = 'Incorrect method toArray of QuickFormElementPHP7 class';
        self::$quickFormElementInstance->setElements(self::$testStringValue);
        $this->assertFalse(!is_array(self::$quickFormElementInstance->toArray([self::$quickFormElementInstance])), $message);

    }
}
