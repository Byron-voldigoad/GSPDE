<?php
    session_start();
    if($_SESSION['user']['ROLE']!='PARENT'){
        include("../db-connect2.php");
        $outgoing_id = $_POST["outgoing_id"];
        $incoming_id = $_POST["incoming_id"];
        $outgoing = "";

        $sql  = "SELECT * FROM message 
                LEFT JOIN ENSEIGNANT ON ENSEIGNANT.id_unique_E = message.outgoing_msg_id
                LEFT JOIN PARENT ON PARENT.id_unique_p = message.outgoing_msg_id 
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";

        $query = $pdo->query($sql);
            while($row = $query->fetch()){
                if($row["outgoing_msg_id"] == $outgoing_id){
                    $outgoing .= '<div class="chat outgoing">
                                        <div class="details">
                                            <p>'.$row['msg'].'</p>
                                        </div>
                                    </div>';
                }else{ 
                   
                    $outgoing .= '<div class="chat incoming">
                                    <img src="php/images/'.$row['PHOTO_P'].'" alt="">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                </div>
                                    </div>';
                 

}

echo $outgoing;
}

}else{
    include("../db-connect2.php");
    $outgoing_id = $_POST["outgoing_id"];
    $incoming_id = $_POST["incoming_id"];
    $outgoing = "";
                $sql  = "SELECT * FROM message 
                LEFT JOIN PARENT ON PARENT.id_unique_p = message.outgoing_msg_id 
                LEFT JOIN ENSEIGNANT ON ENSEIGNANT.id_unique_E = message.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
                   
               } 
    $query = $pdo->query($sql);
        while($row = $query->fetch()){
            if($row["outgoing_msg_id"] == $outgoing_id){
                $outgoing .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
            }else{
                
                    $outgoing .= '<div class="chat incoming">
                    <img src="php/images/'.$row['PHOTO_E'].'" alt="">   
                    <div class="details">
<p>'.$row['msg'].'</p>
</div>
</div>';          
                }

}

echo $outgoing;


?>