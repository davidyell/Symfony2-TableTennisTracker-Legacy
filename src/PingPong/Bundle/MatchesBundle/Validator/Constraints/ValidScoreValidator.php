<?php
/**
 * ValidScore Validator
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\MatchesBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates that two table tennis scores are valid
 */
class ValidScoreValidator extends ConstraintValidator
{
    /**
     * An array of the scores for this match
     *
     * @var array
     */
    private $matchScores;

    /**
     * Validate the field
     *
     * @param type       $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        // Set the values
        foreach ($value as $item) {
            $this->matchScores[] = $item->getScore();
        }

        // Do the check
        if ($this->scores() === false) {
            $this->context->addViolationAt('', $constraint->message);
        }
    }


    /**
     * Validates a pingpong score using score values saved in the model
     *
     * @return boolean
     */
    private function scores()
    {
        if (empty($this->matchScores)) {
            return false;
        }

        // Scores cannot match
        if ($this->matchScores[0] == $this->matchScores[1]) {
            return false;
        }

        // Must score 11 or more
        if ($this->matchScores[0] < 11 && $this->matchScores[1] < 11) {
            return false;
        }

        // If more than 11, ensure 2 point difference
        if ($this->matchScores[0] > 11 || $this->matchScores[1] > 11) {
            // Player 1 wins
            if ($this->matchScores[0] > $this->matchScores[1]) {
                // Player 2 score must be two less than Player 1s
                if ($this->matchScores[0] - 2 != $this->matchScores[1]) {
                    return false;
                }
            // Player 2 wins
            } elseif ($this->matchScores[1] > $this->matchScores[0]) {
                // Player 1 score must be two less than Player 2s
                if ($this->matchScores[1] - 2 != $this->matchScores[0]) {
                    return false;
                }
            }
        }

        return true;
    }

}