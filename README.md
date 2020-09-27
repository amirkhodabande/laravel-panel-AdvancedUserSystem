<p align="center">
This is a small panel admin with laravel ... TDD check our test foolder!
</p>

## Amir Khodabande

# Url - Admin

-   the admin url is => /admin/dashbord
-   Email of boss : **brown.joanie@example.net**
-   Password : **password**

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
