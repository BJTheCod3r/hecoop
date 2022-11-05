# HECooperative Interview Task.


## Requirements

To complete this task you will need a development environment that includes:

- PHP 8.0+
- Composer
- MySQL
- NodeJS

## Installation:

Fork or Clone this repository, if you clone rather than fork, make sure to delete the `.git` directory and start fresh, or change the remote repository URL to one of your own public repos.

Like any other Laravel projects, add your database configuration to the `.env` file, and then run:

```shell
php artisan migrate --seed
```


## Task Outline

You have been provided with a link to this github repository containing a basic laravel application, with some custom migration files.

The migrations included create three tables and fill them with some content:

`users` contains a sample of 10 fictional users of our system, all of these included users have the role of student. The password for every user is set to "password".

`resources` contains a few actual sample resources from our live VLE system, we have omitted the full content of these modules, but the titles and relationships to each other are correct. Note that resources are ***hierarchical*** meaning they can have *parent* and *child* resources.

`progression_items` contains records that indicate which resources a user has completed and at what time.

Only when a user has completed all the `resources` are they considered having completed the online course.

### The task:

We have included a login and authentication system using Laravel Breeze https://laravel.com/docs/9.x/starter-kits#laravel-breeze , noting that:

- We've disabled the registration routes.
- Any work you do for students should be secured behind a login.

Create an interactive view that allows any user to see a full list of resources (displayed hierarchically), and see which modules they have already completed, and when they completed them.

The interactive view must have: 

- A text search field that filters the modules by title
- The ability to sort the results by *completion date*, either ascending or descending
- A toggle on/off to only show completed modules

You can complete this interactive portion using either:
- Laravel Livewire
- OR VueJS

How you integrate one or the other is completely up to you!

### Bonus points:

Your bonus task is to adapt the same view so that it can be used by an adminstrator to view the progress for ALL or ANY student.

This view should be placed on a different page, and behind an additional layer of authentication so students cannot see it.

How you implement that extra layer of authentication is up to you.