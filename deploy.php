<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'wordpress');

// Shared files/dirs between deploys
set('shared_files', [
    '.env'
]);
set('shared_dirs', [
    'web/app/uploads'
]);

// Writable dirs by web server
set('writable_dirs', [
    'web/app/uploads'
]);

set('allow_anonymous_stats', false);

// Hosts
host('k10022@stillhammerhaus.de')
    ->set('deploy_path', '/stage.stillhammerhaus.de');

// Override `deploy:update_code` command to upload our files instead of `git pull`
task('deploy:update_code', function () {
    upload('.', '{{release_path}}');
});

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    //'deploy:vendors', - Don't need this as we don't use composer
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
