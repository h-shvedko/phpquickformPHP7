<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 16/05/2017
 * Time: 13:38
 */

class QuickFormInputsButton extends A_QuickFormInputsFactoryPHP7
{
    /**
     * QuickFormInputsButton constructor.
     * @param string $name
     * @param array $attributes
     */
    public function __construct(string $name, array $attributes = [])
    {
        $this->setType(self::TYPE_BUTTON);

        $this->setName($name);

        if (isset($attributes['name'])) {
            if($name != $attributes['name']){
                $this->setName($attributes['name']);
            }
            unset($attributes['name']);
        }

        if (isset($attributes['value'])) {
            $this->setValue($attributes['value']);
            unset($attributes['value']);
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
            $html = sprintf('%s value="%s"', $html, $this->getDefaultValue());
        } else {
            $html = sprintf('%s value="%s"', $html, $this->getValue());
        }

        $html = sprintf('%s name="%s"', $html, $this->getName());

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