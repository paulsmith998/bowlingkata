<?php
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Cdt\BowlingKata\BowlingGame;
use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var BowlingGame */
    private $bowlingGame;

    private $score;

    /**
     * @Given I have started a new game of bowling
     */
    public function iHaveStartedANewGameOfBowling()
    {
        $this->bowlingGame = new BowlingGame();
    }

    /**
     * @When I roll a sequence of balls :rolls
     */
    public function iRollASequenceOfBalls($rolls)
    {
        $this->score = $this->bowlingGame->score($rolls);
    }

    /**
     * @Then my score should be :score
     */
    public function myScoreShouldBe($score)
    {
        Assert::assertEquals($score, $this->score);
    }
}
