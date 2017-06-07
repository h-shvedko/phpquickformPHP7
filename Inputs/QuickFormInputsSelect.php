<?php

/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 16/05/2017
 * Time: 16:33
 */
class QuickFormInputsSelect extends A_QuickFormInputsFactoryPHP7
{
    /**
     * @var string
     */
    private $options = '';

    /**
     * QuickFormInputsSelect constructor.
     * @param string $name
     * @param array $attributes
     */
    public function __construct(string $name, array $attributes = [])
    {
        $this->setType(self::TYPE_SELECT);

        $this->setName($name);

        if (isset($attributes['value'])) {
            $this->setValue($attributes['value']);
            unset($attributes['value']);
        }

        if (isset($attributes['readonly'])) {
            $this->setReadonly($attributes['readonly']);
            unset($attributes['readonly']);
        }

        if (isset($attributes['placeholder'])) {
            $this->setPlaceholder($attributes['placeholder']);
            unset($attributes['placeholder']);
        }

        if (isset($attributes['required'])) {
            $this->setRequired($attributes['required']);
            unset($attributes['required']);
        }

        if (isset($attributes['label'])) {
            unset($attributes['label']);
        }

        $this->setAttributes($attributes);

        parent::__construct();
    }

    /**
     * Method which generates html code for particular input type
     */
    public function generateHtml()
    {
        $html = '';

        $html = sprintf('%s%s', $html, $this->getTemplateStart());

        $html = sprintf('%s name="%s"', $html, $this->getName());

        if($this->getReadonly()){
            $html = sprintf('%s readonly="%s"', $html, $this->getReadonly());
        }

        $html = sprintf('%s placeholder="%s"', $html, $this->getPlaceholder());
        $html = sprintf('%s %s', $html, ($this->isRequired())? "required": null);

//        //checking if we have default value
//        if($this->inDefault() && empty($this->getValue())){
//            $options = $this->generateOptionsHtml();
//            $html = sprintf('%s value="%s"', $html, $this->getDefaultValue());
//        } else {
//            $options = $this->generateOptionsHtml();
//            $html = sprintf('%s value="%s"', $html, $this->getValue());
//        }
//
        $options = $this->generateOptionsHtml();
        $this->generateAttributes();
        $attributes = $this->getLineWithAttributes();

        $html = sprintf('%s %s', $html, $attributes);
        $html = sprintf('%s%s', $html, $this->getTemplateEnd());
        $html = sprintf('%s %s', $html, $options);
        $html = sprintf('%s %s', $html, $this->getCloseTagForSelect());

        $this->setHtml($html);
    }

    /**
     * Method which validates html tag
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }

    /**
     * @return string
     */
    public function getTemplateStart()//TODO :string
    {
        return '<select';
    }

    /**
     * @return string
     */
    public function getTemplateEnd()//TODO :string
    {
        return '>';
    }

    /**
     * @return string
     */
    private function getCloseTagForSelect()//TODO :string
    {
        return '</select>';
    }

    /**
     * @return string
     */
    private function generateOptionsHtml()//TODO :sting
    {
        $html = '';
        $attributes = $this->getAttributes();

        if(isset($attributes['options'])){
            foreach($attributes['options'] as $name => $value){
                $html = sprintf('%s %s', $html, '<option');
                $html = sprintf('%s value="%s"', $html, $name);

                if(!isset($this->getAttributes()['multiple']) || (isset($this->getAttributes()['multiple']) && $this->getAttributes()['multiple'] == 'multiple')){
                   if($name == $this->getDefaultValue() || $name == $this->getValue()){
                        $html = sprintf('%s %s', $html, 'selected="selected"');
                    }
                }

                $html = sprintf('%s %s', $html, '>');
                $html = sprintf('%s %s', $html, htmlspecialchars($value));
                $html = sprintf('%s %s', $html, '</option>');
            }
            unset($attributes['options']);
            $this->setAttributes($attributes);
        }
        return $html;
    }

    /**
     * @return string
     */
    public function getOptions()//TODO : string
    {
        return $this->options;
    }

    /**
     * @param string $options
     */
    public function setOptions(string $options)
    {
        $this->options = $options;
    }

    /**
     * @param string $searchValue
     * @return bool
     */
    private function checkDefaultMultipleValue(string $searchValue)
    {
        $res = false;
        $defaults = $this->getAttributes()['defaults'];
        if(is_array($defaults)){
            foreach ($defaults as $key => $value){
                if($this->getName() == $key){
                    if(is_array($value)){
                        foreach($value as $item => $defValue){
                            if($defValue == $searchValue){
                                return true;
                            }
                        }
                    } elseif($value == $searchValue) {
                        return true;
                    }
                }
            }
        }
        return $res;
    }
}