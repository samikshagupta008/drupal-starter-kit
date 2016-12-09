@api @dev
Feature: Check login for users

Scenario: Test that authenticated user can log in
  Given I am on homepage
  Then I should get a 200 HTTP response
