<?php
$div = isset($_GET['div']) ? $_GET['div'] : 'error';

if ($div === '' || !preg_match('/^\d+$/', $div)) {
    $div = 'error';
}
$title =  '2';


include $div . '.html';
?>
