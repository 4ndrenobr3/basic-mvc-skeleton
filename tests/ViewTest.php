<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Views\View;
use App\Exceptions\ViewNotFoundException;

final class ViewTest extends TestCase
{
    protected function setUp(): void
    {
        // Define VIEWS_PATH for testing purposes
        if (!defined('VIEWS_PATH')) {
            define('VIEWS_PATH', __DIR__ . '/../front/');
        }
    }

    public function testViewConstructorSetsViewName(): void
    {
        $view = new View('test.php');
        $this->assertEquals('test.php', $view->view);
    }

    public function testMagicSetAndGetMethods(): void
    {
        $view = new View('test.php');
        $view->name = 'John Doe';
        $this->assertEquals('John Doe', $view->name);
    }

    public function testRenderThrowsExceptionIfViewFileNotFound(): void
    {
        $this->expectException(ViewNotFoundException::class);
        $view = new View('non_existent_view.php');
        $view->render();
    }

    public function testRenderReturnsString(): void
    {
        // Create a dummy view file for testing
        $dummyViewPath = VIEWS_PATH . 'dummy.php';
        file_put_contents($dummyViewPath, '<h1>Hello from dummy view!</h1>');

        $view = new View('dummy.php');
        $output = $view->render();

        $this->assertIsString($output);
        $this->assertStringContainsString('Hello from dummy view!', $output);

        // Clean up the dummy view file
        unlink($dummyViewPath);
    }
}