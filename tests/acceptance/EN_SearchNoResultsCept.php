<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Run a search without results on link.springer.com');
$I->setLanguage('English');
$I->see('Providing researchers');
$I->searchSpringer('supercalifragilisticoespialidoxus');
$I->see('Sorry – we couldn’t find what you are looking for');
