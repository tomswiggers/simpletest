<?php
require_once 'simpletest/simpletest.php';
require_once 'simpletest/web_tester.php';
require_once 'show_passes.php';
require_once 'custom_web_test_case.php';

require_once 'tests/access_denied.php';
require_once 'tests/ssl.php';
require_once 'tests/pages.php';
require_once 'tests/ga.php';
require_once 'tests/broken_links.php';
require_once 'tests/page_content.php';

class CustomTestSuite extends TestSuite
{
  public $base;
  public $pages = array();
  public $config;

  public function __construct($config)
  {
    $this->config = $config;
    parent::__construct($config->name);
  }

  public function addPage($page)
  {
    $this->pages[] = $page;
  }

  private function _checkForPages($objName)
  {
    if (array_key_exists($objName, $this->config)) {

      if (array_key_exists('pages', $this->config[$objName]) && !empty($this->config[$objName]['pages'])) {
        return TRUE;
      }
    }

    return FALSE;
  }

  private function _addTestCase($testCase)
  {
    $obj = new $testCase->name();
    $obj->setBase($this->config->base);
    $obj->config = $this->config;
    $obj->properties = $testCase;

/*
    if ($this->_checkForPages($objName)) {
      
      foreach ($this->config->$objName->pages as $page) {
        $obj->addPage($page['url']);
      }
    }
 */
    $this->add($obj);
  }

  private function _addTestCases()
  {
    foreach ($this->config->testCases as $testCase) {
      $this->_addTestCase($testCase);
    }
  }

  public function run()
  {
    $this->_addTestCases();

    if (TextReporter::inCli()) {
      parent::run(new ShowPassesText());
    } else {
      parent::run(new ShowPassesHtml());
    }
  }
}
