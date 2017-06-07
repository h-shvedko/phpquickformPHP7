<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 30/05/2017
 * Time: 16:00
 */

use PHPUnit\Framework\TestCase;

require_once '/tests/bootstrap.php';

class QuickFormPHP7Test extends TestCase
{
    protected static $quickFormInstance = null;
    protected static $quickFormElementInstance = null;
    protected static $requiredNote = '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> denotes required field</span>';
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

    public function testSetName_validValue_successful()
    {
        self::$quickFormInstance->setName(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getName());
    }

    public function testSetName_invalidValue_failed()
    {
        self::$quickFormInstance->setName(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormInstance->getName());
    }

    public function testSetAnonGroups_validValue_successful()
    {
        self::$quickFormInstance->setAnonGroups(1);
        $this->assertEquals(1, self::$quickFormInstance->getAnonGroups());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAnonGroups_invalidValue_failed()
    {
        self::$quickFormInstance->setAnonGroups(self::$testStringValue);
        $this->assertNotEquals(1, self::$quickFormInstance->getName());
    }

    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInstance->setAttributes(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInstance->setAttributes(self::$testStringValue);
    }

    public function testSetDefaults_validValue_success()
    {
        self::$quickFormInstance->setDefaults(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getDefaults());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetDefaults_invalidValue_failed()
    {
        self::$quickFormInstance->setDefaults(self::$testStringValue);
    }

    public function testSetForm_validValue_success()
    {
        self::$quickFormInstance->form = self::$attributes;
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->form);
    }

    /**
     *
     */
    public function testSetForm_invalidValue_failed()
    {
        self::$quickFormInstance->form = self::$testStringValue;
        $this->assertFalse(is_array(self::$quickFormInstance->form));
    }

    public function testSetElements_validValue_success()
    {
        self::$quickFormInstance->setElement(self::$quickFormElementInstance);
        $this->assertTrue(is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) > 0);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetElements_invalidValue_failed()
    {
        self::$quickFormInstance->setElement(self::$testStringValue);
    }

    public function testSetLastElement_validValue_success()
    {
        self::$quickFormInstance->setLastElement(self::$quickFormElementInstance);
        $this->assertTrue(self::$quickFormInstance->getLastElement() instanceof QuickFormElementPHP7);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetLastElement_invalidValue_failed()
    {
        self::$quickFormInstance->setLastElement(self::$testStringValue);
    }

    public function testStartForm_validValue_success()
    {
        $message = 'Incorrect attributes settings of attribute $form of QuickFormPHP7 class';
        $frozen = 1;
        self::$quickFormInstance->setFrozen($frozen);

        self::$quickFormInstance->setAttributes(self::$attributes);

        self::$quickFormInstance->setElement(self::$quickFormElementInstance);
        self::$quickFormInstance->accept();

        $this->assertEquals($frozen, self::$quickFormInstance->form['frozen'], $message);
        $this->assertTrue(is_array(self::$quickFormInstance->form['attributes']), $message);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->form['attributes'], $message);
        $this->assertTrue(is_array(self::$quickFormInstance->form['elements']) && count(self::$quickFormInstance->form['elements']) == 1, $message);
        $this->assertTrue(is_array(self::$quickFormInstance->form['errors']) && empty(self::$quickFormInstance->form['errors']), $message);
        $this->assertTrue(is_string(self::$quickFormInstance->form['requirednote']), $message);
        $this->assertEquals(self::$requiredNote, self::$quickFormInstance->form['requirednote'], $message);
        $this->assertTrue(is_string(self::$quickFormInstance->form['javascript']) && empty(self::$quickFormInstance->form['javascript']), $message);
    }

    public function testSetFrozen_validValue_successful()
    {
        $message = 'Incorrect attributes settings of attribute $_freezeAll of QuickFormPHP7 class';
        $value = 1;
        self::$quickFormInstance->setFrozen($value);
        $this->assertEquals($value, self::$quickFormInstance->isFrozen(), $message);
    }

    public function testSetFrozen_invalidValue_failed()
    {
        $message = 'Incorrect attributes settings of attribute $_freezeAll of QuickFormPHP7 class';
        $value = 0;
        self::$quickFormInstance->setFrozen($value);
        $value = 1;
        $this->assertNotEquals($value, self::$quickFormInstance->isFrozen(), $message);
    }

    public function testAddElement_validValue_success()
    {
        $messageForm = 'Incorrect method addElement of QuickFormPHP7 class';
        $messageElement = 'Incorrect method addElement of QuickFormElementPHP7 class';
        self::$quickFormInstance->addElement(self::$type, self::$attributes, self::$error);
        
        $this->assertTrue(self::$quickFormInstance->getLastElement() instanceof QuickFormElementPHP7, $messageForm);
        $this->assertTrue(self::$quickFormInstance->getLastElement()->form instanceof QuickFormPHP7, $messageElement);
        $this->assertTrue(is_string(self::$quickFormInstance->getLastElement()->getHtml()) && strlen(self::$quickFormInstance->getLastElement()->getHtml()) > 0, $messageElement);
        $this->assertTrue(is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) > 0, $messageForm);
        $this->assertEquals(self::$type, self::$quickFormInstance->getLastElement()->getType(), $messageElement);
        $this->assertEquals(self::$type, self::$quickFormInstance->getLastElement()->getType(), $messageElement);
        $this->assertEquals(self::$error, self::$quickFormInstance->getLastElement()->getError(), $messageElement);
        $this->assertEquals('', self::$quickFormInstance->getLastElement()->getValue(), $messageElement);
        $this->assertArrayNotHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getLastElement()->getAttributes(), $messageElement);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getLastElement()->getAttributes()['defaults'], $messageElement);
        $this->assertArrayHasKey('html', self::$quickFormInstance->getLastElement()->getAttributes(), $messageElement);
    }

    public function testAddElement_invalidValue_failed()
    {
        $messageForm = 'Incorrect method addElement of QuickFormPHP7 class';
        $messageElement = 'Incorrect method addElement of QuickFormElementPHP7 class';
        self::$quickFormInstance->addElement(self::$type, self::$attributes, self::$error);

        $this->assertFalse(self::$quickFormInstance->getLastElement() instanceof QuickFormPHP7, $messageForm);
        $this->assertFalse(self::$quickFormInstance->getLastElement()->form instanceof QuickFormElementPHP7, $messageElement);
        $this->assertFalse(is_string(self::$quickFormInstance->getLastElement()->getHtml()) && strlen(self::$quickFormInstance->getLastElement()->getHtml()) == 0, $messageElement);
        $this->assertFalse(is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) == 0, $messageForm);
        $this->assertNotEquals(self::$type . '1', self::$quickFormInstance->getLastElement()->getType(), $messageElement);
        $this->assertNotEquals(self::$type . '1', self::$quickFormInstance->getLastElement()->getType(), $messageElement);
        $this->assertNotEquals(self::$attributes, self::$quickFormInstance->getLastElement()->getError(), $messageElement);
        $this->assertNotEquals('1', self::$quickFormInstance->getLastElement()->getValue(), $messageElement);
        $this->assertArrayNotHasKey(self::$testFailedIndexOfArray, self::$quickFormInstance->getLastElement()->getAttributes(), $messageElement);
        $this->assertArrayNotHasKey(self::$testFailedIndexOfArray, self::$quickFormInstance->getLastElement()->getAttributes()['defaults'], $messageElement);
        $this->assertArrayNotHasKey(self::$testFailedIndexOfArray, self::$quickFormInstance->getLastElement()->getAttributes(), $messageElement);
    }

    /**
     * @expectedException TypeError
     */
    public function testAddElement_typeError_failed()
    {
        self::$quickFormInstance->addElement(self::$attributes, self::$type , '');
    }

    /**
     * @depends testAddElement_validValue_success
     */
    public function testUpdateElement_validValue_success()
    {
        $messageElement = 'Incorrect method updateElement of QuickFormPHP7 class';
        self::$quickFormInstance->updateElement(self::$nameOfElement, self::$newAttributes);
        $this->assertEquals(self::$newValueOfAttribute, self::$quickFormInstance->getElements()[self::$nameOfElement][self::$testSuccessIndexOfArray], $messageElement);
    }

    /**
     * @depends testAddElement_validValue_success
     * @expectedException TypeError
     */
    public function testUpdateElement_invalidValue_failed()
    {
        self::$quickFormInstance->updateElement(self::$attributes, self::$nameOfElement);
    }

    /**
     * @depends testAddElement_validValue_success
     * @expectedException TypeError
     */
    public function testLoadElementBNyName_invalidValue_failed()
    {
        self::$quickFormInstance->loadElementByName(self::$attributes);
    }

    /**
     * @depends testAddElement_validValue_success
     */
    public function testLoadElementBNyName_validValue_success()
    {
        $messageElement = 'Incorrect method loadElementByName of QuickFormElementPHP7 class';
        $element = self::$quickFormInstance->loadElementByName(self::$nameOfElement);
        $this->assertTrue(is_array($element), $messageElement);
        $this->assertArrayHasKey('name', $element, $messageElement);
    }

    
}
