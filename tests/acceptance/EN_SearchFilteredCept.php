<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Filter a search by Article');
$I->setLanguage('English');
$I->searchSpringer('evolution');
$I->click('Article');
$I->dontSee('Chapter');
$I->click('span.remove');
$I->see('Chapter');

