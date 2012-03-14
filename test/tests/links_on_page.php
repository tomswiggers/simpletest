<?php
require_once 'simpletest/browser.php';

class LinksOnPageTestCase extends CustomWebTestCase 
{
  public function testLinksOnPage()
  {
    $browser = new SimpleBrowser();
    $browser->get($this->base);

    $urls = $browser->getUrls();

    if (is_array($urls) && !empty($urls)) {
      
      foreach ($urls as $url) {
        $this->get($url);
        $this->assertResponse(200, 'Check response code is 200 on '. $url);
      }
    }
  }
}
