@api @dev
Feature: Sample features for srijan.net

Scenario: Site is up?
  Given I am on homepage
  Then I should get a 200 HTTP response

Scenario: Page redirect and check for text
  Given I am on homepage
  When I click "Solutions"
  Then I should see "E-Commerce Solutions" in the ".view-solution-s-menu-view" element
