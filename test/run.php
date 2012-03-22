<?php
require_once 'suite.php';

$shortopts = "f:";
$options = getopt($shortopts);

if (is_array($options) && array_key_exists('f', $options)) {
  $config = json_decode(file_get_contents($options['f']));

  $suite = new CustomTestSuite($config);
  $suite->run();
}
