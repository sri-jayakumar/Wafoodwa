<?php
$con=mysqli_connect("cs4750.cs.virginia.edu","asv6ef","jieY0oof","asv6ef");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT restaurants_name,restaurants_location_address,restaurants_url   FROM restaurant");

echo "<table border='1'>
<tr>
<th>Restaurant Name</th>
<th>Restaurant URL</th>
<th>Restaurant Address</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['restaurants_name'] . "</td>";
echo "<td>" . $row['restaurants_location_address'] . "</td>";
echo "<td>" . $row['restaurants_url'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

<!-- https://www.sitepoint.com/community/t/how-to-display-data-from-a-database-into-a-html-table/241123/5 -->
<!-- https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage -->