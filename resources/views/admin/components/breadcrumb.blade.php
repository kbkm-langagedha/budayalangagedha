<?php
$url = $_SERVER['REQUEST_URI'];
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$url = strtok($url, '?');

$pathSegments = explode('/', trim($url, '/'));

// Helper function to simulate Laravel's url() function
if (!function_exists('url')) {
    function url($path = '')
    {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        return $scheme . '://' . $host . $path;
    }
}
?>
<style>
    .breadcrumb-container {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    .breadcrumb {
        margin-bottom: 0;
        font-size: 0.95rem;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .breadcrumb-item a:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .breadcrumb-item.active {
        color: #343a40;
        font-weight: 500;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: "\f105";
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: #6c757d;
        margin-right: 8px;
    }
</style>
<ol class="breadcrumb">
    <?php
    $currentSegment = '';
    $currentPath = '';
    
    if ($pathSegments[0] != '') {
        echo '<li class="breadcrumb-item"><a href="' . url('/') . '">Dashboard</a></li>';
    }
    
    foreach ($pathSegments as $key => $segment) {
        if ($segment == 'home' || $segment == 'dashboard') {
            continue;
        }
    
        if (!is_numeric($segment)) {
            $currentPath .= '/' . $segment;
    
            if ($currentSegment == $segment) {
                continue;
            }
    
            if ($key == count($pathSegments) - 1) {
                echo '<li class="breadcrumb-item active" aria-current="page">' . ucfirst($segment) . '</li>';
            } else {
                $fullUrl = url('/') . $currentPath;
                echo '<li class="breadcrumb-item"><a href="' . $fullUrl . '">' . ucfirst($segment) . '</a></li>';
            }
    
            $currentSegment = $segment;
        }
    }
    ?>
</ol>
