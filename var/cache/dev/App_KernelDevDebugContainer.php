<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNPnKz2s\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNPnKz2s/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNPnKz2s.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNPnKz2s\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerNPnKz2s\App_KernelDevDebugContainer([
    'container.build_hash' => 'NPnKz2s',
    'container.build_id' => '217df157',
    'container.build_time' => 1683234853,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNPnKz2s');
