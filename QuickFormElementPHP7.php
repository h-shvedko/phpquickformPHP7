<?php

/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 12/05/2017
 * Time: 13:43
 */
class QuickFormElementPHP7
{
    /**
     * Tab offset of the table
     */
    private $_tabOffset = 0;

    /**
     * Tab string
     */
    private $_tab = "\11";

    /**
     * Contains the line end string
     */
    private $_lineEnd = "\12";

    /**
     * HTML comment on the object
     */
    private $_comment= '';

    /**
     * Indexes of array of object for further generation of html (from legacy QuickForm)
     */
    const LABEL = '_label';
    const TEXT = '_text';
    const TYPE = '_type';
    const ATTRIBUTES = '_attributes';
    const NAME = '_name';

    /**
     * Type of html element
     * @var string
     */
    private $type = 'html';

    /**
     * Label of html element
     * @var string
     */
    private $label= '';

    /**
     * Attributes of html element
     * @var array
     */
    private $attributes = [];

    /**
     * @var array
     */
    private $error = [];

    /**
     * @var bool
     */
    private $frozen = false;

    /**
     * @var string
     */
    private $html= '';

    /**
     * @var bool
     */
    private $required = false;

    /**
     * @var string
     */
    private $value= '';


    /**
     * Attached JS code for html element
     * @var string
     */
    private $js= '';//TODO: check if we need this attribute

    /**
     * Array of html element for further generation (come from legacy QuickForm)
     * @var array
     */
    public $_elements = [];

    /**
     * Name of html element
     * @var string
     */
    private $name= '';

    /**
     * Last added element
     * @var array
     */
    private $lastElement = [];//TODO: check if we need this attribute

    /**
     * @var array
     */
    private $defaults = [];//TODO: check if we need this attribute

    /**
     * @var
     */
    public $_elementIndex = 0;

    /**
     * @var
     */
    public $_text= '';

    /**
     * @var
     */
    private $_currentGroup;

    /**
     * @var QuickFormPHP7
     */
    public $form;

    /**
     * @var array
     */
    public $elements = [];

    /**
     * QuickFormElementPHP7 constructor.
     * @param QuickFormPHP7 $form
     */
    public function __construct(QuickFormPHP7 $form)
    {
        $this->form = $form;
    }

    /**
     * @param string $type
     * @param array $attributes
     * @param array $error
     */
    public function addElement(string $type, array $attributes = [], array $error = [])
    {
        $this->increaseIndex();

        if(isset($attributes['name'])){
            $this->setName($attributes['name']);
        } else {
            $this->setName($type . $this->_elementIndex);
        }

        if(isset($attributes['value'])){
            $this->setValue($attributes['value']);
        }

        if(isset($attributes['required'])){
            $this->setRequired($attributes['required']);
        }

        if(isset($attributes['label'])){
            $this->setLabel($attributes['label']);
            unset($attributes['label']);
        }

        if(isset($attributes['html'])){
            $this->setHtml($attributes['html']);
        }

        if(isset($attributes['frozen'])){
            $this->setFrozen($attributes['frozen']);
        }

        if(isset($attributes['elements'])){
            $this->setElements($attributes['elements']);
            unset($attributes['elements']);
        }

        $this->setType($type);

        $this->setAttributes($attributes);
        $this->setError($error);

        $this->generateHtml();
    }

    /**
     * @return array
     */
    public function getError()//TODO //: array
    {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError(array $error)
    {
        $this->error = $error;
    }

    /**
     * @return bool
     */
    public function isFrozen()//TODO //: bool
    {
        return $this->frozen;
    }

    /**
     * @param bool $frozen
     */
    public function setFrozen(bool $frozen)
    {
        $this->frozen = $frozen;
    }

    /**
     * @return string
     */
    public function getHtml()//TODO //: string
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html)
    {
        $this->html = $html;
    }

