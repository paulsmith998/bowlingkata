<?php
namespace spec\Cdt\BowlingKata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Cdt\BowlingKata\BowlingGame');
    }

    function it_scores_all_misses()
    {
        $this->score("--------------------")->shouldReturn(0);
    }

    function it_scores_simple_rolls_without_spares_or_strikes()
    {
        $this->score("9-9-9-9-9-9-9-9-9-9-")->shouldReturn(90);
        $this->score("4-4-4-4-4-4-4-4-4-5-")->shouldReturn(41);
    }

    function it_should_score_a_game_with_a_single_spare_not_in_the_last_frame()
    {
        $this->score("9-9-9-9-9-5/9-9-9-9-")->shouldReturn(100);
    }

    function it_should_score_a_game_with_a_single_strike_not_in_the_last_frame()
    {
        $this->score("9-9-9-9-9-X9-9-9-9-")->shouldReturn(100);
    }

    function it_should_score_a_game_with_a_multiple_strikes_not_in_the_last_frame()
    {
        $this->score("XXX--------------")->shouldReturn(60);
    }

    function it_should_score_a_game_with_a_spare_in_the_last_frame()
    {
        $this->score("5/5/5/5/5/5/5/5/5/5/5")->shouldReturn(150);
    }

    function it_should_score_a_game_with_a_strike_in_the_last_frame()
    {
        $this->score("5/5/5/5/5/5/5/5/5/X42")->shouldReturn(156);
    }

    function it_should_score_a_game_with_a_strike_in_the_last_frame_and_spare_for_second_bonus_roll()
    {
        $this->score("5/5/5/5/5/5/5/5/5/X4/")->shouldReturn(160);
    }

    function it_should_score_a_game_with_a_strike_in_the_last_frame_and_first_bonus_roll()
    {
        $this->score("5/5/5/5/5/5/5/5/5/XX4")->shouldReturn(164);
    }

    function it_should_score_a_game_with_a_strike_in_the_last_frame_and_both_bonus_rolls()
    {
        $this->score("5/5/5/5/5/5/5/5/5/XXX")->shouldReturn(170);
    }
}
