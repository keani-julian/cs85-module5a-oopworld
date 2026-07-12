<?php
// 5 properties. Weight is in lbs. 
class Workout {
    public $exercise;
    public $sets;
    public $reps;
    public $weight;
    public $date;
 
    // Constructor (reminder: initializes an object with real data)
    public function __construct($exercise, $sets, $reps, $weight, $date) {
        $this->exercise = $exercise;
        $this->sets = $sets;
        $this->reps = $reps;
        $this->weight = $weight;
        $this->date = $date;
    }

    // 4 methods total 
    // Method 1: summary display
    // Prediction: "Workout: Bench Press on 2026-07-10 — 4 sets x 8 reps @ 135 lbs"
    public function summary() {
        return "Workout: {$this->exercise} on {$this->date} — {$this->sets} sets x {$this->reps} reps @ {$this->weight} lbs";
    }
 
    // Method 2: returning a calculated value
    // Prediction: 4320 (calculated as sets * reps * weight = 4*8*135)
    public function totalVolume() {
        // volume = sets x reps x weight
        return $this->sets * $this->reps * $this->weight;
    }

    // Method 3: to change a property value 
    // Prediction: "Updated weight to 190 lbs" and changes weight property from 135 to 190
    public function updateWeight($newWeight) {
        $this->weight = $newWeight;
        return "Updated weight to {$this->weight} lbs";
    }

    // Method 4: decision logic
    // Prediction: For 135 = "Moderate intensity" since < 185 and > 95. For 190 = "High intensity" since > 185
    public function getIntensity() {
        if ($this->weight >= 185) {
            return "High intensity";
        } elseif ($this->weight >= 95) {
            return "Moderate intensity";
        } else {
            return "Light intensity";
        }
    }
}

// Added two new objects below (aka instances) built from Workout class using my data
$bench = new Workout("Bench Press", 4, 8, 135, "2026-07-10");
$squat = new Workout("Squat", 5, 5, 225, "2026-07-11");

// Calling methods to output results with my data
echo $bench->summary() . "\n";
echo "Total volume: " . $bench->totalVolume() . " lbs\n";
echo "Intensity: " . $bench->getIntensity() . "\n";
echo $bench->updateWeight(190) . "\n";
echo "New intensity: " . $bench->getIntensity() . "\n";
echo "\n";
echo $squat->summary() . "\n";
echo "Total volume: " . $squat->totalVolume() . " lbs\n";
echo "Intensity: " . $squat->getIntensity() . "\n";

?>