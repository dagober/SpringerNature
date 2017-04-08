<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Filter a search by Date Published');
$I->setLanguage('English');
$I->searchSpringer('evolution');
$I->click('Date Published');
$I->fillField('input.start-year.max-length-4', '1832');
$I->fillField('input.end-year.max-length-4', '1834');
$I->click('#date-facet-submit');
$I->wait(1);
$I->dontSee('1835');
