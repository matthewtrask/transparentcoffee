<?php

use Dotenv\Dotenv;

$I = new AcceptanceTester($scenario);
$I->wantTo('login in as user');
$I->amOnPage('/login');
$I->fillField('username', 'mattt');
$I->fillField('password', '1qaz@WSX');
$I->click('login');
$I->amOnPage('/admin');
