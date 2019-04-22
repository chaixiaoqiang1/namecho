<?php
function includeFile($file)
{
    include $file;
}

function config($config)
{
    return require BASE_DIR . 'app/config/' . $config . '.php';
}

function run_time()
{
    return microtime(true) - NAMECHO_START;
}

function base_url($uri = null)
{
    $config = config('app');
    return !empty($uri) ? $config['base_url'] . $uri : $config['base_url'];
}

function site_url($uri = null)
{
    $config = config('app');
    return !empty($uri) ? $config['base_url'] . $config['index_page'] . (!empty($config['index_page']) ? '/' : '') . $uri : $config['base_url'];
}

function error($info)
{
    include BASE_DIR . 'system/Template/error.php';
    exit;
}
