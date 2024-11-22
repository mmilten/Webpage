<?php
require_once('../core/config.php');
require_once('../core/controller.Class.php');

try {
    $con = new PDO("mysql:host=localhost;dbname=webpage", 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$noResultsMessage = ""; // Initialize message variable

if (isset($_POST["submit"]) && !empty($_POST["search"])) {
    $searchTerm = $_POST["search"];

    // Prepare and execute the search query
    $sth = $con->prepare("SELECT `Title`, `Rating`, `Reviews`, `Phone`, `Industry`, `Address`, `Website`, `Google Maps Link` AS `GoogleMapsLink` FROM `halal_store_in_crofton` WHERE `Title` LIKE :searchTerm");
    $sth->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    // Display the results
    // Display the results
    if ($sth->rowCount() > 0) {
        echo "<h2>Search Results for: " . htmlspecialchars($searchTerm) . "</h2>";
        echo "<table border='1'>
            <tr>
                <th>Title</th>
                <th>Rating</th>
                <th>Reviews</th>
                <th>Phone</th>
                <th>Industry</th>
                <th>Address</th>
                <th>Website</th>
                <th>Google Maps Link</th>
            </tr>";
        while ($row = $sth->fetch()) {
            echo "<tr>
                <td>" . htmlspecialchars($row->Title) . "</td>
                <td>" . htmlspecialchars($row->Rating) . "</td>
                <td>" . htmlspecialchars($row->Reviews) . "</td>
                <td>" . htmlspecialchars($row->Phone) . "</td>
                <td>" . htmlspecialchars($row->Industry) . "</td>
                <td>" . htmlspecialchars($row->Address) . "</td>
                <td>" . (empty($row->Website) ? '' : "<a href='" . htmlspecialchars($row->Website) . "'>Visit Website</a>") . "</td>
                <td>" . (empty($row->GoogleMapsLink) ? '' : "<a href='" . htmlspecialchars($row->GoogleMapsLink) . "'>View on Google Maps</a>") . "</td>
              </tr>";
        }
        echo "</table>";
    } else {
        // Set message if no results are found
        $noResultsMessage = "<h2>No results found for: " . htmlspecialchars($searchTerm) . "</h2>";
    }
}
