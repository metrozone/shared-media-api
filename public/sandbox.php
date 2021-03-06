<?php // attogram/shared-media-api - sandbox.php - v1.1.2

use Attogram\SharedMedia\Api\Sources;
use Attogram\SharedMedia\Sandbox\Sandbox;

$autoload = '../vendor/autoload.php';
if (!is_readable($autoload)) {
    print 'ERROR: Autoloader Not Found: ' . $autoload;
    return false;
}
require_once($autoload);

if (!class_exists('Attogram\SharedMedia\Sandbox\Sandbox')) {
    print 'ERROR: Sandbox Class Not Found';
    return false;
}

$sandbox = new Sandbox('shared-media-api');

$sandbox->setMethods([
    ['Attogram\SharedMedia\Api\Category', 'search',              'query',  false],
    ['Attogram\SharedMedia\Api\Category', 'info',                false,    true],
    ['Attogram\SharedMedia\Api\Category', 'subcats',             false,    true],
    ['Attogram\SharedMedia\Api\Category', 'getCategoryfromPage', false,    true],
    ['Attogram\SharedMedia\Api\Media',    'search',              'query',  false],
    ['Attogram\SharedMedia\Api\Media',    'info',                false,    true],
    ['Attogram\SharedMedia\Api\Media',    'getMediaInCategory',  false,    true],
    ['Attogram\SharedMedia\Api\Media',    'getMediaOnPage',      false,    true],
    ['Attogram\SharedMedia\Api\Page',     'search',              'query',  false],
    ['Attogram\SharedMedia\Api\Page',     'info',                false,    true],
]);

$sandbox->setSources(Sources::$sources);

$sandbox->setPreCall([
    ['setPageid', 'pageids'],    // Set the pageid identifier
    ['setTitle', 'titles'],      // Set the title identifier
    ['setEndpoint', 'endpoint'], // Set the API endpoint
    ['setLimit', 'limit'],       // Set the # of responses to get
]);

$sandbox->play();
