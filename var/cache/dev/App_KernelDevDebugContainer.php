<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMKj2ULO\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMKj2ULO/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMKj2ULO.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMKj2ULO\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerMKj2ULO\App_KernelDevDebugContainer([
    'container.build_hash' => 'MKj2ULO',
    'container.build_id' => '12316446',
    'container.build_time' => 1686025724,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMKj2ULO');
