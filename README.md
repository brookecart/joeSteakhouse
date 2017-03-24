Installing this Boilerplate Wordpress Box
=========================================

1. Clone the repo `git clone https://github.com/omnius45467/wp-boilerplate.git`
2. Create the wp-config.php file (copy the wp-config.sample.php)
3. You will need to edit the Apache Config for development pursposes. This file is located in the VM(vagrant) at 
   `/etc/apache2/sites-availible/000-default.conf`
   You will need to change the line that contains `/var/www/html` to `/var/www/`.
   This will point your browser to the "root" of your project.
4. Database creds:
    * Database: `wordpress`
    * Username: `root`
    * Password: `1234`
    * Host: `localhost`
5. `vagrant up`
6. Navigate to `http://localhost:8080`
7. You should be prompted to set up the site details now
8. You're off and running... 
    
