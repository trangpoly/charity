@servers(['dev' => ['ec2-user@13.250.56.254']])

@setup
    $dirRoot = "/var/www/chartiry/src/";
    $dirSrc = "/var/www/chartiry/src/";
@endsetup

@story('deploy')
    git
    build
@endstory

@task('git', ['on' => $server])
    cd {{ $dirRoot }}
    pwd
    git pull
@endtask

@task('build', ['on' => $server])
    cd {{ $dirSrc }}
    php artisan migrate
    php artisan config:clear
    php artisan view:clear
    php artisan cache:clear
    npm run build
@endtask
