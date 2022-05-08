# forum-management
1. Install xampp and check xampp is working properly.
2. Please check your php version. It should be v7.x but not v8.
3. Open up a Windows command prompt or git bash.
4. Change into the directory where your xampp/htdocs is located in the command prompt.
5. Move to "master" branch in Github(https://github.com/Pradeepika-dev/forum-management) and clone the project to your xampp/htdocs. Run command, "git clone https://github.com/Pradeepika-dev/forum-management.git"   
7. Create the database is called "db_forum_mgt" in phpmyadmin or your mysql editor.
8. To create tables. run the command, "php artisan migrate"
9. To add dummy data to tables, run the command, "php artisan db:seed"
10. To clear all cache, run the command, "php artisan optimize"
11. Finally run the command, "php artisan serve"
12. Open the project on browser using "http://localhost:8000". It will display default laravel page.
