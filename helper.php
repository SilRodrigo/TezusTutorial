<?php 

function prepareTutorialListData($data){
    $tutorial_list = [];
    while ($row = $data->fetch_assoc()) {
        $tutorial_id = $row["tutorial_id"];
        $tutorial_content = $row["tutorial_content"];
        $tutorial_list[] = '{id: '.$tutorial_id.', content: '.$tutorial_content.'}';    
    }
    return $tutorial_list;
}
