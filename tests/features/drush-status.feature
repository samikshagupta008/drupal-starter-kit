@api @drush
Feature: Site Status

Scenario: Check Site Database and Bootstrap
  Given I run drush status
  Then drush output should contain ':  mysql'
  Then drush output should contain ':  Successful'
  Then drush output should contain ':  sites/default/settings.php'

Scenario: Check site running correct themes
  Given I run drush status
  Then drush output should contain ':  sealedairintra'
  Then drush output should contain ':  seven'
