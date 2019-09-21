### Instructions
1. Edit `database.ini` and replace the `username` and `password` values with
   the username and password for your MySQL user.
2. `chmod +x install.sh` to make `install.sh` executable.
3. Run `install.sh` with `sudo ./install.sh`. This will install the website
   to `/var/www`.

The install script allows the site to be edited normally (i.e. without using
`sudo`) in the repository directory. If you update these files, remember to
run the install script before testing, or the changes will not be live.

### Repository structure
- `install.sh`: shell script to install files. Run with `sudo ./install.sh`.
- `setup.sql`: SQL script to initialize database. Run `mysql` and type `source setup.sql` at prompt.
- `html/`: Public site, deployed to `/var/www/html` by `install.sh`
- `php/`: PHP includes, deployed to `/var/www/php` by `install.sh`
