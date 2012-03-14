<?php
require_once 'simpletest/simpletest.php';
require_once 'simpletest/web_tester.php';
require_once 'show_passes.php';
require_once 'custom_web_test_case.php';

require_once 'tests/access_denied.php';
require_once 'tests/ssl.php';

class CustomTestSuite extends TestSuite
{
  public $base;
  public $pages = array();
  public $config;

  public function __construct($config)
  {
    $this->config = $config;
    parent::__construct($config['name']);
  }

  public function addPage($page)
  {
    $this->pages[] = $page;
  }

  public function createTestPages()
  {
    require_once 'tests/pages.php';

    $this->testPages = new TestPages();
  }

  public function createTestGa()
  {
    require_once 'tests/ga.php';

    $this->testGa = new TestGa();
  }

  public function createTestLinksOnPage()
  {
    require_once 'tests/links_on_page.php';
    $this->testLinksOnPage = new LinksOnPageTestCase();
    $this->testLinksOnPage->setBase($this->base);
  }

  private function _addTestCase($objName)
  {
    $obj = new $objName();
    $obj->setBase($this->config['base']);

    $this->add($obj);
  }

  private function _addTestCases()
  {
    foreach ($this->config['testCases'] as $testCase) {
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
