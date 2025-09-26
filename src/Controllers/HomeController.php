<?php
declare(strict_types=1);
namespace App\Controllers;

use App\Views\View;

class HomeController
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function index(): string
    {
        $this->view->view = 'index.php';
        return $this->view->render();
    }
}