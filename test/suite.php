<?php
require_once 'simpletest/simpletest.php';
require_once 'simpletest/web_tester.php';
require_once 'show_passes.php';
require_once 'custom_web_test_case.php';

require_once 'tests/access_denied.php';

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
  public function createTestLinksOnPage()
  {
    require_once 'tests/links_on_page.php';
    $this->testLinksOnPage = new LinksOnPageTestCase();
    $this->testLinksOnPage->setBase($this->base);
  }

  private function _addTestCase($objName)
  {
    $obj = new $objName();
    $obj->setBase($this->base);

    $this->add($obj);
  }


  public function run()
  {
    $this->_addTestCase('AccessDeniedWebTestCase');

    if (TextReporter::inCli()) {
      parent::run(new ShowPassesText());
    } else {
      parent::run(new ShowPassesHtml());
    }
  }
}
