node {
	stage("make links"){
		sh 'mklink "C:\Program Files\Git\cmd\nohup.exe" "C:\Program Files\git\usr\bin\nohup.exe"'
		sh 'mklink "C:\Program Files\Git\cmd\msys-2.0.dll" "C:\Program Files\git\usr\bin\msys-2.0.dll"'
		sh 'mklink "C:\Program Files\Git\cmd\msys-iconv-2.dll" "C:\Program Files\git\usr\bin\msys-iconv-2.dll"'
		sh 'mklink "C:\Program Files\Git\cmd\msys-intl-8.dll" "C:\Program Files\git\usr\bin\msys-intl-8.dll"'
	}

    stage("composer_install") {
        sh 'composer install'
    }

    stage("php_lint") {
        sh 'find . -name "*.php" -print0 | xargs -0 -n1 php -l'
    }

    stage("phpunit") {
        sh 'vendor/bin/phpunit'
    }
}