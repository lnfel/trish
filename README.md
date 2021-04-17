## Angono Baranggay Services

### Installation
- Install development tools: [Git](https://git-scm.com/download/win), [XAMPP](https://www.apachefriends.org/download.html), [Sublime](https://www.sublimetext.com/3), [Node JS](https://nodejs.org/en/download/)

### XAMPP
- After installing XAMPP we can proceed with the steps below

### Node Setup
- After installing Node JS we can proceed with the steps below

### Git Setup
- Open cmd and and test if git works, enter:
```
git
```
- Next enter the following code with your credentials:
```
git config --global user.name "Your Name Here"
git config --global user.email "Your Email Here"
```
- This will allow us to gain access to github repositories
- Navigate to "C:\xampp\htdocs" by entering the following line of code in cmd:
```
cd C:\xampp\htdocs
```
- Clone the project
```
git clone https://github.com/lnfel/trish.git
```
- Now our project directory path would be "C:\xampp\htdocs\trish"
- Continue now with composer setup

### Composer Setup
- After installing XAMPP, we will need [composer](https://getcomposer.org/download/) for our laravel project.
- Right click on "My Computer" or "This PC" (if using windows 10)
- Click "Properties" -> "Advanced system settings" -> "Environment variables"
- On "User variables for Admin", select the "Path" variable
- Click "Edit" -> "New"
- Then paste "C:\xampp\php", Finally press "OK" then close other windows.
- Close all cmd instances to load and refresh php path
- Open another cmd then enter:
```
php --version
```
- If it showed the current php version installed we are good to continue to our composer installation
- Enter the following lines in sequence (you can read more about the installation guide on composer downloads [page](https://getcomposer.org/download/)):
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --filename="composer" --install-dir="C:\xampp\htdocs\trish"
```
- Last line of code above installs composer.phar in our project directory and the --filename option changes its name to "composer"
- Navigate back to the project directory:
```
cd C:\xampp\htdocs\trish
```
- Then run `php composer install` to install our laravel project dependencies

### Installing Laravel
- We haven't installed laravel yet, just enter this code while inside the project directory:
```
php composer global require laravel/installer
```
- Generate application key:
```
php artisan key:generate
```
- Laravel will automatically override APP_KEY value in our .env file at the root of our project folder
- Generate Laravel Passport Keys for the API:
```
php artisan passport:keys --force
```

### Installing Node dependencies
- Enter this code while inside the project directory:
```
npm install
```

### XAMPP Setup
- Going back to xampp and configuring its settings for the project
- Open XAMPP control panel
- On the control panel, click on Apache Config button then select "Apache (httpd.conf)", it will open that file in your system's default text editor (notepad).
- Search for:
```
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">
```
- Change it to "C:/xampp/htdocs/the project folder path/public":
```
DocumentRoot "C:/xampp/htdocs/trish/public"
<Directory "C:/xampp/htdocs/trish/public">
```
- This will allow us to navigate to the project using "http://localhost" on the browser

### Database
- On xampp control panel "Start" Apache and MySQL
- On the browser navigate to "http://localhost/phpmyadmin"
- Click "New"
- Enter database name (db_trish) then select "utf8_bin" on the next input selector and hit "Create" button
- Database schema is already created so, just run on cmd:
```
php artisan migrate
```

### Importing Database from MySQL schema
- On xampp control panel "Start" Apache and MySQL
- On the browser navigate to "http://localhost/phpmyadmin"
- Click "New"
- Enter database name (db_trish) then select "utf8_bin" on the next input selector and hit "Create" button
- Click on the newly created database -> Click on "Import" button
- Import the database schema on `trish/database/data.sql` the hit "GO" button at the lower right corner
- This will load the database table and columns schema

### Generate sample data using Factory
- Run `php artisan tinker` then use the code below:
```
// Generate 10 rows of Slots
factory(App\Slot::class, 10)->create();

// Generate 1 User, note: password is password
factory(App\User::class)->create();

// Generate 1 Admin, note: password is password
factory(App\Admin::class)->create();
```

### Seeding Data
- cd to the project folder:
```
cd C:\xampp\htdocs\trish
```
While inside the project folder you can do the following:

Delete all database tables
```
php artisan db:wipe
```

Run migrations, this will re-populate database tables
```
php artisan migrate
```

Seed the important tables in database such as services table.
The following line of codes will populate Service, Purpose and Requirement tables respectively. They should be run in order or else we would have errors regarding foreign keys.
```
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=PurposeSeeder
php artisan db:seed --class=RequirementSeeder
```

All the steps for seeding data can be done in a single command:
```
php artisan db:rezero
```
This will run db:wipe, migrate and db:seed commands respectively.