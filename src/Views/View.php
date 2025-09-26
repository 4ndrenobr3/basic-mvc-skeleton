<?php
declare(strict_types=1);
namespace App\Views;

use App\Exceptions\ViewNotFoundException;

class View
{
    private string $view;
    private array $data = [];

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
        if (!defined('VIEWS_PATH')) {
            throw new ViewNotFoundException('VIEWS_PATH is not defined.');
        }

        $viewPath = VIEWS_PATH . $this->view;

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException(sprintf('View file not found: %s', $viewPath));
        }

        ob_start();

        require $viewPath;

        return ob_get_clean();
    }
}