<?php

class TestSsl extends WebTestCase {

  function testSwitchToSsl() {
    $this->setMaximumRedirects(0);
    $this->get();
    $headers = $this->getBrowser()->getHeaders();
    $this->assertResponse(302);
    $this->assertTrue(preg_match('/Location: https:/', $headers));
  }
}
