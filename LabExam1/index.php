<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bill Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card shadow p-4">
            <h2 class="text-center text-success mb-4">Eco-Friendly Electric Bill Calculator</h2>
                
            <form method="GET" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label class="form-label">Consumer Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Previous Reading (kWh)</label>
                    <input type="number" class="form-control" name="prev" id="prev" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Reading (kWh)</label>
                    <input type="number" class="form-control" name="curr" id="curr" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer Type</label>
                    <select class="form-select" name="type">
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Calculate Bill</button>
            </form>
                <?php
                    if(isset($_GET['name']))
                    {
                        $name = $_GET['name'];
                        $prev = $_GET['prev'];
                        $curr = $_GET['curr'];
                        $type = $_GET['type'];

                        if($curr < $prev)
                        {
                            echo "<p class='error mt-3'>Invalid Reading: Current reading cannot be lower than previous.</p>";
                        }
                        else
                        {
                            $usage = $curr - $prev;
                            if($usage <= 200)
                                $rate = 10;
                            else
                                $rate = 15;

                            $total = $usage * $rate;

                            if($type == "Commercial")
                                $total += 500;

                            echo "<div class='result-box'>";
                            echo "<h4 class='text-success'>Bill Summary</h4>";
                            echo "<strong>Consumer Name:</strong> $name <br>";
                            echo "<strong>Customer Type:</strong> $type <br>";
                            echo "<strong>Usage:</strong> $usage kWh <br>";
                            echo "<strong>Rate per kWh:</strong> ₱$rate <br>";
                            echo "<strong>Total Bill:</strong> ₱$total";
                            echo "</div>";
                        }
                    }
                    
                ?>
        </div>
    </div>
</body>

<script src= "script.js"></script>

</html>
