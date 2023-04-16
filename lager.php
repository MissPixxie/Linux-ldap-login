
<!DOCTYPE html>
<html>
<head>
<style>

h1 {
  text-align: center;
  font-size: 48px;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 15px;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

</style>
</head>
<body>
<h1> Lager </h1>

<?php
$servername = "localhost";
$username = "test1";
$password = "1234";
$dbname = "fejkfirma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `Lager`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Varunr</th><th>Namn</th><th>Antal</th><th>Pris</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Varunr"]. "</td>" . "<td>" . $row["Namn"]. "</td>" . "<td>" . $row["Antal"]. "</td>" . "<td>" . $row["Pris"]. "</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>

<form action="lager.php" method="post">
Varunr: <input type="text" name="varunr">
Namn: <input type="text" name="namn">
Antal: <input type="text" name="antal">
Pris: <input type="text" name="pris">
<br>
<br>
<input type="submit" name="sub" value="Lägg till vara">
</form>


<?php
$servername = "localhost";
$username = "test1";
$password = "1234";
$dbname = "fejkfirma";


if (isset($_POST["sub"])) {

$users_id = $_POST['varunr'];
$users_namn = $_POST['namn'];
$users_antal = $_POST['antal'];
$users_pris = $_POST['pris'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `Lager` (Varunr, Namn, Antal, Pris) VALUES ('$users_id', '$users_namn', '$users_antal', '$users_pris')";

if (mysqli_query($conn, $sql)) {
  echo "<meta http-equiv='refresh' content='0'>";
 }
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
</body>
</html>