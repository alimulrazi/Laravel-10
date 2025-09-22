
## Front end of this project repositor:

`https://github.com/alimulrazi/Angular-10-authentication-with-user-management.git`

## About This Project

I have created the project for the learning and sharing purpose. Here I have included php artisan command, data validation, accessor and mutator, apiResource, Resource collection, Routing, Routing group, and many more :

- [Front end of this API Angular-10-authentication-with-user-management](https://github.com/alimulrazi/Angular-10-authentication-with-user-management)
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

## Add Swagger (OpenAPI) to your Laravel 8.23 project — step-by-step

## 1) Install packages

`composer update darkaonline/l5-swagger --with-all-dependencies`
# (optional/if needed) ensure swagger-php is installed — recommended for OpenAPI 3:
`composer require zircote/swagger-php:^3.3`

## 2) Publish config & views

`php artisan vendor:publish --provider="L5Swagger\L5SwaggerServiceProvider"`

`php artisan l5-swagger:generate`

`php artisan route:list | findstr swagger`

### Swagger UI
`http://localhost:8001/api/documentation`

### JSON docs
`http://localhost:8001/docs (not /docs?api-docs.json`
