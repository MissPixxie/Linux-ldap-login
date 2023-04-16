
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
<h1> Kunder </h1>

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

$sql = "SELECT * FROM `Kunder`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Kundnr</th><th>Namn</th><th>Email</th><th>Telefon</th><th>Address</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Kundnr"]. "</td>" . "<td>" . $row["Förnamn"]. " " . $row["Efternamn"]. "</td>" . "<td>" . $row["Email"]. "</td>" . "<td>" . $row["Telefon"]. "</td>" . "<td>" . $row["Address"]. "</td></t$
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>

<form action="kunder.php" method="post">
Förnamn: <input type="text" name="förnamn">
Efternamn: <input type="text" name="efternamn">
E-mail: <input type="text" name="email">
Telefon: <input type="text" name="telefon">
Address: <input type="text" name="address">
<br>
<br>
<input type="submit" name="sub" value="Skicka">
</form>


<?php
$servername = "localhost";
$username = "test1";
$password = "1234";
$dbname = "fejkfirma";


if (isset($_POST["sub"])) {

$users_fnamn = $_POST['förnamn'];
$users_enamn = $_POST['efternamn'];
$users_mail = $_POST['email'];
$users_telefon = $_POST['telefon'];
$users_address = $_POST['address'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `Kunder` (Förnamn, Efternamn, Email, Telefon, Address) VALUES ('$users_fnamn', '$users_enamn', '$users_mail', '$users_telefon', '$users_address')";

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

