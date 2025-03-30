<?php
require_once 'CollatzAnalyzer.php';

class CollatzHistogram extends CollatzAnalyzer {
    public static function generate(int $from, int $to): array {
        $distribution = [];
        for ($i = $from; $i <= $to; $i++) {
            $collatz = new CollatzAnalyzer($i);
            $data = $collatz->compute();
            $steps = $data['steps'];
            $distribution[$steps] = ($distribution[$steps] ?? 0) + 1;
        }
        ksort($distribution);
        return $distribution;
    }
}
?>