<?php


/**
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    const TIMEOUT = 20;

    /**
     * Waits up to $timeout seconds for the given string to appear on the page.
     * If the given text doesn't appear, a timeout exception is thrown.
     *
     * @param string $text
     * @param int    $timeout  seconds
     * @param null   $selector
     */
    public function waitForText($text, $timeout = self::TIMEOUT, $selector = null)
    {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('waitForText', func_get_args()));
    }

    /**
     * Selects an option in a select tag or in radio button group.
     *
     * @param $select
     * @param $option
     */
    public function selectOption($select, $option)
    {
        $args = func_get_args();
        $this->waitForText($option);

        return $this->getScenario()->runStep(new \Codeception\Step\Action('selectOption', $args));
    }

    /**
     * Fills search field with a keyword, clicks on Search button and checks
     * that we are in the results page
     *
     * example: $I->searchSpringer('evolution');
     *
     * @param $keyword
     */
    public function searchSpringer($keyword)
    {
        $this->fillField('query', $keyword);
        $this->click('#search');
        $this->see('Result(s) for \''.$keyword.'\'');
    }


    /**
     * Sets the language of the page as English/German
     * TODO Include German translation
     *
     * example: $I->setLanguage('English');
     *
     * @param $keyword
     */
    public function setLanguage($keyword)
    {
        $this->amOnUrl('https://link.springer.com/');
        $this->click('button.flyout-caption.cur');
        $this->click($keyword);
        $this->see('Providing researchers');
    }


}
