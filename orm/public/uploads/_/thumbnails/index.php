<?php

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Directus\Util\ArrayUtils;
use Directus\Filesystem\Thumbnailer;

try {

    $app = require dirname(__DIR__, 2) . '/src/web.php';
//    $app = \Directus\create_app_with_project_name($basePath, $projectName);

} catch (\Exception $e) {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode([
        'error' => [
            'error' => 8,
            'message' => 'API Project Configuration Not Found: ' . $projectName
        ]
    ]);
    exit;
}

// ------ modification starts here --------

$customSettings = [];
if (file_exists(dirname(__FILE__) . '/configuration.php')) {
    $customSettings = require_once(dirname(__FILE__) . '/configuration.php');
    if (is_array($customSettings) === false) {
       $customSettings = [];
    }
}

$defaultSettings = \Directus\get_directus_thumbnail_settings();

$settings = array_merge_recursive($defaultSettings, $customSettings);

// ------- modification ends here ----------

try {
    $app = require dirname(__DIR__, 2) . '/src/web.php';
	}