<?php
require_once 'simpletest/simpletest.php';
require_once 'simpletest/web_tester.php';

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

  public function run()
  {
    if (TextReporter::inCli()) {
      parent::run(new ShowPassesText());
    } else {
      parent::run(new ShowPassesHtml());
    }
  }
}
