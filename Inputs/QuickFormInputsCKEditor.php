<?php
//TODO : change this description
/**
 * Custom HTML_Quickform elementtype voor FCKeditor textarea
 *
 * This elementtype builds an FCKeditor instance for PEAR::HTML_Quickform
 * class. It extends HTML_Quickform
 *
 * 1. Place this file in the FCK directory (where fckeditor.php is)
 *
 * 2. Register the element type in Quickform.
 *    ! Make sure the path to this class file is relative to the location of the
 *      script that is calling this command.
 *        HTML_Quickform::registerElementType('fckeditor'
 *                                           ,'path/to/HTML_Quickform_fckeditor.php'
 *                                           ,'HTML_Quickform_fckeditor');
 *
 * 3. Create an instance in the Quickform object, here with some config options. See
 *    $_aFckConfigProps for all the possible options.
 *    ! The basepath (here in $sFCKBasePath) should be absolute to de documentroot
 *      of the webserver.
 *    ! It seems that StylesXmlPath needs the same absolute path as basepath.
 *
 *        $oQFElement = HTML_Quickform::createElement ('fckeditor'      // QF type
 *                                                    ,'myfckinstance'  // element name
 *                                                    ,'The Label');    // label
 *        $sFCKBasePath = '/path/from/documentroot/to/fckdir/';
 *        $oQFElement->setFCKProps($sFCKBasePath     // BasePath
 *                                ,'Basic'           // Toolbarset
 *                                ,'800'             // Width
 *                                ,'300'             // Height
 *                                ,array('SkinPath'                 => 'editor/skins/office2003/'
 *                                      ,'DefaultLanguage'          => 'nl'
 *                                      ,'StylesXmlPath'            => 'path/to/fckstyles.xml'
 *                                      ,'UseBROnCarriageReturn'    => 'true'
 *                                      ,'StartupFocus'             => 'false'
 *                                      ,'CustomConfigurationsPath' => 'config.js'
 *                                      ,'EditorAreaCSS'            => 'fck_editorarea.css'));
 *

 * Created by PhpStorm.
 * User: hennadii.shvedko
 * Date: 17/05/2017
 * Time: 12:57
 */
class QuickFormInputsCKEditor extends A_QuickFormInputsFactoryPHP7
{
    /**
     * Path to FCK class
     *
     * @var string Path to PHP FCK class
     */
    private $_sFckBasePath = '';

    /**
     * Toolbar
     *
     * @var string Requested toolbarset
     * @access private
     */
    private $_sToolbarSet = '';

    /**
     * Height of editor
     *
     * @var string Height
     */
    private $_sHeight = '';

    /**
     * Width of editor
     *
     * @var string Width
     */
    private $_sWidth = '';

    /**
     * FCK properties
     *
     * @var array Set of FCK only properties
     */
    private $_aFckConfigProps = [
        'CustomConfigurationsPath' => NULL
        , 'EditorAreaCSS' => NULL
        , 'Debug' => NULL
        , 'SkinPath' => NULL
        , 'PluginsPath' => NULL
        , 'AutoDetectLanguage' => NULL
        , 'DefaultLanguage' => NULL
        , 'EnableXHTML' => NULL
        , 'EnableSourceXHTML' => NULL
        , 'GeckoUseSPAN' => NULL
        , 'StartupFocus' => NULL
        , 'ForcePasteAsPlainText' => NULL
        , 'ForceSimpleAmpersand' => NULL
        , 'TabSpaces' => NULL
        , 'UseBROnCarriageReturn' => NULL
        , 'LinkShowTargets' => NULL
        , 'LinkTargets' => NULL
        , 'LinkDefaultTarget' => NULL
        , 'ToolbarStartExpanded' => NULL
        , 'ToolbarCanCollapse' => NULL
        , 'StylesXmlPath' => NULL
    ];

    /**
     * @var bool
     */
    private $_persistantFreeze = false;

    /**
     * @var bool
     */
    private $_flagFrozen = false;

