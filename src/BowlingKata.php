<?php
namespace Cdt\BowlingKata;

class BowlingKata
{
    /** @var string[]  */
    private $frameScores = [];

    /**
     * @param \string[] $frameScores
     */
    public function setFrameScores($frameScores)
    {
        $this->frameScores = $frameScores;
    }

    /**
     * @return \string[]
     */
    public function getFrameScores()
    {
        return $this->frameScores;
    }

    public function getTotalScore()
    {

        $total = 0;
        for($i=0; $i < count($this->frameScores); $i++)
        {
            if($this->frameScores[$i][0] === 'X') {
                $frameTotal = $this->get_strike_total($i);
            } else {
                $frameTotal = array_sum($this->frameScores[$i]);
            }

            $total += $frameTotal;
        }

        return $total;
    }

    public function get_strike_total($frameNumber)
    {
        $frameTotal = 10;

        if(($frameNumber+1) == count($this->frameScores) ) {
            $frameTotal += $this->frameScores[$frameNumber][1] + $this->frameScores[$frameNumber][2];
        } elseif($this->frameScores[$frameNumber+1][0] === 'X') {

            $frameTotal += 10;

            if (!isset($this->frameScores[$frameNumber+1][2])) {
                if($this->frameScores[$frameNumber+2][0] === 'X') {
                    $frameTotal += 10;
                } else {
                    $frameTotal += array_sum($this->frameScores[$frameNumber+2]);
                }
            }

        } else {
            $frameTotal += array_sum($this->frameScores[$frameNumber+1]);
        }

        return $frameTotal;

    }

}
 