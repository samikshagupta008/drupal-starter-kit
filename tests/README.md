# Core PHP Tests

This project is built to assist with the testing of PHP projects. It includes.

- Behat
- Behat Drupal Extension
- PHP Mess Detector (@TODO)
- PhantomJS (@TODO)

## Install

```
composer install
```

## Test Types

The types of tests that are runnable by this test bot are:

- Static Analysis (@TODO)
- Behaviour Testing (end user testing)

### Behaviour Testing

Behat, with the Behat testing framework you can test the behaviour/user experience of the site, both functionally and visually usig PhantomJS (@TODO).

### Running Behat Tests

This will run a single feature test using behat (not using PhantomJS or Drush).

```
./vendor/bin/behat --config=./tests/behat.yaml ./tests/feature/sample-features.feature
```

This will run multiple features if they are tagged (**@tagged**) inside the feature.

```
./vendor/bin/behat --config=./tests/behat.yaml --tags=@dev
```

### Available Drupal Behat Commands

Thes commands are all enabled via the Behat Drupal Extension. These are accessible from running a definition listing ```./vendor/bin/behat --config=.tests/behat.yaml -dl```:

```
- default | Given I am an anonymous user
- default | Given I am not logged in
- default | Given I am logged in as a user with the :role role(s)
- default | Given I am logged in as a/an :role
- default | Given I am logged in as a user with the :role role(s) and I have the following fields:
- default | Given I am logged in as :name
- default | Given I am logged in as a user with the :permissions permission(s)
- default | Then I should see (the text ):text in the :rowText row
- default | Then I should not see (the text ):text in the :rowText row
- default | Given I click :link in the :rowText row
- default | Then I (should )see the :link in the :rowText row
- default | Given the cache has been cleared
- default | Given I run cron
- default | Given I am viewing a/an :type (content )with the title :title
- default | Given a/an :type (content )with the title :title
- default | Given I am viewing my :type (content )with the title :title
- default | Given :type content:
- default | Given I am viewing a/an :type( content):
- default | Then I should be able to edit a/an :type( content)
- default | Given I am viewing a/an :vocabulary term with the name :name
- default | Given a/an :vocabulary term with the name :name
- default | Given users:
- default | Given :vocabulary terms:
- default | Given the/these (following )languages are available:
- default | Then (I )break
- default | Given I am at :path
- default | When I visit :path
- default | When I click :link
- default | Given for :field I enter :value
- default | Given I enter :value for :field
- default | Given I wait for AJAX to finish
- default | When /^(?:|I )press "(?P<button>(?:[^"]|\\")*)"$/
- default | When I press the :button button
- default | Given I press the :char key in the :field field
- default | Then I should see the link :link
- default | Then I should not see the link :link
- default | Then I should not visibly see the link :link
- default | Then I (should )see the heading :heading
- default | Then I (should )not see the heading :heading
- default | Then I (should ) see the button :button
- default | Then I (should ) see the :button button
- default | Then I should not see the button :button
- default | Then I should not see the :button button
- default | When I follow/click :link in the :region( region)
- default | Given I press :button in the :region( region)
- default | Given I fill in :value for :field in the :region( region)
- default | Given I fill in :field with :value in the :region( region)
- default | Then I should see the heading :heading in the :region( region)
- default | Then I should see the :heading heading in the :region( region)
- default | Then I should see the link :link in the :region( region)
- default | Then I should not see the link :link in the :region( region)
- default | Then I should see( the text) :text in the :region( region)
- default | Then I should not see( the text) :text in the :region( region)
- default | Then I (should )see the text :text
- default | Then I should not see the text :text
- default | Then I should get a :code HTTP response
- default | Then I should not get a :code HTTP response
- default | Given I check the box :checkbox
- default | Given I uncheck the box :checkbox
- default | When I select the radio button :label with the id :id
- default | When I select the radio button :label
- default | Given /^(?:|I )am on (?:|the )homepage$/
- default | When /^(?:|I )go to (?:|the )homepage$/
- default | Given /^(?:|I )am on "(?P<page>[^"]+)"$/
- default | When /^(?:|I )go to "(?P<page>[^"]+)"$/
- default | When /^(?:|I )reload the page$/
- default | When /^(?:|I )move backward one page$/
- default | When /^(?:|I )move forward one page$/
- default | When /^(?:|I )follow "(?P<link>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with "(?P<value>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )fill in "(?P<field>(?:[^"]|\\")*)" with:$/
- default | When /^(?:|I )fill in "(?P<value>(?:[^"]|\\")*)" for "(?P<field>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )fill in the following:$/
- default | When /^(?:|I )select "(?P<option>(?:[^"]|\\")*)" from "(?P<select>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )additionally select "(?P<option>(?:[^"]|\\")*)" from "(?P<select>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )check "(?P<option>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )uncheck "(?P<option>(?:[^"]|\\")*)"$/
- default | When /^(?:|I )attach the file "(?P<path>[^"]*)" to "(?P<field>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should be on "(?P<page>[^"]+)"$/
- default | Then /^(?:|I )should be on (?:|the )homepage$/
- default | Then /^the (?i)url(?-i) should match (?P<pattern>"(?:[^"]|\\")*")$/
- default | Then /^the response status code should be (?P<code>\d+)$/
- default | Then /^the response status code should not be (?P<code>\d+)$/
- default | Then /^(?:|I )should see "(?P<text>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should not see "(?P<text>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should see text matching (?P<pattern>"(?:[^"]|\\")*")$/
- default | Then /^(?:|I )should not see text matching (?P<pattern>"(?:[^"]|\\")*")$/
- default | Then /^the response should contain "(?P<text>(?:[^"]|\\")*)"$/
- default | Then /^the response should not contain "(?P<text>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should see "(?P<text>(?:[^"]|\\")*)" in the "(?P<element>[^"]*)" element$/
- default | Then /^(?:|I )should not see "(?P<text>(?:[^"]|\\")*)" in the "(?P<element>[^"]*)" element$/
- default | Then /^the "(?P<element>[^"]*)" element should contain "(?P<value>(?:[^"]|\\")*)"$/
- default | Then /^the "(?P<element>[^"]*)" element should not contain "(?P<value>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should see an? "(?P<element>[^"]*)" element$/
- default | Then /^(?:|I )should not see an? "(?P<element>[^"]*)" element$/
- default | Then /^the "(?P<field>(?:[^"]|\\")*)" field should contain "(?P<value>(?:[^"]|\\")*)"$/
- default | Then /^the "(?P<field>(?:[^"]|\\")*)" field should not contain "(?P<value>(?:[^"]|\\")*)"$/
- default | Then /^(?:|I )should see (?P<num>\d+) "(?P<element>[^"]*)" elements?$/
- default | Then /^the "(?P<checkbox>(?:[^"]|\\")*)" checkbox should be checked$/
- default | Then /^the checkbox "(?P<checkbox>(?:[^"]|\\")*)" (?:is|should be) checked$/
- default | Then /^the "(?P<checkbox>(?:[^"]|\\")*)" checkbox should not be checked$/
- default | Then /^the checkbox "(?P<checkbox>(?:[^"]|\\")*)" should (?:be unchecked|not be checked)$/
- default | Then /^the checkbox "(?P<checkbox>(?:[^"]|\\")*)" is (?:unchecked|not checked)$/
- default | Then /^print current URL$/
- default | Then /^print last response$/
- default | Then /^show last response$/
- default | Then I should see the error message( containing) :message
- default | Then I should see the following error message(s):
- default | Given I should not see the error message( containing) :message
- default | Then I should not see the following error messages:
- default | Then I should see the success message( containing) :message
- default | Then I should see the following success messages:
- default | Given I should not see the success message( containing) :message
- default | Then I should not see the following success messages:
- default | Then I should see the warning message( containing) :message
- default | Then I should see the following warning messages:
- default | Given I should not see the warning message( containing) :message
- default | Then I should not see the following warning messages:
- default | Then I should see the message( containing) :message
- default | Then I should not see the message( containing) :message
- default | Given I run drush :command
- default | Given I run drush :command :arguments
- default | Then drush output should contain :output
- default | Then drush output should match :regex
- default | Then drush output should not contain :output
- default | Then print last drush output
- default | Then take desktop screenshot prefixed :prefix
- default | Then take tablet screenshot prefixed :prefix
- default | Then take mobile screenshot prefixed :prefix
- default | Then take multi screenshot
- default | When I wait for :arg1 seconds
- default | When I click element :element
- default | When I click the fake :text button
- default | When switch to iframe :iframe
- default | When switch back from iframe
- default | Given /^I fill hidden element having id "([^"]*)" with "([^"]*)"$/
- default | Given /^I should see element "([^"]*)" having class "([^"]*)"$/
```