    /**
     * Class constructor
     *
     * @param string $name
     * @param array $attributes
     */
    public function __construct(string $name, array $attributes = [])
    {
        $this->setType(self::TYPE_FCKEDITOR);

        $this->setName($name);

        if(isset($attributes['name'])){
            if($this->getName() != $attributes['name']){
                $this->setValue($attributes['name']);
            }
            unset($attributes['name']);
        }

        $this->setNameInAttributes($name);

        if(isset($attributes['requestAttributes']) && is_array($attributes['requestAttributes'])){
            $this->setFCKProps($attributes['requestAttributes']);
        }

        $this->setAttributes($attributes);

        $this->setPersistantFreeze(TRUE);

        parent::__construct();
    }

    /**
     * Method which validates html tag
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }


    /**
     * Set properties for FCKeditor instance (came from legasy)
     *
     * @param array $props
     */
    private function setFCKProps(array $props)
    {
        if(isset($props['basePath'])){
            $this->setSFckBasePath($props['basePath']);
        }

        if(isset($props['toolBarSet'])){
            $this->setSToolbarSet($props['toolBarSet']);
        }

        if(isset($props['width'])){
            $this->setSWidth($props['width']);
        }

        if(isset($props['height'])){
            $this->setSHeight($props['height']);
        }

        $settings = $this->getAFckConfigProps();
        /*
         * Set configuration array if not NULL
         */

        if(isset($props['requestAttributes']) && $props['requestAttributes'] != null){
            $mFckRequestedAttrs = $props['requestAttributes'];

            // Collect keys of requested attributes
            $aFckRequestedAttrKeys = array_keys($mFckRequestedAttrs);
            // Search in supported attribute array for the keys
            foreach ($this->_aFckConfigProps as $sFckProp => $sFckValue) {
                $mArraySearchResult = array_search($sFckProp, $aFckRequestedAttrKeys);
                if ($mArraySearchResult === false) {
                    unset($settings[$sFckProp]);
                } else {
                    $settings[$sFckProp] = $mFckRequestedAttrs[$sFckProp];
                }
            }
            $this->setAFckConfigProps($settings);
        } else {
            // No properties requested
            $this->setAFckConfigProps([]);
        }
    }

    /**
     * Register name atribute
     *
     * @param string $name
     * @return void
     */
    public function setNameInAttributes(string $name)
    {
        $this->updateAttributes(['name' => $name]);
    }

    /**
     * Naam teruggeven (name attribute)
     *
     * @return string Name attribute element
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * Waarde/inhoud registreren (value attribute)
     *
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->updateAttributes(array('value' => $value));
    }

    /**
     * Return Value (value attribute)
     *
     * @return string Value attribute element
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * Generate and return HTML code for editor
     */
    public function generateHtml()
    {
        if ($this->_flagFrozen) {
            return $this->getFrozenHtml();
        } else {
            /*
             * Create FCK editor
             */
            // Load FCKeditor class
            require_once INCLUDE_PATH.'fckeditor/fckeditor.php';
            // Create instance
            $oFCKeditor = new FCKeditor($this->getAttribute('name'));
            // Set parameters
            if ($this->getSFckBasePath() !== null) {
                $oFCKeditor->BasePath = $this->getSFckBasePath();
            }
            if ($this->getSToolbarSet() !== null) {
                $oFCKeditor->ToolbarSet = $this->getSToolbarSet();
            }
            if ($this->getSWidth() !== null) {
                $oFCKeditor->Width = $this->getSWidth();
            }
            if ($this->getSHeight() !== null) {
                $oFCKeditor->Height = $this->getSHeight();
            }
            if ($this->getAFckConfigProps() !== null) {
                $oFCKeditor->Config = $this->getAFckConfigProps();
                // If a relative path is given, then precede it with the editor's basepath (like in fckconfig.js)'
                if (isset($oFCKeditor->Config['SkinPath']) && substr($oFCKeditor->Config['SkinPath'], 0, 1) != '/') {
                    $oFCKeditor->Config['SkinPath'] = $this->getSFckBasePath() . $oFCKeditor->Config['SkinPath'];
                }
                if (isset($oFCKeditor->Config['EditorAreaCSS']) && substr($oFCKeditor->Config['EditorAreaCSS'], 0, 1) != '/') {
                    $oFCKeditor->Config['EditorAreaCSS'] = $this->getSFckBasePath() . $oFCKeditor->Config['EditorAreaCSS'];
                }
            }
            $oFCKeditor->Value = $this->getDefaultValue();
            // Generate the HTML code for the editor
            $sFCKCode = $oFCKeditor->CreateHTML();
            // Destroy FCKeditor object
            unset($oFCKeditor);
            /*
             * return code
             */
            $this->setHtml($sFCKCode);
        }
    }// End function toHtml

