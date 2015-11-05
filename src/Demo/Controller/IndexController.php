<?php

namespace Demo\Controller;

use Framework\Controller;
use Framework\Template;

class IndexController extends Controller
{
    public function indexAction()
    {
        $template = new Template();
        $template->render(__DIR__ . '/../View/Index/index.php');
    }
}
