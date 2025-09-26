<?php
declare(strict_types=1);
namespace App\Views;


class View
{
    private $view;
    private $data = array();

    public function __construct(string $view)
    {
        $this->view = $view;
    }

    public function __set(string $index, mixed $value)
    {
        $this->data[$index] = $value;
    }

    public function __get(string $index): mixed
    {
        return $this->data[$index];
    }

    public function render(): string
    {
        ob_start();

        require VIEWS_PATH . $this->view;

        return ob_get_clean();
    }
}