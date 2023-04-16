
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
<h1> Löner </h1>

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

$sql = "SELECT * FROM `Löner`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Namn</th><th>Anställning</th><th>Lön</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Förnamn"]. " " . $row["Efternamn"]. "</td>" . "<td>" . $row["Anställning"]. "</td>" . "<td>" . $row["Lön"]. "</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>

<form action="loner.php" method="post">
Förnamn: <input type="text" name="förnamn">
Efternamn: <input type="text" name="efternamn">
Anställning: <input type="text" name="anstallning">
Lön: <input type="text" name="lon">
<br>
<br>
<input type="submit" name="sub" value="Lägg till anställd">
</form>


<?php
$servername = "localhost";
$username = "test1";
$password = "1234";
$dbname = "fejkfirma";


if (isset($_POST["sub"])) {

$users_fnamn = $_POST['förnamn'];
$users_enamn = $_POST['efternamn'];
$users_anst = $_POST['anstallning'];
$users_lon = $_POST['lon'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `Löner` (Förnamn, Efternamn, Anställning, Lön) VALUES ('$users_fnamn', '$users_enamn', '$users_anst', '$users_lon')";

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

