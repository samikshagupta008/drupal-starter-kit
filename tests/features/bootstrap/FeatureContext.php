<?php

/**
 * Feature Context for extending available commands for Drupal sites.
 */

use Drupal\DrupalExtension\Context\RawDrupalContext;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

date_default_timezone_set('America/New_York');

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawDrupalContext implements SnippetAcceptingContext
{
  /** @vars() Drupal\DrupalExtension\Context\DrupalContext; */
  private $drupalContext;

  // Get the path to store screenshot
  protected $screenShotsPath;

  // Construct
  public function __construct(array $parameters) {
    $this->screenShotsPath = isset($parameters['screen_shots_path']) ? $parameters['screen_shots_path'] : getcwd();
  }

  /** @BeforeScenario */
  public function gatherContexts(BeforeScenarioScope $scope) {
    $environment = $scope->getEnvironment();
    $this->drupalContext = $environment->getContext('Drupal\DrupalExtension\Context\DrupalContext');
  }

  /**
   * @Then take desktop screenshot prefixed :prefix
   */
  public function takeDesktopScreenshotPrefixed($prefix) {
    if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
      $this->getSession()->resizeWindow(1366, 768, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . $prefix . 'desktop-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Screenshot for created in $file_name";
    }
  }

  /**
   * @Then take tablet screenshot prefixed :prefix
   */
  public function takeTabletScreenshotPrefixed($prefix) {
    if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
      $this->getSession()->resizeWindow(1024, 768, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . $prefix . 'tablet-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Screenshot for created in $file_name";
    }
  }

  /**
   * @Then take mobile screenshot prefixed :prefix
   */
  public function takeMobileScreenshotPrefixed($prefix) {
    if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
      $this->getSession()->resizeWindow(360, 640, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . $prefix . 'mobile-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Screenshot for created in $file_name";
    }
  }

  /**
   * @Then take multi screenshot
   */
  public function takeMultiScreenshot() {
    if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
      // Mobile screenshot.
      $this->getSession()->resizeWindow(360, 640, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . 'mobile-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Mobile screenshot for created in $file_name\n";

      // Tablet Screenshot.
      $this->getSession()->resizeWindow(1024, 768, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . 'tablet-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Tablet screenshot for created in $file_name\n";

      // Desktop Screenshot.
      $this->getSession()->resizeWindow(1366, 768, 'current');
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . 'desktop-screenshot.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Desktop screenshot for created in $file_name\n";
    }
  }

  /**
   * @AfterStep
   *
   * Take a screen shot after failed steps for Selenium drivers.
   * PhantomJs).
   */
  public function takeScreenshotAfterFailedStep($event) {
    if ($event->getTestResult()->isPassed()) {
      // Not a failed step.
      return;
    }
    if ($this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
      $file_name = $this->screenShotsPath . DIRECTORY_SEPARATOR . 'tests/screenshot/behat-failed-step.png';
      $screenshot = $this->getSession()->getDriver()->getScreenshot();
      file_put_contents($file_name, $screenshot);
      print "Screenshot for failed step created in $file_name";
    }
  }

  /**
   * @When I wait for :arg1 seconds
   */
  public function iWaitForSeconds($arg1) {
    sleep($arg1);
  }

  /**
   * @When I click element :element
   */
  public function iClickElement($element) {
    $page = $this->getSession()->getPage();
    $el = $page->find('css', $element);
    if (!$el) {
      throw new Exception($element . " could not be found");
    }
    $el->click();
  }

  /**
   * @When I click the fake :text button
   */
  public function iClickTheFakeButton($text) {
    // Media style selector "buttons" are A tags with no href, so not findable
    // by normal steps.
    $driver = $this->getSession()->getDriver();
    $buttons = $driver->find("//a[text()='$text']");
    $buttons[0]->click();
  }

  /**
   * @When switch to iframe :iframe
   */
  public function switchToIFrame($iframeSelector){
    $function = <<<JS
    (function(){
          var iframe = document.querySelector("$iframeSelector");
          iframe.name = "iframeToSwitchTo";
    })()
JS;
    try {
      $this->getSession()->executeScript($function);
    }
    catch (Exception $e){
      print_r($e->getMessage());
      throw new \Exception("Element $iframeSelector was NOT found.".PHP_EOL . $e->getMessage());
    }
    $this->getSession()->getDriver()->switchToIFrame("iframeToSwitchTo");
  }

  /**
   * @When switch back from iframe
   */
  public function switchBackFromIFrame() {
    $this->getSession()->getDriver()->switchToIFrame();
  }

  /**
   * @Given /^I fill hidden element having id "([^"]*)" with "([^"]*)"$/
   */
  public function iFillHiddenElementHavingIdWith($element, $value) {
    $page = $this->getSession()->getPage();
    $el = $page->find('css', $element);
    if (!$el) {
      throw new Exception($element . " could not be found");
    }
    $el->setValue($value);
  }

  /**
   * @Given /^I should see element "([^"]*)" having class "([^"]*)"$/
   */
  public function iShouldSeeElementHavingClass($element,$class) {
    $this->getSession()->getPage()->find('css',$element)->hasClass($class);
  }
}
