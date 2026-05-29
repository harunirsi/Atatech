<?php

class View {
    public static function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . "/../views/{$view}.php";
        
        if (!file_exists($viewPath)) {
            throw new Exception("View {$view} not found at: {$viewPath}");
        }

        ob_start();
        try {
            require_once $viewPath;
        } catch (Throwable $e) {
            ob_end_clean();
            throw new Exception("View render error in {$view}: " . $e->getMessage(), 0, $e);
        }
        $content = ob_get_clean();

        $layout = $data['layout'] ?? 'main';
        $layoutPath = __DIR__ . "/../views/layouts/{$layout}.php";
        
        if (!file_exists($layoutPath)) {
            throw new Exception("Layout {$layout} not found at: {$layoutPath}");
        }
        
        try {
            require_once $layoutPath;
        } catch (Throwable $e) {
            throw new Exception("Layout render error in {$layout}: " . $e->getMessage(), 0, $e);
        }
    }

    public static function partial($partial, $data = []) {
        extract($data);
        $partialPath = __DIR__ . "/../views/partials/{$partial}.php";
        
        if (file_exists($partialPath)) {
            require_once $partialPath;
        }
    }

    public static function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
