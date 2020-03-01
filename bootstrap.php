<?php

use App\Listeners\GenerateSitemap;
use Illuminate\Container\Container;
use TightenCo\Jigsaw\Events\EventBus;

/** @var $container Container */
/** @var $events EventBus */

/**
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

$events->afterBuild(GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateIndex::class);

