# Nginx Configuration for Small Business Website

## Overview

This Nginx configuration is designed for a small business website that serves as an online platform for administrators and users. The site includes a chat feature, a configuration zone, an admin zone, and a status page.

## Features

### 1. Chat
The chat feature enables real-time communication among users, fostering quick discussions and seamless collaboration.

### 2. Configuration Zone
The configuration zone allows users to customize their experience within the application. Users can adjust preferences, notifications, and other settings based on their individual needs.

### 3. Admin Zone
Dedicated to administrators, this section facilitates user management, rol assignments, and access to essential administrative tools, providing efficient oversight and control over internal operations.

### 4. Status
The status page offers a snapshot of the current system status. It may include crucial metrics, error reports, and real-time updates to keep users informed about the system's health and performance.

## Styling Customization

You can customize the colors in your styles using CSS variables. Edit the `style.css` file and find the `:root` block to update the color variables.

```css
:root {
        --background-color: #e0e8f4;
        --container-background-color: #d6e6f5;
        --container-border-color: #a8c0da;
        --button-background-color: #4d8cc1;
        --button-hover-color: #306992;
        --link-color: #1a496b;
        --link-hover-color: #1e5799;
}
```

## Database Configuration

This project requires a database to store chat messages and user information. Here are the SQL statements to create the necessary tables:

```sql
mysql -u root -p
CREATE DATABASE NAME ## Create the Database user and Instances
GRANT ALL PRIVILEGES ON DATABASENAME * TO 'user'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
use usernamedatabase ## The user is what they put in the creation of Instances and User.

CREATE TABLE chat_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL
);

INSERT INTO usuarios (nombre, contrasena, rol) VALUES ('name', 'password', 'admin'); 

## Nginx Server Configuration

The Nginx server is configured to listen on port 80, with the root directory set to `/var/www/proyec`. PHP scripts are passed to the FastCGI server, and specific parameters are adjusted to enhance performance and functionality.

### Installation

1. **Install Nginx:**
    - On Debian/Ubuntu:
      ```bash
      sudo apt update
      sudo apt install nginx
      ```

    - On CentOS:
      ```bash
      sudo yum install epel-release
      sudo yum install nginx
      ```

2. **Install PHP:**
    - On Debian/Ubuntu:
      ```bash
      sudo apt install php-fpm
      ```

    - On CentOS:
      ```bash
      sudo yum install epel-release
      sudo yum install php-fpm
      ```

3. **Configure Nginx:**
    - Copy the provided Nginx configuration to the appropriate location.
    - Adjust the root directory and server_name as needed.
    - Restart Nginx:
      ```bash
      sudo systemctl restart nginx
      ```

4. **Configure PHP:**
    - Ensure PHP-FPM is running:
      ```bash
      sudo systemctl start php-fpm
      sudo systemctl enable php-fpm
      ```

### PHP Configuration

Make sure PHP is configured correctly, with the appropriate version and FastCGI settings.

### Additional Notes

- Ensure that SSL is properly configured for secure communication.
- Customize error handling and logging based on your preferences.

## Additional Script

The following script is provided for your reference:

```nginx
# Your Additional Nginx Configuration

# You should look at the following URL's in order to grasp a solid understanding
# of Nginx configuration files in order to fully unleash the power of Nginx.
# https://www.nginx.com/resources/wiki/start/
# https://www.nginx.com/resources/wiki/start/topics/tutorials/config_pitfalls/
# https://wiki.debian.org/Nginx/DirectoryStructure
#
# In most cases, administrators will remove this file from sites-enabled/ and
# leave it as a reference inside sites-available where it will continue to be
# updated by the Nginx packaging team.
#
# This file will automatically load configuration files provided by other
# applications, such as Drupal or Wordpress. These applications will be made
# available underneath a path with that package name, such as /drupal8.
#
# Please see /usr/share/doc/nginx-doc/examples/ for more detailed examples.

# Default server configuration
#
server {
    listen 80;
    listen [::]:80;

    # SSL configuration
    #
    # listen 443 ssl default_server;
    # listen [::]:443 ssl default_server;
    #
    # Note: You should disable gzip for SSL traffic.
    # See: https://bugs.debian.org/773332
    #
    # Read up on ssl_ciphers to ensure a secure configuration.
    # See: https://bugs.debian.org/765782
    #
    # Self-signed certs generated by the ssl-cert package
    # Don't use them in a production server!
    #
    # include snippets/snakeoil.conf;

    root /var/www/name;

    # Add index.php to the list if you are using PHP
    index index.html index.htm index.php;

    server_name domain.com;

    location / {
        # First attempt to serve request as file, then
        # as a directory, then fall back to displaying a 404.
        try_files $uri $uri/ =404;
    }

    # pass PHP scripts to FastCGI server
    #
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param PHP_VALUE "upload_max_filesize = 100M \n post_max_size=100M";
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param HTTP_PROXY "";
        fastcgi_intercept_errors off;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
        fastcgi_connect_timeout 300;
        fastcgi_send_timeout 300;
        fastcgi_read_timeout 300;
    }

    # deny access to .htaccess files if Apache's document root
    # concurs with nginx's one
    #
    location ~ /\.ht {
        deny all;
    }
}

# Virtual Host configuration for example.com
#
# You can move that to a different file under sites-available/ and symlink that
# to sites-enabled/ to enable it.
#
#server {
#    listen 80;
#    listen [::]:80;
#
#    server_name example.com;
#
#    root /var/www/example.com;
#    index index.html;
#
#    location / {
#        try_files $uri $uri/ =404;
#    }
#}
```

## License

This project is licensed under the [MIT License](LICENSE.md). See the `LICENSE.md` file for details.

## Contact

For further information or inquiries, please contact us at [latervictormc@gmail.com].
