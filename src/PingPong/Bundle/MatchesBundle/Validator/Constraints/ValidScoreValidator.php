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
 *
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
     * @param array      $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        // Set the values
        foreach ($value as $item) {
            if (is_object($item)) {
                $this->matchScores[] = $item->getScore();
            }
        }

        // Do the check
        if ($this->scores($this->matchScores[0], $this->matchScores[1]) === false) {
            $this->context->addViolationAt('', $constraint->message);
        }
    }


    /**
     * Validates a pingpong score using score values saved in the model
     *
     * @param int $score1
     * @param int $score2
     *
     * @return boolean
     */
    public function scores($score1, $score2)
    {
        if (empty($score1) || empty($score2)) {
            return false;
        }

        // Scores cannot match
        if ($score1 == $this->matchScores[1]) {
            return false;
        }

        // Must score 11 or more
        if ($score1 < 11 && $score2 < 11) {
            return false;
        }

        // If more than 11, ensure 2 point difference
        if ($score1 > 11 || $score2 > 11) {
            // Player 1 wins
            if ($score1 > $score2) {
                // Player 2 score must be two less than Player 1s
                if ($score1 - 2 != $score2) {
                    return false;
                }
            // Player 2 wins
            } elseif ($score2 > $score1) {
                // Player 1 score must be two less than Player 2s
                if ($score2 - 2 != $score1) {
                    return false;
                }
            }
        }

        return true;
    }

}