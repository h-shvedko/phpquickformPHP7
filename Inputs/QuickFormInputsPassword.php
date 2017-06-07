<?php
/**
 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 16/05/2017
 * Time: 13:45
 */

class QuickFormInputsPassword extends A_QuickFormInputsFactoryPHP7
{
    /**
     * QuickFormInputsPassword constructor.
     * @param string $name
     * @param array $attributes
     */
    public function __construct(string $name, array $attributes = [])
    {
        $this->setType(self::TYPE_PASSWORD);

        $this->setName($name);

        if (isset($attributes['value'])) {
            $this->setValue($attributes['value']);
            unset($attributes['value']);
        }

        if (isset($attributes['readonly'])) {
            $this->setReadonly($attributes['readonly']);
            unset($attributes['readonly']);
        }

        if (isset($attributes['size'])) {
            $this->setSize($attributes['size']);
            unset($attributes['size']);
        }

        if (isset($attributes['pattern'])) {
            $this->setPattern($attributes['pattern']);
            unset($attributes['pattern']);
        }

        if (isset($attributes['placeholder'])) {
            $this->setPlaceholder($attributes['placeholder']);
            unset($attributes['placeholder']);
        }

        if (isset($attributes['required'])) {
            $this->setRequired($attributes['required']);
            unset($attributes['required']);
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
        $html = sprintf('%s readonly="%s"', $html, $this->getReadonly());
        $html = sprintf('%s placeholder="%s"', $html, $this->getPlaceholder());
        $html = sprintf('%s pattern="%s"', $html, $this->getPattern());
        $html = sprintf('%s size="%d"', $html, $this->getSize());
        $html = sprintf('%s %s', $html, ($this->isRequired()) ? "required" : null);

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