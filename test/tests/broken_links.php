<?php
require_once 'simpletest/browser.php';

class BrokenLinksWebTestCase extends CustomWebTestCase 
{

  private function _testBrokenLinks($url)
  {
    $browser = new SimpleBrowser();
    $browser->get($url);

    $urls = $browser->getUrls();

    if (is_array($urls) && !empty($urls)) {
      
      foreach ($urls as $urlToCheck) {
        $this->get($urlToCheck);
        $this->assertResponse(200, 'Check response code is 200 on '. $urlToCheck);
      }
    }
  }

  public function testBrokenLinksOnHomepage()
  {
    if (strlen($this->base)) {
      //$this->_testBrokenLinks($this->base);
    }
  }

  public function testBrokenLinksOnPages()
  {
    var_dump($this->config);
  }
}
