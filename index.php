<html>
<head>
<title>PHP Sandbox</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "designterms";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['addTerm']))
{
    $sql = "INSERT INTO maincategories (term, slug)
    VALUES ('".$_POST["term"]."','".$_POST["slug"]."')";
    $result = mysqli_query($conn,$sql);
}
$showterms = "SELECT ID, term, slug FROM maincategories";
    $result = $conn->query($showterms);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["ID"]. " Slug: " . $row["slug"]. " Term:" . $row["term"]. "<br>";
        }
    } else {
        echo "0 results";
    }
$conn->close();
?>

<form method="post">
<label>Slug</label><br />
<input id="termslug" name="slug" type="text" /><br /><br />
<label>Term</label><br />
<input id="term" name="term" type="text" /><br/><br />
<button id="SubmitInfo" name="addTerm" type="submit" />Add Term</button>
</form>

</body>
</html>