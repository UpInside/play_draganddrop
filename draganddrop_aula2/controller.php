<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 03/07/2018
 * Time: 15:06
 */

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$action = $postData['action'];
unset($postData['action']);

require_once __DIR__ . '/config.php';

switch ($action) {
    case 'reorder_courses':

        if (!empty($postData)) {
            $update = new \CRUD\Update;

            foreach ($postData['data'] as $order) {
                $update->update('courses', ['course_order' => $order[1]], "WHERE course_id = :id", "id={$order[0]}");
            }

        }

        $json = true;
        break;
}

echo json_encode($json);