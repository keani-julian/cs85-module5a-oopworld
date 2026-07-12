# Module 5a: AI generated method and critique

## Exact prompt I used: 
"Write a PHP method for my Workout class that estimates my one-rep max from the existing $weight and $reps properties. Use a well-known lifting formula."

## Raw AI generated code
<?php 
public function estimateOneRepMax() {
    return $this->weight * (1 + $this->reps / 30);
}
?>

## My critique on security, efficiency, correctness, style, and changes you made

### Security
The method only touches the object's own numbers and doesn't take any user input, so there's nothing for SQL injection or XSS to grab onto. The only real concern is bad data (e.g. a negative or non-numeric weight) producing a result potentially rooted in improper validation.

### Efficiency 
Very efficient. It's a single arithmetic expression with no loops or queries. No performance issues.

### Correctness
The method uses the Epley formula (weight × (1 + reps/30)), which is an actual 1 rep max estimate formula. However, it's only an estimate and gets less accurate at high rep counts. At reps = 1 it returns weight × 1.033 (slightly overestimating) which should just equal the weight. It also doesn't guard against nonsense inputs like negative weight or negative reps.

### Style
The raw code has no return type or parameter types, no rounding (it could return a long decimal like 200.0000001), and the "30" has no explanation. A short comment naming the formula would make it clearer.

### Changes I made
I decided to round the result to one decimal place for readability, added a brief comment naming the Epley formula, and added a simple guard so it returns 0 when reps or weight are not positive (avoiding misleading estimates from bad data).

Below estimates 1-rep max using the Epley formula: weight x (1 + reps/30): 

public function estimateOneRepMax() {
    if ($this->weight <= 0 || $this->reps <= 0) {
        return 0;
    }
    return round($this->weight * (1 + $this->reps / 30), 1);
}