<?php

// you have to load all class definitions before(!) the session is loaded via session_start()
require_once 'classes/User.php';

// load/create the session
session_start();

// let the controller do his work
require_once 'controllers/base_controller.php';