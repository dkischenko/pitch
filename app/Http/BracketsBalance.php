<?php


namespace App\Http;

/**
 * Class BracketsBalance
 * @package App\Http
 */
class BracketsBalance
{
    const LEFT_ARROW_TYPE_1 = "(";
    const LEFT_ARROW_TYPE_2 = "{";
    const LEFT_ARROW_TYPE_3 = "[";

    const RIGTH_ARROW_TYPE_1 = ")";
    const RIGTH_ARROW_TYPE_2 = "}";
    const RIGTH_ARROW_TYPE_3 = "]";

    /** @var \SplStack */
    private $stack;

    /**
     * BracketsBalance constructor.
     */
    public function __construct()
    {
        $this->stack = new \SplStack();
    }

    /**
     * Determinate brackets balance
     * @param string $brackets
     * @return bool
     */
    public function bracketsBalance(string $brackets): bool
    {
        if (!$strlen = strlen($brackets)) {
            return false;
        }

        for ($i=0; $i < $strlen; $i++) {
            $current = $brackets{$i};
            if (!$this->isLeftArrow($current) && !$this->isRightArrow($current)) {
                return false;
            }

            if ($this->isLeftArrow($current)) {
                $this->stack->push($current);
            }

            if ($this->isRightArrow($current)) {
                if (!$this->stack->count()) {
                    return false;
                }
                $lastAdded = $this->stack->top();
                if ($lastAdded == self::LEFT_ARROW_TYPE_1 && $current == self::RIGTH_ARROW_TYPE_1 ||
                    $lastAdded == self::LEFT_ARROW_TYPE_2 && $current == self::RIGTH_ARROW_TYPE_2 ||
                    $lastAdded == self::LEFT_ARROW_TYPE_3 && $current == self::RIGTH_ARROW_TYPE_3) {
                    $this->stack->pop();
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param string $arrow
     * @return bool
     */
    private function isRightArrow(string $arrow): bool
    {
        if ($arrow === self::RIGTH_ARROW_TYPE_1 || $arrow === self::RIGTH_ARROW_TYPE_2
            || $arrow === self::RIGTH_ARROW_TYPE_3) {
            return true;
        }

        return false;
    }

    /**
     * @param string $arrow
     * @return bool
     */
    private function isLeftArrow(string $arrow): bool
    {
        if ($arrow === self::LEFT_ARROW_TYPE_1 || $arrow === self::LEFT_ARROW_TYPE_2
            || $arrow === self::LEFT_ARROW_TYPE_3) {
            return true;
        }

        return false;
    }
}
