<?php

/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 16/05/2017
 * Time: 10:21
 */
class QuickFormInputsCheckBox extends A_QuickFormInputsFactoryPHP7
{
    /**
     * QuickFormInputsCheckBox constructor.
     * @param string $name
     * @param array $attributes
     * @param string $type
     */
    public function __construct(string $name, array $attributes = [], string $type)
    {
        if(A_QuickFormInputsFactoryPHP7::TYPE_CHECKBOX == $type){
            $this->setType(self::TYPE_CHECKBOX);
        } else {
            $this->setType(self::TYPE_RADIO);
        }

        $this->setName($name);

        if(isset($attributes['name'])){
            if($this->getName() != $attributes['name']){
                $this->setValue($attributes['name']);
            }
            unset($attributes['name']);
        }

        if(isset($attributes['value'])){
            $this->setValue($attributes['value']);
            unset($attributes['value']);
        }

        if(isset($attributes['checked'])){
            $this->setChecked($attributes['checked']);
            unset($attributes['checked']);
        }

        if(isset($attributes['readonly'])){
            $this->setReadonly($attributes['readonly']);
            unset($attributes['readonly']);
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
        $html = sprintf('%s type="%s"', $html, $this->getType());

        //checking if we have default value
        if($this->inDefault() && empty($this->getValue())){
            if((int) $this->getDefaultValue() > 0){
                $html = sprintf('%s checked="%s"', $html, 'checked');
            }
        } elseif(!empty($this->getValue())) {
            if((int) $this->getValue() > 0){
                $html = sprintf('%s checked="%s"', $html, 'checked');
            }
        } elseif ($this->getChecked()){
            $html = sprintf('%s checked="%s"', $html, 'checked');
        }

        $html = sprintf('%s name="%s"', $html, $this->getName());

        if($this->getReadonly()){
            $html = sprintf('%s readonly="%s"', $html, $this->getReadonly());
        }

        $this->generateAttributes();
        $attributes = $this->getLineWithAttributes();

        $html = sprintf('%s %s', $html, $attributes);
        $html = sprintf('%s%s', $html, $this->getTemplateEnd());

        $this->setHtml($html);
    }

    /**
     * Method which validates html tag
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}