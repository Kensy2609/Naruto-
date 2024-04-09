
<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=manga', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare
        (
        '   SELECT personnage,age,origine
            FROM perso
            JOIN age
            ON perso.id_age = age.id
            JOIN origine 
            ON perso.id_origine = origine.id
            
        '
        );

        $stmt->execute();

        echo '<center>';
        echo '<style>';
        echo 'table { width: 500px; ; text-align: center; }'; 
        echo 'td { width: 200px; }';     
        echo '</style>';
        echo "<table border='4'> 
            <th>Nom</th>
            <th>age</th>
            <th>origine</th>
        </tr>";

        
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<center>';
    echo '<tr>';
    echo "<td>{$row['personnage']}</td>";
    echo "<td>{$row['age']}</td>";
    echo "<td>{$row['origine']}</td>";
    echo '</tr>';
}
echo "</table>";
} catch (PDOException $e) {
echo 'Erreur de connexion : ' . $e->getMessage();
}
    ?>


<!-- echo "<td><img src='Pokemon/{$row['Nom_pokemon']}.png' alt='{$row['Nom_pokemon']}'style='width: 100px; height: auto;'></td>"; -->