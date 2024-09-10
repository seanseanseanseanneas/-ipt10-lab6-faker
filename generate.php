<?php

require_once 'FileUtility.php';
require_once 'Random.php';

$random = new Random();
$filename = 'persons.csv';

// Define str_putcsv function
function str_putcsv($input, $delimiter = ',', $enclosure = '"', $escape = '\\') {
    $fp = fopen('php://temp', 'r+');
    fputcsv($fp, $input, $delimiter, $enclosure, $escape);
    rewind($fp);
    $data = stream_get_contents($fp);
    fclose($fp);
    return trim($data, "\n");
}

// Generate header
$header = [
    'UUID', 'Title', 'First Name', 'Last Name', 'Street Address', 'Barangay', 'Municipality', 'Province', 'Country',
    'Phone Number', 'Mobile Number', 'Company Name', 'Company Website', 'Job Title', 'Favorite Color', 'Birthdate', 'Email Address', 'Password'
];

// Generate data
$data = [];
for ($i = 0; $i < 300; $i++) {
    $data[] = $random->generatePerson();
}

// Convert data to CSV format
$csvData = implode(',', $header) . "\n";
foreach ($data as $record) {
    $csvData .= str_putcsv(array_values($record)) . "\n";
}

// Write to file
FileUtility::writeToFile($filename, $csvData);

echo "Data generated and saved to $filename";
