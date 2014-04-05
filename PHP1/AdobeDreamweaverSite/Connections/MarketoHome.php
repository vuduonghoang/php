<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MarketoHome = "localhost";
$database_MarketoHome = "marketohome";
$username_MarketoHome = "root";
$password_MarketoHome = "";
$MarketoHome = mysql_pconnect($hostname_MarketoHome, $username_MarketoHome, $password_MarketoHome) or trigger_error(mysql_error(),E_USER_ERROR); ?>