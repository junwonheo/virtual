<?php
include '../utils/common.php';

$div = isset($_GET['div']) ? $_GET['div'] : 'error';

if ($div === '' || !preg_match('/^\d+$/', $div)) {
    $div = 'error';
}

$sql = "SELECT i.idx, i.title, i.students, i.description, i.technologies, i.content, i.qna, l.grade 
        FROM lecture_info i 
        JOIN lecture l ON i.title = l.name 
        WHERE i.idx = " . intval($div);

$result = $db_conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $idx = $row["idx"];
        $title = $row["title"];
        $student = $row["students"];
        $description = $row["description"];
        $technologies = $row["technologies"];
        $content = $row["content"];
        $qna = $row["qna"];
        $grade = $row["grade"];
    }
}

$div_lecture_png = $div . "_lecture.png";

include '1.html';
?>
