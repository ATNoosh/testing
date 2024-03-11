#A Simple Todo App(Backend)

Laravel 10.10
## Requirements
* php8.1
* mysql

## Installation
`composer update`
`php artisan migrate`
`php artisan schedule:work`
`php artisan queue:work`

## Some options in .env.example
```
FAKE_TASKS_COUNT=100 // used in seeder
FAKE_USERS_COUNT=100 // used in seeder
TASK_CHUNK_SIZE=100 // used in auto complete tasks
TASKS_AUTO_COMPLETE_BROADCAST=true // used in auto complete tasks
```
