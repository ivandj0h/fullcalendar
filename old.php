<?php
// Include config file
require_once "db.php";

// Attempt select query execution
$sql = "SELECT * FROM view_user_meeting";
if ($result = $pdo->query($sql)) {
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {

            $date = new DateTime($row['start_date']);
            $time = new DateTime($row['start_time']);

            $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));

            $userData_List['List of Users'][] = $row;
            // echo "<tr>";
            // echo "<td>" . $row['id'] . "</td>";
            // echo "<td>" . $row['department_name'] . "</td>";
            // echo "<td>" . $row['speakers_name'] . "</td>";
            // echo "<td>" . $row['members_name'] . "</td>";
            // echo "<td>" . $merge->format('Y-m-d\TH:i:s') . "</td>";
            // echo "<td>";
            // echo "<a href='read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
            // echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
            // echo "<a href='delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
            // echo "</td>";
            // echo "</tr>";
        }
        // Free result set
        echo json_encode($userData_List);
        unset($result);
    } else {
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
unset($pdo);
