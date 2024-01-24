<?php
$indian_cricket_players = array("Virat Kohli", "MS Dhoni", "Rohit Sharma", "Yuzvendra Chahal", "Bhuvneshwar Kumar", "Shikhar Dhawan", "KL Rahul", "Hardik Pandya", "Mohammed Shami", "Jasprit Bumrah");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
    body{
      max-width: 750px;
      margin: auto;
      border-style: outset;
    }
        table {
           border-collapse: collapse; width: 100%;
margin-top: 20px;

        }
        th, td {
            border: 1px solid #ddd; padding: 8px;
text-align: center;

        }
        th {
background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <center><h2>List of Indian Cricket Players</h2></center>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php
        foreach($indian_cricket_players as $player) {
            echo "<tr><td>$player</td></tr>";
        }
        ?>
    </table>
</body>
</html>
