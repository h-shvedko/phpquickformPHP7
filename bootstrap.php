<?php
/**
 * Created by PhpStorm.
 * User: jahn.hane
 * Date: 17/03/2016
 * Time: 09:39
 */

define('APPLICATION_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
define('INCLUDE_TEST_PATH', APPLICATION_PATH.'includes/');

require_once 'QuickFormPHP7.php';
require_once 'QuickFormElementPHP7.php';
require_once 'Inputs/A_QuickFormInputsFactoryPHP7.php';
require_once 'Inputs/QuickFormInputsButton.php';
require_once 'Inputs/QuickFormInputsCheckBox.php';
require_once 'Inputs/QuickFormInputsFile.php';
require_once 'Inputs/QuickFormInputsText.php';
require_once 'Inputs/QuickFormInputsImage.php';
require_once 'Inputs/QuickFormInputsPassword.php';
require_once 'Inputs/QuickFormInputsCheckBox.php';
require_once 'Inputs/QuickFormInputsReset.php';
require_once 'Inputs/QuickFormInputsSelect.php';
require_once 'Inputs/QuickFormInputsSubmit.php';
require_once 'Inputs/QuickFormInputsText.php';
require_once 'Inputs/QuickFormInputsEmail.php';