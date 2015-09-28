# builder
A tool for installing and setting up different scripts written in PHP.

# Purpose
Did you even want to simplify new installations of popular PHP scripts like Wordpress or Joomla? Me too! Now I can present you a tool that fully installs some popular script with one command in terminal and configuration file:
``` sh
php ..\bin\builder build wordpress -c ..\wordpress-config.json -vv
```

And configuration file is
``` json
{
    "version": "4.3.1",
    "database": {
        "host": "localhost",
        "username": "root",
        "password": "12345",
        "database": "wordpress"
    },
    "blog_title": "Another blog on wordpress",
    "admin": "Administrator",
    "admin_email": "some@email.com",
    "password": "12345"
}
```

# Usage
``` sh
bin/builder build [options] [--] <name> [<version>]
```

Arguments:
* name - What script do you want install?
* version - What version of script do you want install?

Options:
* `-c`, `--configuration=CONFIGURATION` - You can pass name of file that contains information about script (supports different file formats)

# Supported scripts

For now `builder` supports 3 scripts:

| Script    | Number of versions | Latest version |
|-----------|--------------------|----------------|
| Wordpress | 142                | 4.3.1          |
| Joomla    | 62                 | 3.4.4          |
| Drupal    | 101                | 7.39           |
