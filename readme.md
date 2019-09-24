
<span style="color:green">LEAF CMS LARAVEL</span>

Leaf CMS Laravel is a web application for management content, posts, comments from all users in which any user can manage their own posts, comments, update their profile, create comments on other posts, etc.

Builted with <span style="color:red">Laravel V 5.8.</span> it contains a system based on CMS (Content Management System) with arquitecturer MVC (Modal View Controller) using Facebook Login as an asset to make look as a real web page. It performe as:


- CMS, where an admin can manipulate and controlate the data without others users (subscribers) seeing what happen under the hood.
- Middlewares for prevent the intent to navigate to urls that only access admins, also for check the total users online.
- An easy admin/users dashboard to see the all content of the account, builted with Google Chars.
- Language Change System. EN and ES
- System to retrieve the forgot password using Mailtrap.
- Sort post through Categories.
- Contact form using phpMailer.
- The upload profile pictures from every user.
- A module search for tags post.
- CSS media querys for Iphone 6S.

## Run the app

- Install the composer packages. `composer install`
- Install the npm packages. `npm install`
- Create your own database, preferly Mysql.
- Copy the .env.example file. `cp .env.example .env`
- Add database information, to the .env file, allowing Laravel to connect to the database.
- Add your Facebook Login credentials in the .env file, to connect to facebook developers. 
- Generate an app encryption key, Laravel requires you to have an app encryption key. `php artisan key:generate`
- Migrate the database. `php artisan migrate`

Plus: For use the app as Admin, create your own admin user with Tinker or database viewer in the table Users, and put 'Admin' as a role.