<?php
/**
 * Created by PhpStorm.
 * User: jahn.hane
 * Date: 17/03/2016
 * Time: 09:39
 */

define('APPLICATION_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
define('INCLUDE_TEST_PATH', APPLICATION_PATH.'includes/');

require_once INCLUDE_TEST_PATH . 'quickformPHP7/QuickFormPHP7.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/QuickFormElementPHP7.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/A_QuickFormInputsFactoryPHP7.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsButton.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsCheckBox.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsFile.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsText.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsImage.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsPassword.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsCheckBox.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsReset.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsSelect.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsSubmit.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsText.php';
require_once INCLUDE_TEST_PATH . 'quickformPHP7/Inputs/QuickFormInputsEmail.php';