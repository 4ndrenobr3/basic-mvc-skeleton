# TODO: Modernize Basic MVC Skeleton Project

This document outlines the necessary modifications to bring the `basic-mvc-skeleton` project up to modern PHP standards, adhering to PSRs and best practices.

## 1. Implement Strict Types

*   Add `declare(strict_types=1);` at the top of all PHP files (`HomeController.php`, `View.php`, and any future PHP files) to enforce strict type checking.

## 2. Add Type Hinting

*   **`src/Controllers/HomeController.php`:**
    *   `public function index()`: Add `string` return type hint.

*   **`src/Views/View.php`:**
    *   `public function __construct($view)`: Add `string` type hint for `$view` parameter.
    *   `public function __set($index, $value)`: Add `string` type hint for `$index` and `mixed` for `$value`.
    *   `public function __get($index)`: Add `string` type hint for `$index` and `mixed` return type hint.
    *   `public function render()`: Add `string` return type hint.

## 3. Implement Dependency Injection

*   **`src/Controllers/HomeController.php`:**
    *   Modify `HomeController` to accept a `View` instance (or a `ViewFactory`) via its constructor instead of instantiating it directly within the `index` method. This will decouple the controller from the view implementation.

## 4. Improve Error Handling

*   **`src/Views/View.php`:**
    *   In the `render()` method, add checks to ensure `VIEWS_PATH` is defined and the view file (`$this->view`) exists before attempting to `require` it. Throw a custom exception (e.g., `ViewNotFoundException`) if the file is not found.

## 5. Define Constants Properly

*   **`VIEWS_PATH`:** Ensure `VIEWS_PATH` is defined in a central configuration file (e.g., `bootstrap/bootstrap.php` or a dedicated `config.php`) using `define()` or a class constant, rather than relying on a global undefined variable.

## 6. Introduce Automated Testing

*   **Unit Tests:** Create a `tests/` directory and add unit tests for `HomeController` and `View` classes using a testing framework like PHPUnit.
    *   Test `HomeController::index()` to ensure it correctly renders the view.
    *   Test `View` class methods (`__construct`, `__set`, `__get`, `render`) for expected behavior and error conditions.

## 7. Enforce Coding Standards (PSR-12)

*   Integrate a linter (e.g., PHP_CodeSniffer with PSR-12 standard) and a static analysis tool (e.g., PHPStan, Psalm) into the development workflow to automatically check and enforce coding style and identify potential issues.

## 8. Refactor View Rendering (Optional but Recommended)

*   Consider moving the `require VIEWS_PATH . $this->view;` logic into a dedicated view renderer service or a more robust templating engine (e.g., Twig, Blade) for better separation of concerns and security.
