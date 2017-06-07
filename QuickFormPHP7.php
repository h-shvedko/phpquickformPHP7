<?php

/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 11/05/2017
 * Time: 09:00
 */

require_once 'QuickFormElementPHP7.php';

class QuickFormPHP7
{
    /**
     * Constants with naming of attributes
     */
    const NAME = 'name';
    const TYPE = 'type';
    const VALUE = 'value';
    const LABEL = 'label';
    const HTML = 'html';
    const REQUIRED = 'required';
    const FROZEN = 'frozen';
    const ATTRIBUTES = 'attributes';
    const ERROR = 'error';
    const ELEMENTS = 'elements';

    /**
     * @var string
     */
    private $_requiredNote = '<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> denotes required field</span>';

    /**
     * @var int
     */
    private $_maxFileSize = 0;

    /**
     * @var array
     */
    private $_submitValues = [];

    /**
     * @var string
     */
    private $method = '';

    /**
     * @var string
     */
    private $action = '';

    /**
     * @var array|string
     */
    private $target = '';

    /**
     * @var array
     */
    public $_submitFiles = [];

    /**
     * @var bool
     */
    public $_flagSubmitted = false;

    /**
     * @var bool
     */
    private $_freezeAll = false;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var bool
     */
    private $_collectHidden = false;

    /**
     * @var int
     */
    public $_elementIdx = 0;

    /**
     * @var null
     */
    public $_currentSection= '';

    /**
     * @var int
     */
    public $_sectionCount = 0;

    /**
     * @var array
     */
    public $defaults = [];

    /**
     * @var array
     */
    public $form = [];

    /**
     * @var array
     */
    private $elements = [];

    /**
     * @var QuickFormElementPHP7
     */
    private $lastElement;

    /**
     * @var
     */
    public $_currentGroup;

    /**
     * @var int
     */
    private $anonGroups = 1;

    /**
     * QuickFormPHP7 constructor.
     * @param string $formName
     * @param string $method
     * @param string $action
     * @param string $target
     * @param null|string $attributes
     * @param bool $trackSubmit
     */
    public function __construct(string $formName, string $method = 'post', string $action = '', string $target = '', array $attributes = [], bool $trackSubmit = false)
    {
        $this->method = (strtoupper($method) == 'GET') ? 'get' : 'post';
        $this->action = ($action == '') ? $_SERVER['PHP_SELF'] : $action;
        $this->target = empty($target) ? array() : array('target' => $target);
        $this->setAttributes($attributes);

        if (!$trackSubmit || isset($_REQUEST['_qf__' . $formName])) {
            if (1 == get_magic_quotes_gpc()) {
                $this->_submitValues = $this->recursiveFilter('stripslashes', 'get' == $method ? $_GET : $_POST);
                foreach ($_FILES as $keyFirst => $valFirst) {
                    foreach ($valFirst as $keySecond => $valSecond) {
                        if ('name' == $keySecond) {
                            $this->_submitFiles[$keyFirst][$keySecond] = $this->recursiveFilter('stripslashes', $valSecond);
                        } else {
                            $this->_submitFiles[$keyFirst][$keySecond] = $valSecond;
                        }
                    }
                }
            } else {
                $this->_submitValues = 'get' == $method ? $_GET : $_POST;
                $this->_submitFiles = $_FILES;
            }
            $this->_flagSubmitted = count($this->_submitValues) > 0 || count($this->_submitFiles) > 0;
        }
        if ($trackSubmit) {
            unset($this->_submitValues['_qf__' . $formName]);
            $this->addElement('hidden', ['name' => '_qf__' . $formName]); //TODO
        }
        if (preg_match('/^([0-9]+)([a-zA-Z]*)$/', ini_get('upload_max_filesize'), $matches)) {
            // see http://www.php.net/manual/en/faq.using.php#faq.using.shorthandbytes
            switch (strtoupper($matches['2'])) {
                case 'G':
                    $this->_maxFileSize = $matches['1'] * 1073741824;
                    break;
                case 'M':
                    $this->_maxFileSize = $matches['1'] * 1048576;
                    break;
                case 'K':
                    $this->_maxFileSize = $matches['1'] * 1024;
                    break;
                default:
                    $this->_maxFileSize = $matches['1'];
            }
        }
    }

