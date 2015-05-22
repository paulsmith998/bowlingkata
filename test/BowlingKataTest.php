<?php
namespace Cdt\BowlingKata;

class BowlingKataTest extends \PHPUnit_Framework_TestCase {

    /** @var BowlingKata */
    public $bowlingKata;

    public function setUp()
    {
        $this->bowlingKata = new BowlingKata();
    }

    public function testGetTotalScoreIsTen()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            10
        );
    }

    public function testGetTotalScoreIsWithOneStrikeInMiddleOfGame()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],['X'],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            20
        );
    }

    public function testGetTotalScoreIsWithMultipleStrikesInMiddleOfGame()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],['X'],['X'],[0,1],[0,1],[0,1],[0,1],[0,1],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            40
        );
    }

    public function testGetTotalScoreIsWithMultipleStrikesInMiddleNotTogetherOfGame()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],['X'],[0,1],['X'],[0,1],[0,1],[0,1],[0,1],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            30
        );
    }

    public function testGetTotalScoreIsWithStrikeAtTheEndOfTheGame()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],['X',0,0],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            19
        );
    }

    public function testGetTotalScoreIsWithTwoStrikeAtTheEndOfTheGame()
    {
        $this->bowlingKata->setFrameScores(
            [
                [0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],[0,1],['X'],['X',0,0],
            ]
        );
        $totalScore = $this->bowlingKata->getTotalScore();

        $this->assertEquals(
            $totalScore,
            38
        );
    }

}
 