<?php
require_once 'suite.php';

$shortopts = "f:";
$options = getopt($shortopts);

if (is_array($options) && array_key_exists('f', $options)) {
  $config = parse_ini_file($options['f'], TRUE);
  $suite = new CustomTestSuite($config);
  $suite->run();
}
