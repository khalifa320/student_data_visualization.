<?php
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($URL);
$result = json_decode($response, true);

// Check if data is retrieved successfully
if ($result) {
    // Process and display data
} else {
    echo "Error retrieving data.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://picocss.com/css/pico.min.css">
    <title>Student Nationality Data</title>
</head>
<body>
    <h1>University of Bahrain Student Nationality Data</h1>
    <table>
        <thead>
            <tr>
                <th>Nationality</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result['records'])) {
                foreach ($result['records'] as $record) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($record['nationality']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['count']) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
