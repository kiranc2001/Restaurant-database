<!DOCTYPE html>
<html>
<head>
<title>item details</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: black;
font-family: monospace;
font-size: 15px;
text-align: left;
}
th {
background-color: purple;
color: white;
}
.h2{
  font:100 5rem/1 Roboto;
  text-transform: uppercase;
}
tr:nth-child(even) {background-color: #f2f2f2
}
.update{
  background-color: green;
  color: white;
  border: 0;
  outline: none;
  border-radius: 5px;
  height: 22px;
  width: 80px;
  cursor: pointer;

}
.delete{
  background-color: red;
  color: white;
  border: 0;
  outline: none;
  border-radius: 5px;
  height: 22px;
  width: 80px;
  cursor: pointer;

}
</style>
</head>
<body>
<h2>ITEM List</h2>

<table>
<tr>
<th>ITEM_ID</th>
<th>ITEM_NAME</th>
<th>COST</th>
<th> Operations </th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["item_id"]. "</td>
<td>" . $row["item_name"] . "</td>
<td>" . $row["cost"] . "</td>
<td> <a href='updatemenu.php?item_id=$row[item_id]'><input type='submit' value='Update' class='update'></a> 
<a href='deletemenu.php?item_id=$row[item_id]'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a> </td>
";


}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
<script>
  function checkdelete()
  {
    return confirm('Are you sure you want delete this data ?');
  }
  </script>
</html>