![alt](https://https://https://github.com/amirkhodabande/laravel-panel/blob/master/public/imageforgit/2020-09-30_16-44-17.png)

<p align="center">
This is a small panel admin with laravel ... TDD check our tests foolder and use or develop theme
*Be online*
</p>

## Amir Khodabande

# Url - Admin

-   the admin url is => /admin/dashbord
-   Email of boss : **brown.joanie@example.net**
-   Password : **password**

# Files

-   Run :
    `php artisan storage:link`

         => if it say the link has been created and again the images are hidden in the admin panel...

-   Delete the storage foolder in public foolder and try again => public/storage

# Database

-   As default we have 4 type of user :
    1 => boss : its the owner and can do any thing
    2 => admin : only cant change other users type
    3 => reporter : only can add page and ....
    4 => user : a normal user

-   Database is Sqlite

# Email

the emails are in queue for runing theme :
`php artisan queue:work`

# Pagemaker

I use cdn.tiny.cloud
