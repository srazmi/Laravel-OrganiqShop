<?php


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