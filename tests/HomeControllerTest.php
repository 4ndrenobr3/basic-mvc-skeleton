<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\HomeController;
use App\Views\View;

class HomeControllerTest extends TestCase
{
    public function testIndexReturnsString(): void
    {
        $mockView = $this->createMock(View::class);
        $mockView->method('render')->willReturn('<h1>Welcome!</h1>');
        $mockView->expects($this->once())
                 ->method('__set')
                 ->with('view', 'index.php');

        $controller = new HomeController($mockView);
        $this->assertIsString($controller->index());
    }
}