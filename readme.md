
Look the [Website](https://leafproyect.000webhostapp.com/).
## Leaf Shared

Leaf Shared is a web application for management content, posts, comments from all users in which any user can manage their own posts, comments, update their profile, create comments on other posts, etc.

Builted with <span style="color:red">Laravel V 5.8.</span> it contains a system based on CMS (Content Management System) with arquitecture MVC (Modal View Controller) using Facebook, Google, Linkedin as an asset to Login, making look as a real web page. It performe as:


- CMS, where an admin can manipulate and controlate the data without others users (subscribers) seeing what happen under the hood.
- Policies, Gates and Middlewares for prevent the intent to navigate to urls that only access admins, also for check the total users online.
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
- Add your Facebook, Google, Linkedin Login credentials in the .env file. 
- Generate an app encryption key, Laravel requires you to have an app encryption key. `php artisan key:generate`
- Migrate the database. `php artisan migrate`
- The app as Admin: create your own admin user with Tinker or database viewer in the table Users, and put 'Admin' as a role.
- Config HomeController.php, put your admin email in the function adminPosts() to retrieve and show first your posts.

## Screenshots
Login.
![](public/images/Screen%20Shot%202019-10-08%20at%2011.40.52%20AM.png)
Admin, management posts.
![](public/images/Screen%20Shot%202019-10-08%20at%2012.52.42%20PM.png)
Home page, as a guest.
![](public/images/Screen%20Shot%202019-10-08%20at%2012.40.49%20PM.png)
Comments about a post.
![](public/images/Screen%20Shot%202019-10-08%20at%201.19.59%20PM.png)
