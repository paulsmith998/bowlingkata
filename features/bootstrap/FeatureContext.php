<?php
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @Given I have started a new game of bowling
     */
    public function iHaveStartedANewGameOfBowling()
    {
        throw new PendingException();
    }

    /**
     * @When I roll a sequence of balls :arg1
     */
    public function iRollASequenceOfBalls($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then my score should be :arg1
     */
    public function myScoreShouldBe($arg1)
    {
        throw new PendingException();
    }
}
