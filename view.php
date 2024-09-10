<?php

require_once 'FileUtility.php';

// Define the CSV file name
$filename = 'persons.csv';

// Function to parse CSV data into an associative array
function parseCsv($csvData) {
    $lines = explode("\n", trim($csvData));
    $header = str_getcsv(array_shift($lines)); // Get the header row
    $data = [];

    foreach ($lines as $line) {
        if (trim($line) !== '') {
            $data[] = str_getcsv($line);
        }
    }

    return $data;
}

try {
    // Read CSV data from file
    $csvData = FileUtility::openFile($filename);
    // Parse the CSV data into an array
    $data = parseCsv($csvData);
    $header = $data[0];
    $records = array_slice($data, 1); // Exclude the header for records
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persons Data</title>
    <style>
        .record {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .record div {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Persons Data</h1>

    <?php foreach ($records as $row): ?>
        <div class="record">
            <div><strong>UUID:</strong> <?php echo htmlspecialchars($row[0]); ?></div>
            <div><strong>Title:</strong> <?php echo htmlspecialchars($row[1]); ?></div>
            <div><strong>First Name:</strong> <?php echo htmlspecialchars($row[2]); ?></div>
            <div><strong>Last Name:</strong> <?php echo htmlspecialchars($row[3]); ?></div>
            <div><strong>Street Address:</strong> <?php echo htmlspecialchars($row[4]); ?></div>
            <div><strong>Barangay:</strong> <?php echo htmlspecialchars($row[5]); ?></div>
            <div><strong>Municipality:</strong> <?php echo htmlspecialchars($row[6]); ?></div>
            <div><strong>Province:</strong> <?php echo htmlspecialchars($row[7]); ?></div>
            <div><strong>Country:</strong> <?php echo htmlspecialchars($row[8]); ?></div>
            <div><strong>Phone Number:</strong> <?php echo htmlspecialchars($row[9]); ?></div>
            <div><strong>Mobile Number:</strong> <?php echo htmlspecialchars($row[10]); ?></div>
            <div><strong>Company Name:</strong> <?php echo htmlspecialchars($row[11]); ?></div>
            <div><strong>Company Website:</strong> <?php echo htmlspecialchars($row[12]); ?></div>
            <div><strong>Job Title:</strong> <?php echo htmlspecialchars($row[13]); ?></div>
            <div><strong>Favorite Color:</strong> <?php echo htmlspecialchars($row[14]); ?></div>
            <div><strong>Birthdate:</strong> <?php echo htmlspecialchars($row[15]); ?></div>
            <div><strong>Email Address:</strong> <?php echo htmlspecialchars($row[16]); ?></div>
            <div><strong>Password:</strong> <?php echo htmlspecialchars($row[17]); ?></div>
        </div>
    <?php endforeach; ?>
    
</body>
</html>