    /**
     * @return bool
     */
    public function isRequired()//TODO //: bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required)
    {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getValue()//TODO //: string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

//    /**
//     *
//     */
//    private function loadElement()//TODO: check if we need this method
//    {
//        $elementName = $this->getName();
//        $this->_elements[$elementName] = $this->getElement();
//        $elKeys = array_keys($this->_elements);
//        $this->_elementIndex[$elementName] = end($elKeys);
//    }

    /**
     * @return mixed
     */
    public function getTabOffset()
    {
        return $this->_tabOffset;
    }

    /**
     * @param mixed $tabOffset
     */
    public function setTabOffset(int $tabOffset)
    {
        $this->_tabOffset = $tabOffset;
    }

    /**
     * @return mixed
     */
    public function getTab()
    {
        return $this->_tab;
    }

    /**
     * @param mixed $tab
     */
    public function setTab(string $tab)
    {
        $this->_tab = $tab;
    }

    /**
     * @return mixed
     */
    public function getLineEnd()
    {
        return $this->_lineEnd;
    }

    /**
     * @param mixed $lineEnd
     */
    public function setLineEnd(string $lineEnd)
    {
        $this->_lineEnd = $lineEnd;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(string $comment)
    {
        $this->_comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCurrentGroup()//TODO: //: mixed
    {
        return $this->_currentGroup;
    }

    /**
     * @param integer $currentGroup
     */
    public function setCurrentGroup(int $currentGroup)
    {
        $this->_currentGroup = $currentGroup;
    }

    /**
     * @return string
     */
    public function getName()//TODO //: string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        $this->attributes['defaults'] = $this->form->defaults;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

//    /**
//     * @return array
//     */
//    private function getElement()//TODO //: array
//    {
//        $element = [];
//        $element[self::LABEL] = $this->getLabel();
//        $element[self::TEXT] = $this->getAttributeValueByName(self::TEXT);
//        $element[self::TYPE] = $this->getType();
//        $element[self::ATTRIBUTES] = $this->getAttributes();
//
//        $this->setLastElement($element);
//
//        return $element;
//    }

    /**
     * @return string
     */
    public function getLabel()//TODO //: string
    {
        return $this->label;
    }

    /**
     * @param string $attributeName
     * @return mixed|string
     */
    public function getAttributeValueByName(string $attributeName)//TODO //: string
    {
        $attributes = $this->getAttributes();
        return isset($attributes[$attributeName]) ? $attributes[$attributeName] : '';

        /* Just for PHP7*/
        //return $attributes[$attributeName] ?? '';
    }

    /**
     * @return array
     */
    public function getAttributes()//TODO //: array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getType()//TODO //: string
    {
        return $this->type;
    }

    /**
     * Validation of html elements
     * @return bool
     */
    public static function validate()//TODO //: bool
    {
        //TODO: create validation
        $result = true;
        return $result;
    }

    /**
     *
     */
    private function increaseIndex()
    {
        $this->_elementIndex = $this->form->getIndexLastElement();
    }

    public function _getAttrString(array $attributes)
    {
        $strAttr = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $strAttr .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
            }
        }
        return $strAttr;
    }

    /**
     * Method which handle Input factory class for generating html tag for different types of input
     */
    private function generateHtml()
    {
        require_once 'Inputs/A_QuickFormInputsFactoryPHP7.php';

        switch ($this->type){
            case A_QuickFormInputsFactoryPHP7::TYPE_CHECKBOX:
                $this->getHtmlForInput('QuickFormInputsCheckBox', A_QuickFormInputsFactoryPHP7::TYPE_CHECKBOX);
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_RADIO:
                $this->getHtmlForInput('QuickFormInputsCheckBox', A_QuickFormInputsFactoryPHP7::TYPE_RADIO);
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_BUTTON:
                $this->getHtmlForInput('QuickFormInputsButton');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_FILE:
                $this->getHtmlForInput('QuickFormInputsFile');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_IMAGE:
                $this->getHtmlForInput('QuickFormInputsImage');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_PASSWORD:
                $this->getHtmlForInput('QuickFormInputsPassword');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_RESET:
                $this->getHtmlForInput('QuickFormInputsReset');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_SUBMIT:
                $this->getHtmlForInput('QuickFormInputsSubmit');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_HIDDEN:
                $this->getHtmlForInput('QuickFormInputsText', A_QuickFormInputsFactoryPHP7::TYPE_HIDDEN);
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_TEXT:
                $this->getHtmlForInput('QuickFormInputsText');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_SELECT:
                $this->getHtmlForInput('QuickFormInputsSelect');
                break;
            case A_QuickFormInputsFactoryPHP7::TYPE_FCKEDITOR:
                $this->getHtmlForInput('QuickFormInputsCKEditor');
                break;
            default:
                break;
        }
    }

    /**
     * @param string $className
     * @param string $type
     */
    private function getHtmlForInput(string $className, string $type = '')
    {
        require_once 'Inputs/' . $className . '.php';

        if($type != ''){
            $tag = new $className($this->name, $this->attributes, $type);
        } else {
            $tag = new $className($this->name, $this->attributes);
        }

        $tag->generateHtml();
        $tag->validate();

        $this->setValue($tag->getValue());
        $this->addNewAttribute('html', $tag->getHtml());
        $this->setHtml($tag->getHtml());
    }

    /**
     * @param string $name
     * @param string $value
     */
    private function addNewAttribute(string $name, string $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @return mixed
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param mixed $elements
     */
    public function setElements(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @param array $getElements
     * @return array
     */
    public function toArray(array $getElements)//TODO //:array|mixed
    {
        $elements = [];
        if(!empty($getElements)){
            foreach ($getElements as $key => $value) {
                if($value instanceof QuickFormElementPHP7){
                    $name = $value->getName();
                    $elements[$name][QuickFormPHP7::NAME] = $name;
                    $elements[$name][QuickFormPHP7::TYPE] = $value->getType();
                    $elements[$name][QuickFormPHP7::VALUE] = $value->getValue();
                    $elements[$name][QuickFormPHP7::LABEL] = $value->getLabel();
                    $elements[$name][QuickFormPHP7::HTML] = $value->getHtml();
                    $elements[$name][QuickFormPHP7::REQUIRED] = $value->isRequired();
                    $elements[$name][QuickFormPHP7::FROZEN] = $value->isFrozen();
                    $elements[$name][QuickFormPHP7::ATTRIBUTES] = $value->getAttributes();
                    $elements[$name][QuickFormPHP7::ERROR] = $value->getError();
                    $elements[$name][QuickFormPHP7::ELEMENTS] = $value->toArray($value->getElements());
                }
            }
        }

        return $elements;
    }
}