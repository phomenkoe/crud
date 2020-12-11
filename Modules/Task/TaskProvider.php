<?php

namespace Modules\Task;

use Modules\Common\Application\AbstractServiceProvider;

/**
 * Class TaskProvider
 * @package Modules\Task
 */
class TaskProvider extends AbstractServiceProvider {

    protected $routesPath = __DIR__ . '/UI/Routes/api.php';
    protected $migrationsPath = __DIR__ . '/Infrastructure/Migrations';

}
