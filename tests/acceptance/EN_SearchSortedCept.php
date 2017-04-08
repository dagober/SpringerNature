<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Sort results by Oldest first and move to different page results');
$I->setLanguage('English');
$I->searchSpringer('evolution');
$I->selectOption('#sort-results', 'Oldest First');
$I->see('The Dublin Journal of Medical and Chemical Science');
$I->see('1832');
$I->click('a.next');
$I->see('1839');
$I->click('a.prev');
$I->see('1832');
