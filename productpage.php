<?php
try {
  $db = new PDO("mysql:host=;dbname=fietsenmaker","root","");
  $query = $db->prepare("SELECT * FROM fietsenmaker WHERE id = ". $_GET['id']);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as &$data) {
    echo "Artikelnummer: " . $data['id'] . "<br>";
    echo "Merk: " . $data['merk'] . "<br>";
    echo "Type: " . $data['type'] . "<br>";
    echo "Prijs: &euro; " .
    number_format($data["prijs"],2,",",".") . "<br><br>";
  }
} catch(PDOException $e) {
  die("Error!: " . $e->getMessage());
}
?>
<a href="masterpage.php">Terug naar master pagina</a>