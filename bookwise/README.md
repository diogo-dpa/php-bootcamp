# Bookwise - MVC Architecture Documentation

## Overview

This project implements a **Model-View-Controller (MVC)** architectural pattern in PHP. The MVC pattern separates the application into three interconnected components to improve code organization, maintainability, and scalability.

## MVC Pattern Explained

The MVC pattern divides an application into three main components:

- **Model**: Manages data and business logic
- **View**: Handles presentation and user interface
- **Controller**: Processes user input and coordinates between Model and View

## Project Structure

```
bookwise/
├── index.php              # Entry point of the application
├── routes.php             # Routing logic
├── functions.php          # Helper functions
├── dados.php              # Model (data source)
├── controllers/           # Controllers directory
│   ├── index.controller.php
│   └── livro.controller.php
└── views/                 # Views directory
    ├── template/
    │   └── app.php        # Main layout template
    ├── index.view.php
    ├── livro.view.php
    └── 404.view.php
```

## Request Flow

### 1. Entry Point (`index.php`)

The application starts at `index.php`, which serves as the single entry point:

```php
require 'functions.php';
require 'routes.php';
```

This file:

- Loads helper functions
- Initializes the routing system

### 2. Routing System (`routes.php`)

The routing system extracts the controller name from the URL and loads the appropriate controller:

```php
function loadController(){
    $controller = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

    if (empty($controller)) {
        $controller = 'index';
    }

    if (file_exists("controllers/{$controller}.controller.php")) {
        require "controllers/{$controller}.controller.php";
    } else {
        abort(404);
    }
}
```

**How it works:**

1. Extracts the path from `$_SERVER['REQUEST_URI']`
2. Removes slashes to get the controller name
3. Defaults to `'index'` if the path is empty
4. Checks if the controller file exists
5. Loads the controller or shows a 404 error

**Example URLs:**

- `/` → `index.controller.php`
- `/livro` → `livro.controller.php`
- `/invalid` → `404.view.php`

### 3. Controllers (`controllers/`)

Controllers handle the application logic and coordinate between Models and Views.

#### Index Controller (`controllers/index.controller.php`)

```php
require 'dados.php';
view('index', compact('livros'));
```

This controller:

- Loads the data model (`dados.php`)
- Passes data to the view using the `view()` helper function

#### Livro Controller (`controllers/livro.controller.php`)

```php
require 'dados.php';

$id = $_REQUEST['id'];
$filtrado = array_filter($livros, fn($l) => $l['id'] == $id);
$livro = array_pop($filtrado);

view('livro', compact('livro'));
```

This controller:

- Loads the data model
- Filters data based on request parameters
- Passes filtered data to the view

### 4. Model (`dados.php`)

The Model represents the data layer. In this project, it's a simple PHP array:

```php
$livros = [
    ['id' => 1, 'titulo' => 'Livro 1', 'autor' => 'Autor 1', ...],
    // ... more books
];
```

**Note:** In a production application, this would typically interact with a database.

### 5. Views (`views/`)

Views handle the presentation layer and display data to the user.

#### View Helper Function (`functions.php`)

```php
function view($view, $data = []){
    foreach($data as $key => $value){
        $$key = $value;
    }
    require "views/template/app.php";
}
```

**How it works:**

1. Extracts data array keys into variables
2. Loads the main template (`views/template/app.php`)
3. The template includes the specific view file

#### Main Template (`views/template/app.php`)

The template provides:

- HTML structure
- Common layout (header, navigation)
- Dynamic content area that includes the specific view:

```php
<main class="mx-auto max-w-screen-lg space-y-6">
    <?php require "views/{$view}.view.php" ?>
</main>
```

#### View Files

- `index.view.php`: Displays a list of books
- `livro.view.php`: Displays a single book's details
- `404.view.php`: Error page for not found routes

## Helper Functions (`functions.php`)

### `view($view, $data = [])`

Renders a view with data and applies the main template.

### `abort($code)`

Handles HTTP error responses:

```php
function abort($code) {
    http_response_code($code);
    view($code);
    die();
}
```

### `dd($dump)`

Debug function for development (dump and die).

## Complete Request Cycle

1. **User Request** → URL is accessed (e.g., `/livro?id=1`)
2. **Entry Point** → `index.php` is loaded
3. **Routing** → `routes.php` extracts controller name from URL
4. **Controller** → Appropriate controller is loaded
   - Controller loads data from Model (`dados.php`)
   - Controller processes business logic
   - Controller calls `view()` with data
5. **View** → `view()` function:
   - Extracts data into variables
   - Loads main template (`app.php`)
   - Template includes specific view file
6. **Response** → HTML is rendered and sent to the user
