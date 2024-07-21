# Clickup API Laravel Package 

This Laravel package simplifies the process of connecting to, manipulating, and requesting data from ClickUp, a powerful project management tool. Designed for developers, it provides an easy-to-use interface for integrating ClickUp’s functionalities into Laravel applications. With this package, you can effortlessly manage tasks, projects, and other resources within ClickUp, streamlining your workflow and enhancing productivity.

**My package is currently in an experimental phase, so please keep this in mind when using it.**

## Currently implemented endpoints:

#### Tasks
- [x]  Get tasks (from list)
- [x]  Create task (in list)
- [x]  Get task
- [x]  Update task
- [x]  Delete task
- [ ]  Get filtered team tasks
- [ ]  Get task's time in status -> something weird is going on here
- [ ]  Get bulk tasks' time in status -> something weird is going on here
##### The tasks endpoints are available using the **TaskService**

#### Lists
- [ ]  Get lists
- [ ]  Create list
- [ ]  Get folderless lists
- [ ]  Create folderless list
- [x]  Get list
- [x]  Update list
- [x]  Delete list
- [x]  Add task to list
- [x]  Remove task from list
##### The lists endpoints are available using the **ListService**

## Generate Clickup API token 

    1. Go to clickup.com (and log in to your account)
    2. In the upper-right corner, click your personal avatar.
    3. Click Settings.
    4. In the left sidebar, click Apps. 
    5. To create your API token, click Generate.
    
## Installation

Add the following to your composer.json:
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/mjderoode/clickup-api"
    }
],
```

Install mjderoode/clickup-api with composer:
```bash
composer require mjderoode/clickup-api
```

Add your clickup key token to the .env:
```env
CLICKUP_API_KEY="pk_########_################################"
```

**OPTIONAL:** To publish the config file, use the following command (the file is published as `config/clickup-api.php`): 
```bash
php artisan vendor:publish --tag=clickup-api-config
```
## Usage/ Examples

Each endpoint uses its own Service, most of the methods return Collections (`Illuminate\Support\Collection`). For example, if you want to get a specific task, you can achieve this by using the `TaskService`: 

```php
use Mjderoode\ClickupApi\Services\TaskService; 

$task_service = new TaskService();

$task = $task_service->getTask();
```

The same goes for the `ListService`. If you want to copy a task from one list to another, do the following: 
```php
use Mjderoode\ClickupApi\Services\ListService; 

$list_service = new ListService();

$list_service->addTaskToList(list_id: 901505402536, task_id: "86bznf44d");
```

Check out both Services for all available methods. Extended documentation will be coming soon. 
## Authors

- [@mjderoode (github)](https://github.com/mjderoode)


## License

The MIT License ([MIT](https://choosealicense.com/licenses/mit/)).
