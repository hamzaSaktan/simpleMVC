<?php

include "conf/conf.php";
include "classes/Config.php";

include "helpers/url_helper.php";

include "classes/Database.php";
include "classes/Session.php";

include "classes/Model.php";
include "classes/View.php";
include "classes/Controller.php";

$db = new Database();
include "classes/Bootstrap.php";
new Bootstrap();

