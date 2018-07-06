<?php

require_once __DIR__ . '/config.php';

$read = new \CRUD\Read;

?><!DOCTYPE>
<html lang="pt_br">
<head>
    <title>Efeito Drag and Drop</title>
    <link rel="stylesheet" href="_cdn/css/reset.css">
    <link rel="stylesheet" href="_cdn/css/style.css">
</head>
<body>

<section class="container">
    <div class="content">
        <div class="main_courses">

            <header class="main_courses_header">
                <h1>Listagem de Cursos</h1>
            </header>

            <?php

            $read->readFull('SELECT * FROM courses ORDER BY course_order, course_name');

            if ($read->getResult()) {
                foreach ($read->getResult() as $item) {
                    echo "<article class='main_courses_item j_drag_active' id='{$item['course_id']}'>
                                <img src='img/{$item['course_img']}' alt='{$item['course_name']}'>
                                <div class='main_courses_item_content'>
                                    <h2>{$item['course_name']}</h2>
                                    <p>{$item['course_description']}</p>
                                </div>
                            </article>";
                }
            }
            ?>

            <div class="main_courses_header_action">
                <button class="btn btn_blue j_order">Ordenar</button>
                <button class="btn btn_green j_order_remove" style="display: none">Feito!</button>
            </div>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="_cdn/js/script.js"></script>
</body>
</html>