<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 30/05/2017
 * Time: 16:00
 */

use PHPUnit\Framework\TestCase;

require_once 'bootstrap.php';

class QuickFormPHP7Test extends TestCase
{
    protected static $quickFormInstance = null;
    protected static $quickFormElementInstance = null;
    protected static $requiredNote = '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> denotes required field</span>';
    protected static $type = A_QuickFormInputsFactoryPHP7::TYPE_TEXT;
    protected static $error = [];
    protected static $nameOfForm = 'test_form';
    protected static $testStringValue = 'TestValue';
    protected static $testIntegerValue = 1024*24;
    protected static $testSuccessIndexOfArray = 'label';
    protected static $testFailedIndexOfArray = 'fail';
    protected static $nameOfElement = 'testName';
    protected static $attributes = ['name' => 'testName', 'label' => 'TestAttribute', 'id' => 'testId', 'class' => 'testClass', 'onsubmit' => 'testOnsubmit', 'enctype' => 'testEnctype'];
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

    public function testSetForm_invalidValue_failed()
    {
        self::$quickFormInstance->form = self::$testStringValue;
        $this->assertFalse(is_array(self::$quickFormInstance->form));
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

    public function testSetFromTemplate_validValue_successful()
    {
        self::$quickFormInstance->setFormTemplate(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getFormTemplate());
    }

    public function testSetFromTemplate_invalidValue_failed()
    {
        self::$quickFormInstance->setFormTemplate(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormInstance->getFormTemplate());
    }

    public function testSetHeaderTemplate_validValue_successful()
    {
        self::$quickFormInstance->setHeaderTemplate(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getHeaderTemplate());
    }

    public function testSetHeaderTemplate_invalidValue_failed()
    {
        self::$quickFormInstance->setHeaderTemplate(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormInstance->getHeaderTemplate());
    }

    public function testSetRequiredNoteTemplate_validValue_successful()
    {
        self::$quickFormInstance->setRequiredNoteTemplate(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getRequiredNoteTemplate());
    }

    public function testSetRequiredNoteTemplate_invalidValue_failed()
    {
        self::$quickFormInstance->setRequiredNoteTemplate(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormInstance->getRequiredNoteTemplate());
    }

    public function testSetElementTemplate_validValue_successful()
    {
        self::$quickFormInstance->setElementTemplate(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getElementTemplate());
    }

    public function testSetElementTemplate_invalidValue_failed()
    {
        self::$quickFormInstance->setElementTemplate(self::$testStringValue);
        $value = 'TestForm1';
        $this->assertNotEquals($value, self::$quickFormInstance->getElementTemplate());
    }

    public function testSetTemplates_validValue_success()
    {
        self::$quickFormInstance->setTemplates(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getTemplates());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetTemplates_invalidValue_failed()
    {
        self::$quickFormInstance->setTemplates(self::$testStringValue);
    }

    public function testSetHtml_validValue_successful()
    {
        self::$quickFormInstance->setHtml(self::$testStringValue);
        $this->assertEquals(' ' . self::$testStringValue, self::$quickFormInstance->getHtml());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetHtml_invalidValue_failed()
    {
        self::$quickFormInstance->setHtml(self::$attributes);

        self::$quickFormInstance->setHtml(self::$testStringValue);
        $value = '<input type="text" value="" name="testName" placeholder=""   /> <input type="text" value="" name="testName" placeholder=""   />';
        $this->assertNotEquals($value, self::$quickFormInstance->getHtml());
    }

    /**
     * @depends testSetHtml_validValue_successful
     * @depends testSetHtml_invalidValue_failed
     */
    public function testSetElement_validValue_success()
    {
        self::$quickFormInstance->setElement(self::$quickFormElementInstance);
        $this->assertTrue(is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) > 0);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetElement_invalidValue_failed()
    {
        self::$quickFormInstance->setElement(self::$testStringValue);
    }

    public function testSetEndFormTemplate_validValue_successful()
    {
        $this->assertEquals('</form>', self::$quickFormInstance->getEndFormTemplate());
    }

    public function testSetEndFormTemplate_invalidValue_failed()
    {
        $this->assertNotEquals('<form>', self::$quickFormInstance->getEndFormTemplate());
    }

    public function testSetId_validValue_successful()
    {
        self::$quickFormInstance->setId(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getId());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetId_invalidValue_failed()
    {
        self::$quickFormInstance->setId(self::$attributes);

        self::$quickFormInstance->setId(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '!', self::$quickFormInstance->getId());
    }

    public function testSetClass_validValue_successful()
    {
        self::$quickFormInstance->setClass(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getClass());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetClass_invalidValue_failed()
    {
        self::$quickFormInstance->setClass(self::$attributes);

        self::$quickFormInstance->setClass(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '!', self::$quickFormInstance->getClass());
    }

    public function testSetEnctype_validValue_successful()
    {
        $this->assertEquals('application/x-www-form-urlencoded', self::$quickFormInstance->getEnctype());

        self::$quickFormInstance->setEnctype(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getEnctype());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetEnctype_invalidValue_failed()
    {
        self::$quickFormInstance->setEnctype(self::$attributes);

        self::$quickFormInstance->setEnctype(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '!', self::$quickFormInstance->getEnctype());
    }

    /**
     * @depends testSetHtml_invalidValue_failed
     * @depends testSetHtml_validValue_successful
     * @depends testSetEnctype_invalidValue_failed
     * @depends testSetEnctype_validValue_successful
     */
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



    /**
     * @depends testSetEnctype_invalidValue_failed
     * @depends testSetEnctype_validValue_successful
     */
    public function testSetAttributes_validValue_success()
    {
        self::$quickFormInstance->setAttributes(self::$attributes);

        $this->assertEquals('testId', self::$quickFormInstance->getId());
        $this->assertEquals('testClass', self::$quickFormInstance->getClass());
        $this->assertEquals('testOnsubmit', self::$quickFormInstance->getOnsubmit());
        $this->assertEquals('testEnctype', self::$quickFormInstance->getEnctype());
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getAttributes());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetAttributes_invalidValue_failed()
    {
        self::$quickFormInstance->setAttributes(self::$testStringValue);
    }

    public function testSetOnsubmit_validValue_successful()
    {
        self::$quickFormInstance->setOnsubmit(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getOnsubmit());
    }

    /**
     * @expectedException TypeError
     */
    public function testSetOnsubmit_invalidValue_failed()
    {
        self::$quickFormInstance->setOnsubmit(self::$attributes);

        self::$quickFormInstance->setOnsubmit(self::$testStringValue);
        $this->assertNotEquals(self::$testStringValue . '!', self::$quickFormInstance->getOnsubmit());
    }

    /**
     * @depends testSetHtml_invalidValue_failed
     * @depends testSetHtml_validValue_successful
     */
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

    /**
     * @depends testSetHtml_invalidValue_failed
     * @depends testSetHtml_validValue_successful
     */
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

    /**
     * @depends testSetEnctype_invalidValue_failed
     * @depends testSetEnctype_validValue_successful
     */
    public function testSetElements_validValue_success()
    {
        self::$quickFormInstance->setElements([self::$quickFormElementInstance]);

        $this->assertTrue(self::$quickFormInstance->getElements()[0] instanceof QuickFormElementPHP7);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetElements_invalidValue_failed()
    {
        self::$quickFormInstance->setAttributes(self::$testStringValue);
    }

    /**
     * @depends testSetEnctype_validValue_successful
     * @depends testSetEnctype_invalidValue_failed
     * @depends testSetId_invalidValue_failed
     * @depends testSetId_validValue_successful
     * @depends testSetOnsubmit_invalidValue_failed
     * @depends testSetOnsubmit_validValue_successful
     * @depends testSetClass_invalidValue_failed
     * @depends testSetClass_validValue_successful
     */
    public function testSetStartFormTemplate_validValue_successful()
    {
        self::$quickFormInstance->setAction(self::$testStringValue);
        self::$quickFormInstance->setMethod('post');
        self::$quickFormInstance->setId('testId');
        self::$quickFormInstance->setClass('testClass');
        self::$quickFormInstance->setEnctype('testEnctype');
        self::$quickFormInstance->setOnsubmit('testOnsubmit');

        $value = '<form action="'.self::$testStringValue.'" method="post" id="testId" class="testClass" enctype="testEnctype" onsubmit="testOnsubmit">';

        $this->assertEquals($value, self::$quickFormInstance->getStartFormTemplate());

        $prevValueOfStartFormTemplate =  self::$quickFormInstance->getStartFormTemplate();

        self::$quickFormInstance->setStartFormTemplate(self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->getStartFormTemplate());

        self::$quickFormInstance->setStartFormTemplate($prevValueOfStartFormTemplate);
    }

    /**
     * @expectedException TypeError
     * @depends testSetEnctype_validValue_successful
     * @depends testSetEnctype_invalidValue_failed
     * @depends testSetId_invalidValue_failed
     * @depends testSetId_validValue_successful
     * @depends testSetOnsubmit_invalidValue_failed
     * @depends testSetOnsubmit_validValue_successful
     * @depends testSetClass_invalidValue_failed
     * @depends testSetClass_validValue_successful
     */
    public function testSetStartFormTemplate_invalidValue_failed()
    {
        self::$quickFormInstance->setAction(self::$testStringValue);
        self::$quickFormInstance->setMethod('post');
        self::$quickFormInstance->setId('testId');
        self::$quickFormInstance->setClass('testClass');
        self::$quickFormInstance->setEnctype('testEnctype');
        self::$quickFormInstance->setOnsubmit('testOnsubmit');

        $value = '<form action="" method="post" id="testId" class="testClass" enctype="testEnctype" onsubmit="testOnsubmit">';

        $this->assertNotEquals($value, self::$quickFormInstance->getStartFormTemplate());

        self::$quickFormInstance->setStartFormTemplate(self::$attributes);

        $prevValueOfStartFormTemplate =  self::$quickFormInstance->getStartFormTemplate();

        self::$quickFormInstance->setStartFormTemplate(self::$testStringValue);
        $value = self::$testStringValue . '!';
        $this->assertNotEquals($value, self::$quickFormInstance->getStartFormTemplate());

        self::$quickFormInstance->setStartFormTemplate($prevValueOfStartFormTemplate);
    }

    /**
     * @depends testSetStartFormTemplate_invalidValue_failed
     * @depends testSetStartFormTemplate_validValue_successful
     */
    public function testRender_validValue_successful()
    {
        $value = ' <form action="TestValue" method="post" id="testId" class="testClass" enctype="testEnctype" onsubmit="testOnsubmit">  TestValue   <input type="text" value="" name="testName" placeholder=""  id = "testId" class = "testClass" onsubmit = "testOnsubmit" enctype = "testEnctype"  /> <input type="text" value="" name="testName" placeholder=""  id = "testId" class = "testClass" onsubmit = "testOnsubmit" enctype = "testEnctype"  /> </form>';

        $this->assertEquals($value, self::$quickFormInstance->render());
    }

    /**
     * @depends testSetStartFormTemplate_invalidValue_failed
     * @depends testSetStartFormTemplate_validValue_successful
     */
    public function testRender_invalidValue_failed()
    {
        $value = '<form action="'.self::$testStringValue.'" method="post" id="testId" class="testClass" enctype="testEnctype" onsubmit="testOnsubmit"></form>';

        $this->assertNotEquals($value, self::$quickFormInstance->getStartFormTemplate());
    }

    /**
     * @depends testSetStartFormTemplate_invalidValue_failed
     * @depends testSetStartFormTemplate_validValue_successful
     */
    public function testClearAllTemplates_validValue_success()
    {
        self::$quickFormInstance->clearAllTemplates();

        $this->assertTrue(empty(self::$quickFormInstance->getTemplates()));
        $this->assertTrue(empty(self::$quickFormInstance->getElementTemplate()));
        $this->assertTrue(empty(self::$quickFormInstance->getFormTemplate()));
        $this->assertTrue(empty(self::$quickFormInstance->getHeaderTemplate()));
        $this->assertTrue(empty(self::$quickFormInstance->getRequiredNoteTemplate()));
    }

    /**
     * @depends testSetStartFormTemplate_invalidValue_failed
     * @depends testSetStartFormTemplate_validValue_successful
     */
    public function testClearAllTemplates_invalidValue_failed()
    {
        self::$quickFormInstance->clearAllTemplates();

        $this->assertFalse(!empty(self::$quickFormInstance->getTemplates()));
        $this->assertFalse(!empty(self::$quickFormInstance->getElementTemplate()));
        $this->assertFalse(!empty(self::$quickFormInstance->getFormTemplate()));
        $this->assertFalse(!empty(self::$quickFormInstance->getHeaderTemplate()));
        $this->assertFalse(!empty(self::$quickFormInstance->getRequiredNoteTemplate()));
    }

    public function testGetSubmitedFiles_validValues_success()
    {
        self::$quickFormInstance->setSubmitFiles(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getSubmitFiles());
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSubmitedFiles_invalidValues_failed()
    {
        self::$quickFormInstance->setSubmitFiles(self::$testStringValue);
    }

    public function testGetSubmitedValue_validValues_success()
    {
        self::$quickFormInstance->setSubmitValues(self::$attributes);
        $this->assertArrayHasKey(self::$testSuccessIndexOfArray, self::$quickFormInstance->getSubmitValues());
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSubmitedValue_invalidValues_failed()
    {
        self::$quickFormInstance->setSubmitValues(self::$testStringValue);
    }

    public function testGetSubmitedValueByName_validValues_success()
    {
        self::$quickFormInstance->setSubmitValues(self::$attributes);
        $this->assertEquals(self::$attributes[self::$testSuccessIndexOfArray], self::$quickFormInstance->getSubmitValue(self::$testSuccessIndexOfArray));
    }

    /**
     * @expectedException TypeError
     */
    public function testGetSubmitedValueByName_invalidValues_failed()
    {
        self::$quickFormInstance->setSubmitValues(self::$testStringValue);

        self::$quickFormInstance->setSubmitValue(self::$attributes);
        $this->assertEquals(self::$attributes[self::$testSuccessIndexOfArray] . '!', self::$quickFormInstance->getSubmitValue(self::$testSuccessIndexOfArray));
    }

    public function testGetMaxSize_validValues_success()
    {
        self::$quickFormInstance->setMaxFileSize(self::$testIntegerValue);
        $this->assertEquals(self::$testIntegerValue, self::$quickFormInstance->getMaxFileSize());
    }

    /**
     * @expectedException TypeError
     */
    public function testGetMaxSize_invalidValues_failed()
    {
        self::$quickFormInstance->setMaxFileSize(self::$testStringValue);
    }

    public function testSetElementError_validValues_success()
    {
        self::$quickFormInstance->setElementError(self::$nameOfElement, self::$testStringValue);
        $this->assertEquals(self::$testStringValue, self::$quickFormInstance->form['errors'][self::$nameOfElement]);
    }

    /**
     * @expectedException TypeError
     */
    public function testSetElementError_invalidValues_failed()
    {
        self::$quickFormInstance->setElementError(self::$nameOfElement, self::$attributes);
        self::$quickFormInstance->setElementError(self::$attributes, self::$testStringValue);

        $this->assertNotEquals(self::$testStringValue, self::$quickFormInstance->form['errors'][self::$nameOfElement]);
    }

    public function testInsertElementBefore_validValues_success()
    {
        self::$quickFormInstance->setElements([]);
        self::$quickFormInstance->addElement(self::$type, ['name' => 'testName1', 'label' => 'TestAttribute1', 'id' => 'testId', 'class' => 'testClass', 'onsubmit' => 'testOnsubmit', 'enctype' => 'testEnctype'], self::$error);
        self::$quickFormInstance->addElement(self::$type, ['name' => 'testName2', 'label' => 'TestAttribute1', 'id' => 'testId', 'class' => 'testClass', 'onsubmit' => 'testOnsubmit', 'enctype' => 'testEnctype'], self::$error);

        self::$quickFormInstance->insertElementBefore(self::$quickFormInstance->getLastElement(), 'testName1');
        $this->assertTrue(is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) == 2);
    }

    public function testInsertElementBefore_invalidValues_failed()
    {
        self::$quickFormInstance->setElements([]);
        self::$quickFormInstance->addElement(self::$type, ['name' => 'testName1', 'label' => 'TestAttribute1', 'id' => 'testId', 'class' => 'testClass', 'onsubmit' => 'testOnsubmit', 'enctype' => 'testEnctype'], self::$error);
        self::$quickFormInstance->addElement(self::$type, ['name' => 'testName2', 'label' => 'TestAttribute1', 'id' => 'testId', 'class' => 'testClass', 'onsubmit' => 'testOnsubmit', 'enctype' => 'testEnctype'], self::$error);

        self::$quickFormInstance->insertElementBefore(self::$quickFormInstance->getLastElement(), 'testName1');
        $this->assertFalse(!is_array(self::$quickFormInstance->getElements()) && count(self::$quickFormInstance->getElements()) < 2);
    }
}
