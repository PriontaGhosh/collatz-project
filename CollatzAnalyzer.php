<?php
class CollatzAnalyzer {
    protected int $startingValue;
    const MIN_LIMIT = 1;
    const MAX_LIMIT = 10000;

    public function __construct(int $start) {
        $this->startingValue = $start;
    }

    public function compute(): array {
        $num = $this->startingValue;
        $peak = $num;
        $steps = 0;

        while ($num !== 1) {
            $num = ($num % 2 === 0) ? $num / 2 : 3 * $num + 1;
            $peak = max($peak, $num);
            $steps++;
        }

        return ['steps' => $steps, 'peak' => $peak];
    }
}
?>