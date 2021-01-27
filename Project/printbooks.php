<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid #4CAF50;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
 

$con = mysqli_connect('localhost','root','1234','test');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

// mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM books  ";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Book name</th>
<th>Category</th>
<th>Author</th>
<th>Publication year</th>
<th>ID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['bookName'] . "</td>";
  echo "<td>" . $row['catagory'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "<td>" . $row['pub_year'] . "</td>";
  echo "<td>" . $row['bookID'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>