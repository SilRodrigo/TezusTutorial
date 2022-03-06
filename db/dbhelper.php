<?php

class Db_Helper
{
    function prepareTutorialListData($data)
    {
        $tutorial_list = [];
        if (isset($data->fetch_assoc)) {
            while ($row = $data->fetch_assoc()) {
                $tutorial_id = $row["tutorial_id"];
                $tutorial_content = $row["tutorial_content"];
                $tutorial_list[] = '{id: ' . $tutorial_id . ', content: ' . $tutorial_content . '}';
            }
            return $tutorial_list;
        }
        foreach ($data as $item) {
            $tutorial_list[] = '{id: ' . $item['tutorial_id'] . ', content: ' . $item['tutorial_content'] . '}';
        }
        return $tutorial_list;
    }
}
