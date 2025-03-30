<?php
require_once 'CollatzHistogram.php'; // This already includes CollatzAnalyzer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = (int) $_POST['start'];
    $end = (int) $_POST['end'];

    if ($start < CollatzAnalyzer::MIN_LIMIT || $end > CollatzAnalyzer::MAX_LIMIT || $start > $end) {
        die("Invalid input range.");
    }

    $result = CollatzHistogram::generate($start, $end);

    echo "<h2>Histogram from $start to $end</h2>";
    echo "<table border='1'><tr><th>Steps</th><th>Frequency</th></tr>";
    foreach ($result as $step => $count) {
        echo "<tr><td>$step</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>