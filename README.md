# forum-management
1. Install xampp and check xampp is working properly.
2. Please check your php version. It should be v7.x but not v8.
3. Open up a Windows command prompt or git bash.
4. Change into the directory where your xampp/htdocs is located in the command prompt.
5. Move to "master" branch in Github and clone the project to your xampp/htdocs. Run command, "git clone https://github.com/Pradeepika-dev/forum-management.git"
6. Create the database in phpmyadmin or your mysql editor is called "db_forum_mgt".
7. To create tables. run command, "php artisan migrate"
8. To add dummy data to tables, run command, "php artisan db:seed"
9. To clear all cache, run command, "php artisan optimize"
10. Finally run the command, "php artisan serve"
11. Open the project on browser using "http://localhost:8000". It will display default laravel page.
