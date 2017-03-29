<!DOCTYPE html>
<html>
<body>
<?php
# include my db credentials file
require_once 'login.php';

# Make the connection to mysql using the credentials above
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

# Construct the query for the results we'd like
$query = "SELECT * FROM `employees` WHERE jobTitle=\"Sales Rep\"";

# Run our query, making sure we received results back
$result = $conn->query($query);
if (!$result) die($conn->error);

# Determine the number of rows returned so we can loop through them
$rows = $result->num_rows;

# Get and print out each row returned from the database
echo '<table>';
echo '<tr><th>Staff Name</th></tr>';
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo '<td>'.$row["firstName"]." ".$row["lastName"]."</td>\n";
	echo '</tr>';
}
echo '</table>';

# close the database connection
$result->close();
$conn->close();
?>
</body>
</html>
