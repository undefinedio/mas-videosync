<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'mas-video-sync');

// Project repository
set('repository', 'git@github.com:undefinedio/mas-videosync.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', ['public/videos/']);

// Writable dirs by web server 
add('writable_dirs', []);

// Hosts
host('mas@178.18.136.201')
    ->set('deploy_path', '/home/mas/app');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

