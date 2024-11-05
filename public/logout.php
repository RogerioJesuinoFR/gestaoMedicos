<?php
session_start();
session_unset();
session_destroy();
header('Location: /gestaoMedicos/public/index.php?action=login_medico');
exit();