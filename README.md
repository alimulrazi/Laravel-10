
## About This Project

I have created the project for the learning and sharing purpose. Here I have included php artisan command, data validation, accessor and mutator, apiResource, Resource collection, Routing, Routing group, and many more :

- [Laravel Coding Guidelines](https://xqsit.github.io/laravel-coding-guidelines/docs/naming-conventions/)
- [Laravel Naming Conventions](https://webdevetc.com/blog/laravel-naming-conventions/)
- [Laravel CRUD Generator](https://github.com/misterdebug/crud-generator-laravel).
- [API Resources/Collections vs response()->json()](https://laracasts.com/discuss/channels/laravel/api-resourcescollections-vs-response-json).
- [Laravel Route apiResource (difference between apiResource and resource in route)](https://stackoverflow.com/questions/54721576/laravel-route-apiresource-difference-between-apiresource-and-resource-in-route).
- [Laravel API Resources Example](https://dev.to/dalelantowork/laravel-8-api-resources-for-beginners-2cpa).
- [Build a REST API with Laravel API resources](https://pusher.com/blog/build-rest-api-laravel-api-resources/).
- [What is the best practice to show old value when editing a form in Laravel?](https://stackoverflow.com/questions/38461677/what-is-the-best-practice-to-show-old-value-when-editing-a-form-in-laravel).
- [Laravel 9 CRUD Application Tutorial Example](https://www.itsolutionstuff.com/post/laravel-9-crud-application-tutorial-exampleexample.html).
- [Eloquent: Relationships](https://laravel.com/docs/9.x/eloquent-relationships#has-many-through).
- [Blade Templates](https://laravel.com/docs/9.x/blade).
- [Laravel Requests](https://laravel.com/docs/9.x/requests).
- [Laravel Middleware](https://laravel.com/docs/10.x/middleware).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

`php artisan make:model -a -r Product`

where -a = all
-m, --migration Create a new migration file for the model.
-c, --controller Create a new controller for the model.
-r, --resource Indicates if the generated controller should be a resource controller

`php artisan make:resource ProductResource`

create a resource collection using either of the two commands
`php artisan make:resource Products --collection`
`php artisan make:resource ProductCollection`

To quickly generate an API resource controller that does not include the `create` or `edit` methods, use the `--api` switch when executing the `make:controller` command:

`php artisan make:controller ProductController --api`

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Lara casts](https://laracasts.com) can help. Lara casts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

