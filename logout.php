<?php
include 'includes/session.inc.php';
include 'includes/functions.inc.php';
session_destroy();
redirect('/index?msg=logout');
exit();
?>