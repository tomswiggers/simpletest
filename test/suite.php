<?php
require_once 'simpletest/simpletest.php';
require_once 'simpletest/web_tester.php';
require_once 'show_passes.php';
require_once 'custom_web_test_case.php';

class CustomTestSuite extends TestSuite
{
  public $base;
  public $pages = array();

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

  public function createTestSsl()
  {
    require_once 'tests/ssl.php';

    $this->testSsl = new TestSsl();
    $this->testSsl->setBase($this->base);
  }

  public function run()
  {
    if (TextReporter::inCli()) {
      parent::run(new ShowPassesText());
    } else {
      parent::run(new ShowPassesHtml());
    }
  }
}
