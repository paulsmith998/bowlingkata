<?php
namespace Cdt\BowlingKata;

class BowlingGame
{
    public function score($rollString)
    {
        $score = 0;
        $frame = 1;
        $firstBallInFrame = true;
        $prevPinsKnockedDown = 0;

        $rolls = str_split($rollString);

        foreach ($rolls as $rollNo => $roll) {
            $pinsKnockedDown = $this->getPinsKnockedDownForRoll($roll, $prevPinsKnockedDown);

            if ($frame > 10) {
                return $score;
            }

            $score += $pinsKnockedDown;

            if ($this->isSpare($roll)) {
                $score += $this->getPinsKnockedDownForRoll($rolls[$rollNo + 1]);
            }

            if ($this->isStrike($roll)) {
                $score +=
                    $this->getPinsKnockedDownForRoll($rolls[$rollNo + 1])
                    + $this->getPinsKnockedDownForRoll(
                        $rolls[$rollNo + 2],
                        $this->getPinsKnockedDownForRoll($rolls[$rollNo + 1])
                    );

                    $frame++;
            } else {
                if (!$firstBallInFrame) {
                    $frame++;
                }

                $firstBallInFrame = !$firstBallInFrame;
            }

            $prevPinsKnockedDown = $pinsKnockedDown;
        }

        return $score;
    }

    private function getPinsKnockedDownForRoll($roll, $previousRollPins = 0)
    {
        if ($this->isMiss($roll)) {
            return 0;
        }

        if ($this->isSpare($roll)) {
            return 10 - $previousRollPins;
        }

        if ($this->isStrike($roll)) {
            return 10;
        }

        return $roll;
    }

    private function isMiss($roll)
    {
        return $roll == "-";
    }

    private function isSpare($roll)
    {
        return $roll == "/";
    }

    private function isStrike($roll)
    {
        return $roll == "X";
    }
}
