<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About levaral
Требования:
Make

В файл hosts операционной системы нужно добавить такие строки:
```
127.0.0.1   leraval.localhost
127.0.0.1   api.leraval.localhost
```

Запуск:
1. make install-local
2. make up
3. http://leraval.localhost:8080/

Если используется windows + phpstorm, то:
1. Preferences->Build,Execution,Deployment->Build Tools->make
2. прописать путь до make в wsl ```\\wsl$\Ubuntu-22.04\usr\bin\make```
   Появится возможность запускать Makefile из интерфейса PhpStorm

Описание структуры:
1. Аутентификация sanctum для API МП и Frontend
2. Структура расположения модулей - каталоги
