<?php
while ($row = $resultatUser->fetch()) {
    if ($_SESSION['user']['ROLE'] == 'PARENT') {
        $sql2 = "SELECT * FROM message WHERE (incoming_msg_id = {$row['id_unique_E']}
                OR outgoing_msg_id = {$row['id_unique_E']}) AND (incoming_msg_id = {$outgoing_id}
                OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $resultatUser2 = $pdo->query($sql2);

        if ($row2 = $resultatUser2->fetch()) {
            $result = $row2["msg"];
        } else {
            $result = "No message available";
        }


        (strlen($result) > 28) ? $msg = substr($result, 0, 28) : $msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        ($row['statut'] == "Offline now") ? $offline = "offline" : $offline = "";
        if ($row['statut'] == "Active now") {
            $output .= '<a href="chat.php?user_id=' . $row['id_unique_E'] . '">
        <div class="content">
        <img src="php/images/' . $row['PHOTO_E'] . '" alt="">
        <div class="details">
        <span>' . $row['NOM_ENSEIGNANT'] . " " . $row['PRENOM_ENSEIGNANT'] . '</span>
        <p>' . $you . $msg . '</p>
        </div>
        </div>
        <div><i class="fas fa-circle text-success"></i></div>
        </a>';
        } else {
            $output .= '<a href="chat.php?user_id=' . $row['id_unique_E'] . '">
        <div class="content">
        <img src="php/images/' . $row['PHOTO_E'] . '" alt="">
        <div class="details">
        <span>' . $row['NOM_ENSEIGNANT'] . " " . $row['PRENOM_ENSEIGNANT'] . '</span>
        <p>' . $you . $msg . '</p>
        </div>
        </div>
        <div><i class="fas fa-circle text-danger"></i></div>
        </a>';
        }
        
    } else {
        $sql2 = "SELECT * FROM message WHERE (incoming_msg_id = {$row['id_unique_p']}
            OR outgoing_msg_id = {$row['id_unique_p']}) AND (incoming_msg_id = {$outgoing_id}
            OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $resultatUser2 = $pdo->query($sql2);

        if ($row2 = $resultatUser2->fetch()) {
            $result = $row2["msg"];
        } else {
            $result = "Pas de message valide";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28) : $msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        ($row['statut'] == "Offline now") ? $offline = "offline" : $offline = "";
        if ($row['statut'] == "Active now") {
            $output .= '<a href="chat.php?user_id=' . $row['id_unique_p'] . '">
    <div class="content">
    <img src="php/images/' . $row['PHOTO_P'] . '" alt="">
    <div class="details">
    <span>' . $row['NOM_PARENT'] . " " . $row['PRENOM_PARENT'] . '</span>
    <p>' . $you . $msg . '</p>
    </div>
    </div>
    <div><i class="fas fa-circle text-success"></i></div>
    </a>';
        } else {
            $output .= '<a href="chat.php?user_id=' . $row['id_unique_p'] . '">
    <div class="content">
    <img src="php/images/' . $row['PHOTO_P'] . '" alt="">
    <div class="details">
    <span>' . $row['NOM_PARENT'] . " " . $row['PRENOM_PARENT'] . '</span>
    <p>' . $you . $msg . '</p>
    </div>
    </div>
    <div><i class="fas fa-circle text-danger"></i></div>
    </a>';
        }
    }
}