    /**
     * Recursively apply a filter function
     *
     * @param     string $filter filter to apply
     * @param     mixed $value submitted values
     * @return array|mixed
     */
    private function recursiveFilter(string $filter, array $value)//TODO //:array|mixed
    {
        if (is_array($value)) {
            $cleanValues = array();
            foreach ($value as $k => $v) {
                $cleanValues[$k] = $this->recursiveFilter($filter, $value[$k]);
            }
            return $cleanValues;
        } else {
            return call_user_func($filter, $value);
        }

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     *
     */
    private function startForm()
    {
        //TODO
        $this->form = [
            'frozen' => $this->isFrozen(),
            'javascript' => $this->getValidationScript(),
            'attributes' => $this->getAttributes(),
            'requirednote' => $this->getRequiredNote(),
            'errors' => [],
            'elements' => $this->getElements(),
        ];
        if ($this->_collectHidden) {
            $this->form['hidden'] = '';
        }
        $this->_elementIdx = 1;
    }

    /**
     * @return bool
     */
    public function isFrozen()
    {
        return $this->_freezeAll;
    }

    /**
     * @return string
     */
    public function getValidationScript()
    {
        //TODO  create generation of validation script
        /*
        if (empty($this->_rules) || empty($this->_attributes['onsubmit'])) {
            return '';
        }

        include_once('HTML/QuickForm/RuleRegistry.php');
        $registry =& HTML_QuickForm_RuleRegistry::singleton();
        $test = array();
        $js_escape = array(
            "\r"    => '\r',
            "\n"    => '\n',
            "\t"    => '\t',
            "'"     => "\\'",
            '"'     => '\"',
            '\\'    => '\\\\'
        );

        foreach ($this->_rules as $elementName => $rules) {
            foreach ($rules as $rule) {
                if ('client' == $rule['validation']) {
                    unset($element);

                    $dependent  = isset($rule['dependent']) && is_array($rule['dependent']);
                    $rule['message'] = strtr($rule['message'], $js_escape);

                    if (isset($rule['group'])) {
                        $group    =& $this->getElement($rule['group']);
                        // No JavaScript validation for frozen elements
                        if ($group->isFrozen()) {
                            continue 2;
                        }
                        $elements =& $group->getElements();
                        foreach (array_keys($elements) as $key) {
                            if ($elementName == $group->getElementName($key) || $rule['group'].'['.$elementName.']' == $group->getElementName($key)) {
                                $element =& $elements[$key];
                                break;
                            }
                        }
                    } elseif ($dependent) {
                        $element   =  array();
                        $element[] =& $this->getElement($elementName);
                        foreach ($rule['dependent'] as $idx => $elName) {
                            $element[] =& $this->getElement($elName);
                        }
                    } else {
                        $element =& $this->getElement($elementName);
                    }
                    // No JavaScript validation for frozen elements
                    if (is_object($element) && $element->isFrozen()) {
                        continue 2;
                    } elseif (is_array($element)) {
                        foreach (array_keys($element) as $key) {
                            if ($element[$key]->isFrozen()) {
                                continue 3;
                            }
                        }
                    }

                    $test[] = $registry->getValidationScript($element, $elementName, $rule);
                }
            }
        }
        if (count($test) > 0) {
            return
                "\n<script type=\"text/javascript\">\n" .
                "//<![CDATA[\n" .
                "function validate_" . $this->_attributes['id'] . "(frm) {\n" .
                "  var value = '';\n" .
                "  var errFlag = new Array();\n" .
                "  var _qfGroups = {};\n" .
                "  _qfMsg = '';\n\n" .
                join("\n", $test) .
                "\n  if (_qfMsg != '') {\n" .
                "    _qfMsg = '" . strtr($this->_jsPrefix, $js_escape) . "' + _qfMsg;\n" .
                "    _qfMsg = _qfMsg + '\\n" . strtr($this->_jsPostfix, $js_escape) . "';\n" .
                "    alert(_qfMsg);\n" .
                "    return false;\n" .
                "  }\n" .
                "  return true;\n" .
                "}\n" .
                "//]]>\n" .
                "</script>";
        }*/
        return '';
    }

    /**
     * @return string
     */
    public function getRequiredNote()//TODO //:string
    {
        return $this->_requiredNote;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * @return mixed
     */
    public function getAttributes()//TODO //:array|mixed
    {
        return $this->attributes;
    }

    /**
     * @param string $type
     * @param array $attributes
     * @param array $error
     */
//    public function addElement(string $name, string $type, string $value = '', string $label = '', string $html = '', bool $required = false, bool $frozen = false, array $attributes = [], array $error = [])//TODO: only for PHP7, it doesn't work on PHP5(type hinting issue)
    public function addElement(string $type, array $attributes = [], array $error = [])
    {
        $element = new QuickFormElementPHP7($this);

        $this->checkResetForGroup($type, $attributes);

        $element->addElement((string)$type, $attributes, $error);
        $this->setElement($element);

    }

    /**
     * @param string $name
     * @param array $attributes
     */
    public function updateElement(string $name, array $attributes)
    {
        if(isset($this->elements[$name])){
            if(isset($this->elements[$name]['attributes']) && is_array($this->elements[$name]['attributes'])){

                if(isset($attributes['value'])){
                    $this->elements[$name]['value'] = $attributes['value'];
                    unset($attributes['value']);
                }

                if(isset($attributes['readonly'])){
                    $this->elements[$name]['attributes']['readonly'] = $attributes['readonly'];
                    unset($attributes['readonly']);
                }

                if(isset($attributes['size'])){
                    $this->elements[$name]['attributes']['size'] = $attributes['size'];
                    unset($attributes['size']);
                }

                if(isset($attributes['pattern'])){
                    $this->elements[$name]['attributes']['pattern'] = $attributes['pattern'];
                    unset($attributes['pattern']);
                }

                if(isset($attributes['placeholder'])){
                    $this->elements[$name]['attributes']['placeholder'] = $attributes['placeholder'];
                    unset($attributes['placeholder']);
                }

                if(isset($attributes['required'])){
                    $this->elements[$name]['required'] = $attributes['required'];
                    unset($attributes['required']);
                }

                if(isset($attributes['error'])){
                    $this->elements[$name]['error'] = $attributes['error'];
                    unset($attributes['error']);
                }

                if(isset($attributes['frozen'])){
                    $this->elements[$name]['frozen'] = $attributes['frozen'];
                    unset($attributes['frozen']);
                }

                if(isset($attributes['html'])){
                    $this->elements[$name]['html'] = $attributes['html'];
                    unset($attributes['html']);
                }

                if(isset($attributes['label'])){
                    $this->elements[$name]['label'] = $attributes['label'];
                    unset($attributes['label']);
                }

                foreach($attributes as $nameAttr => $value){
                    if(isset($this->elements[$name]['attributes'][$nameAttr])){
                        unset($this->elements[$name]['attributes'][$nameAttr]);
                    }
                    $this->elements[$name]['attributes'][$nameAttr] = $value;
                }

            }
        }

    }

    /**
     *
     */
    public function accept()//TODO: check if we need this method
    {
        $this->startForm();
        //$this->render(); //TODO: render elements of form
    }

    /**
     * @return array
     */
    public function getElements()//TODO //:array|mixed
    {
        return $this->elements;
    }

    /**
     * @param QuickFormElementPHP7 $element
     */
    public function setElement(QuickFormElementPHP7 $element)
    {
        $name = $element->getName();
        $this->elements[$name][self::NAME] = $name;
        $this->elements[$name][self::TYPE] = $element->getType();
        $this->elements[$name][self::VALUE] = $element->getValue();
        $this->elements[$name][self::LABEL] = $element->getLabel();
        $this->elements[$name][self::HTML] = $element->getHtml();
        $this->elements[$name][self::REQUIRED] = $element->isRequired();
        $this->elements[$name][self::FROZEN] = $element->isFrozen();
        $this->elements[$name][self::ATTRIBUTES] = $element->getAttributes();
        $this->elements[$name][self::ERROR] = $element->getError();
        $this->elements[$name][self::ELEMENTS] = $element->toArray($element->getElements());

        $this->setLastElement($element);
    }

    /**
     * @param string $name
     * @return array|mixed
     */
    public function loadElementByName(string $name)//TODO //:array|mixed
    {
        $element = isset($this->elements[$name]) ? $this->elements[$name] : [];
        return $element;

    }

    /**
     * @param array $defaults
     */
    public function setDefaults(array $defaults)
    {
        $this->defaults = array_merge($this->defaults, $defaults);
    }

    /**
     * @return array
     */
    public function getDefaults()//TODO //: array
    {
        return $this->defaults;
    }

    /**
     * @return array
     */
    public function exportValues()//TODO //:array
    {
        //TODO: add values parser
        $values = array();
        foreach ($this->elements as $name => $attributes) {
            $values[$name] = isset($attributes['value']) ? $attributes['value'] : '';
        }

        $values = $this->checkDefaultValues($values);

        return $values;
    }


    /**
     * @return QuickFormElementPHP7
     */
    public function getLastElement()//TODO //: array
    {
        return $this->lastElement;
    }


    /**
     * @param array|QuickFormElementPHP7 $lastElement
     */
    public function setLastElement(QuickFormElementPHP7 $lastElement)
    {
        $this->lastElement = $lastElement;
    }

    /**
     * Validation of html elements
     * @return bool
     */
    public function validate()//TODO //: bool
    {
        //TODO: create validation
//        foreach ($this->elements as $name => $element) {
//            $res = QuickFormElementPHP7::validate($element);
//            if(!$res){
//                return false;
//            }
//        }
        $result = true;
        return $result;
    }

    /**
     * @return int
     */
    public function getIndexLastElement()//TODO //:int
    {
        return count($this->elements);
    }

    /**
     * @param array $values
     * @return array
     */
    private function checkDefaultValues(array $values)//TODO :array|mixed
    {
        $defaults = $this->getDefaults();

        foreach ($values as $name => $value) {
            if (in_array($name, array_keys($defaults)) && $values[$name] != $defaults[$name]) {
                $values[$name] = $defaults[$name];
            }
        }

        return $values;
    }

    /**
     * Registers a new element type
     *
     * @param     string $typeName Name of element type
     * @param     string $include Include path for element type
     * @param     string $className Element class name
     */
    public static function registerElementType(string $typeName, string $include, string $className)
    {
        $GLOBALS['HTML_QUICKFORM_ELEMENT_TYPES'][strtolower($typeName)] = [$include, $className];
    }

//    /**
//     * @param array $elements
//     * @param string $name
//     * @param string $groupLabel
//     * @param string $separator
//     * @param bool $appendName
//     */
//    public function addGroup(array $elements, string $name, string $groupLabel, string $separator, bool $appendName)
//    {
//        $anonGroups = $this->getAnonGroups();
//
//        if (0 == strlen($name)) {
//            $name = 'qf_group_' . $this->setAnonGroups($anonGroups++);
//            $appendName = false;
//        }
//        //TODO: create group of elements - generate all elements as html-code and pass it to html-attribute of group
////        $group = $this->addElement('group', ['name' => $name, 'label' => $groupLabel, $elements, 'sep' => $separator]);
//    }

    /**
     * @return int
     */
    public function getAnonGroups()//TODO : int
    {
        return $this->anonGroups;
    }

    /**
     * @param int $anonGroups
     */
    public function setAnonGroups(int $anonGroups)
    {
        $this->anonGroups = $anonGroups;
    }

    /**
     * @param string $type
     * @param array $attributes
     */
    private function checkResetForGroup(string $type, array $attributes)
    {
        if(isset($attributes['reset']) && $type == 'group'){
            if(!empty($this->elements)){
                foreach($this->elements as $key => $element){
                    if(isset($element['type']) && $element['type'] != 'group'){
                        unset($this->elements[$key]);
                    }
                }
            }
        }
    }

    /**
     * @param bool $freezeAll
     */
    public function setFrozen(bool $freezeAll)
    {
        $this->_freezeAll = $freezeAll;
    }
}