<?
require_once "QuickFormPHP7.php";
require_once "QuickFormElementPHP7.php";

$form = new QuickFormPHP7('test');

$form->addElement('html', ['html' => '<h1>Hello world!!!!</h1>']);

$output = $form->render();

echo $output;
die;