    /**
     * Return contents without HTML tags
     *
     * @return string Text contents element
     */
    public function getFrozenHtml()
    {
        $sValue = htmlspecialchars($this->getValue());
        if ($this->getAttribute('wrap') == 'off') {
            $sHtml = '<pre>' . $sValue . '</pre>' . "\n";
        } else {
            $sHtml = nl2br($sValue) . "\n";
        }
        return $sHtml . $this->_getPersistantData();
    }

    /**
     * @return bool
     */
    public function isPersistantFreeze()//TODO : bool
    {
        return $this->_persistantFreeze;
    }

    /**
     * @param bool $persistantFreeze
     */
    public function setPersistantFreeze(bool $persistantFreeze)
    {
        $this->_persistantFreeze = $persistantFreeze;
    }

    /**
     * @return array
     */
    public function getAFckConfigProps()//TODO : array
    {
        return $this->_aFckConfigProps;
    }

    /**
     * @param array $aFckConfigProps
     */
    public function setAFckConfigProps(array $aFckConfigProps)
    {
        $this->_aFckConfigProps = $aFckConfigProps;
    }

    /**
     * @return string
     */
    public function getSWidth()//TODO : string
    {
        return $this->_sWidth;
    }

    /**
     * @param string $sWidth
     */
    public function setSWidth(string $sWidth)
    {
        $this->_sWidth = $sWidth;
    }

    /**
     * @return string
     */
    public function getSHeight()//TODO : string
    {
        return $this->_sHeight;
    }

    /**
     * @param string $sHeight
     */
    public function setSHeight(string $sHeight)
    {
        $this->_sHeight = $sHeight;
    }

    /**
     * @return string
     */
    public function getSToolbarSet()//TODO : string
    {
        return $this->_sToolbarSet;
    }

    /**
     * @param string $sToolbarSet
     */
    public function setSToolbarSet(string $sToolbarSet)
    {
        $this->_sToolbarSet = $sToolbarSet;
    }

    /**
     * @return string
     */
    public function getSFckBasePath()//TODO : string
    {
        return $this->_sFckBasePath;
    }

    /**
     * @param string $sFckBasePath
     */
    public function setSFckBasePath(string $sFckBasePath)
    {
        $this->_sFckBasePath = $sFckBasePath;
    }

    /**
     * @param array $attributes
     */
    private function updateAttributes(array $attributes)
    {
        if (!empty($attributes)) {
            foreach ($attributes as $name => $value) {
                if (in_array($name, array_keys($this->getAttributes()))) {
                    $this->updateAttributeByName($name, $value);
                }
            }
        }
    }

    /**
     * @param string $name
     * @param string $value
     */
    private function updateAttributeByName(string $name, string $value)
    {
        $attributes = $this->getAttributes();

        if (!empty($attributes)) {
            $attributes[$name] = $value;
        }

        $this->setAttributes($attributes);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getAttribute(string $name)
    {
        $attributes = $this->getAttributes();

        return array_key_exists($name, $attributes) ? $attributes[$name] : '';
    }

    /**
     * @return string
     */
    public function _getPersistantData()
    {
        if (!$this->_persistantFreeze) {
            return '';
        } else {
            $id = $this->getAttribute('id');
            return '<input' . $this->generateAttributesByValue([
                        'type' => 'hidden',
                        'name' => $this->getName(),
                        'value' => $this->getValue(),
                        (isset($id) ? ['id' => $id] : []),
                    ]) . ' />';
        }
    }

    /**
     * @return bool
     */
    public function isFlagFrozen()//TODO : bool
    {
        return $this->_flagFrozen;
    }

    /**
     * @param bool $flagFrozen
     */
    public function setFlagFrozen(bool $flagFrozen)
    {
        $this->_flagFrozen = $flagFrozen;
    }

    /**
     * Method which generates line with additional attributes
     * @param array $attributes
     * @return null|string
     */
    protected function generateAttributesByValue(array $attributes)
    {
        $attributesLine = '';

        foreach ($this->getAttributes() as $name => $value) {
            $attributesLine .= sprintf('%s = "%s"', $name, htmlspecialchars($value));
        }

        return $attributesLine;
    }
}