<?php

/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 16/05/2017
 * Time: 09:49
 */
abstract class A_QuickFormInputsFactoryPHP7
{

    /**
     * Types of inputs
     */
    const TYPE_INPUT = 'input'; //only for rendering html tags
    const TYPE_BUTTON = 'button';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_FILE = 'file';
    const TYPE_HIDDEN = 'hidden';
    const TYPE_IMAGE = 'image';
    const TYPE_PASSWORD = 'password';
    const TYPE_RADIO = 'radio';
    const TYPE_RESET = 'reset';
    const TYPE_TEXT = 'text';
    const TYPE_EMAIL = 'email';
    const TYPE_SUBMIT = 'submit';
    const TYPE_SELECT = 'select';
    const TYPE_FCKEDITOR = 'fckeditor';

    /**
     * Type of input
     * @var string
     */
    private $type = '';

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var string
     */
    private $checked = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $pattern = '';

    /**
     * @var string
     */
    private $placeholder = '';

    /**
     * @var string
     */
    private $readonly = '';

    /**
     * @var int
     */
    private $size = 0;

    /**
     * @var string
     */
    private $value = '';

    /**
     * @var bool
     */
    private $required = false;

    /**
     * @var bool
     */
    private $hidden = false;

    /**
     * @var string
     */
    private $templateStart;

    /**
     * @var string
     */
    private $templateEnd;

    /**
     * @var string
     */
    private $html = '';

    /**
     * @var string
     */
    private $lineWithAttributes = '';

    /**
     * A_QuickFormInputsFactoryPHP7 constructor.
     */
    public function __construct()
    {
        $this->templateStart = '<input';
        $this->templateEnd = ' />';
    }

    /**
     * @return string
     */
    public function getType()//TODO: string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getChecked()//TODO: string
    {
        return $this->checked;
    }

    /**
     * @param string $checked
     */
    public function setChecked(string $checked)
    {
        if ($this->getType() == self::TYPE_RADIO || $this->getType() == self::TYPE_RADIO) {
            $this->checked = $checked;
        }
    }

    /**
     * @return string
     */
    public function getName()//TODO: string
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
     * @return string
     */
    public function getPattern()//TODO: string
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern(string $pattern)
    {
        if ($this->getType() == self::TYPE_TEXT || $this->getType() == self::TYPE_PASSWORD) {
            $this->pattern = $pattern;
        }
    }

    /**
     * @return string
     */
    public function getPlaceholder()//TODO: string
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     */
    public function setPlaceholder(string $placeholder)
    {
        if ($this->getType() == self::TYPE_TEXT || $this->getType() == self::TYPE_PASSWORD) {
            $this->placeholder = $placeholder;
        }
    }

    /**
     * @return string
     */
    public function getReadonly()//TODO: string
    {
        return $this->readonly;
    }

    /**
     * @param string $readonly
     */
    public function setReadonly(string $readonly)
    {
        $this->readonly = $readonly;
    }

    /**
     * @return int
     */
    public function getSize()//TODO: int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        if ($this->getType() == self::TYPE_TEXT || $this->getType() == self::TYPE_PASSWORD || $this->getType() == self::TYPE_HIDDEN || $this->getType() == self::TYPE_SELECT) {
            $this->size = $size;
        }
    }

    /**
     * @return string
     */
    public function getValue()//TODO: string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        if ($this->getType() == self::TYPE_TEXT || $this->getType() == self::TYPE_PASSWORD || $this->getType() == self::TYPE_HIDDEN || $this->getType() == self::TYPE_SELECT || $this->getType() == self::TYPE_BUTTON || $this->getType() == self::TYPE_SUBMIT) {
            $this->value = $value;
        }
    }

    /**
     * @return string
     */
    public function getTemplateStart()//TODO: string
    {
        return $this->templateStart;
    }

    /**
     * @param string $templateStart
     */
    public function setTemplateStart(string $templateStart)
    {
        $this->templateStart = $templateStart;
    }

    /**
     * @return string
     */
    public function getTemplateEnd()//TODO: string
    {
        return $this->templateEnd;
    }

    /**
     * @param string $templateEnd
     */
    public function setTemplateEnd(string $templateEnd)
    {
        $this->templateEnd = $templateEnd;
    }

    /**
     * Method which generates html code for particular input type
     */
    abstract function generateHtml();

    /**
     * @return string
     */
    public function getHtml()//TODO: string
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
     * Method which validates html tag
     */
    abstract function validate();

    /**
     * @return bool
     */
    public function isRequired()//TODO: bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required)
    {
        if($this->getType() != self::TYPE_SUBMIT && $this->getType() != self::TYPE_RESET && $this->getType() != self::TYPE_BUTTON){
            $this->required = $required;
        }
    }

    /**
     * @return bool
     */
    public function isHidden()//TODO : bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return string
     */
    public function getLineWithAttributes()//TODO: string
    {
        return $this->lineWithAttributes;
    }

    /**
     * @param string $lineWithAttributes
     */
    public function setLineWithAttributes(string $lineWithAttributes)
    {
        $this->lineWithAttributes = $lineWithAttributes;
    }

    /**
     * @return array
     */
    public function getAttributes()//: array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Method which generates line with additional attributes
     */
    protected function generateAttributes()
    {
        $attributesLine = '';

        foreach ($this->getAttributes() as $name => $value) {
            if (is_string($value)) {
                $attributesLine .= sprintf('%s = "%s" ', $name, htmlspecialchars($value));
            }
        }

        $this->setLineWithAttributes($attributesLine);
    }

    /**
     * @return bool
     */
    public function inDefault()//TODO :bool
    {
        $res = false;
        if (isset($this->attributes['defaults']) && is_array($this->attributes['defaults'])) {
            $res = in_array($this->name, array_keys($this->attributes['defaults']));
        }
        return $res;

    }

    /**
     * @return string
     */
    public function getDefaultValue()//TODO :string
    {
        $value = '';
        if (isset($this->attributes['defaults']) && is_array($this->attributes['defaults']) && isset($this->attributes['defaults'][$this->name])) {
            $value = $this->attributes['defaults'][$this->name];
        }

        $this->setValue($value);

        return $value;
    }
}