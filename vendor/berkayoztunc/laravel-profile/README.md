
# laravel-profile

A laravel package that can do simple profile and activity tracking. Completes the indexing and viewing of profile actions for new initiatives or quick project developers.

## install

This package requires PHP 7 and Laravel 5.4 or higher.
Befour all think 

```
php artisan make:auth
```
for the simple user 

```
composer require berkayoztunc/laravel-profile

```

Now add the service provider in config/app.php file:
```
'providers' => [
    // ...
    Berkayoztunc\LaravelProfile\LaravelProfileServicesProvider::class,
];
```

You can publish the file with:
```
    php artisan vendor:publish --provider=Berkayoztunc\LaravelProfile\LaravelProfileServicesProvider::class
```

After the migration has been published you can create migration for activity
```
php artisan migrate
```

as you wish just publish config file
```
 php artisan vendor:publish --provider=Berkayoztunc\LaravelProfile\LaravelProfileServicesProvider::class --tag=config
```
This is the contents of the published config/profile.php config file:


```
return [
    /**
    
      Middleware of the profile wich is profile route
    
     */
    
    'middleware' => ['auth'],
    
    /**
    
      custom prefix
    
     */
    
    'route_prefix' => null,
    
    /**
      
      As you wish spasifiy your model
     
     */
     
    'user_class' => \App\User::class,
    /**
    
      Guard for the activitys and route user find method ,
    
     */
     
    'guard' => 'web',

    /**
     
      activity , you can close by the false with the links and more
     
     */
     
    'activity' => true,

];
```

## Usage

first improve your model in App\Model\yourmodel or App\yourmodel

```
class YourModel extends Model 
{

    use  Trackable;
    .
    .
    .
    .
    /**
    * exp : User will "My awesome user model"
    **/
    public $tracingName = 'YourModel which is emplain goog';
   
    protected $events = [
        'created' => RecordCreated::class,
        'deleted' => RecordDeleted::class,
        'updated' => RecordUpdated::class,
    ];

}    
    
```

### Screenshots

![account](https://berkayoztunc.github.io/laravel-profile/account.png)
![information](https://berkayoztunc.github.io/laravel-profile/information.png)
![activity](https://berkayoztunc.github.io/laravel-profile/activity.png)


## lisance

The MIT License (MIT)