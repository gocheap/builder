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

For now `builder` supports 9 scripts:

| Script    | Number of versions | Latest version | Downloading & Extracting   | Installation |
|-----------|--------------------|----------------|----------------------------|--------------|
| Wordpress ![](https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/200px-WordPress_logo.svg.png) | 142                | 4.3.1          | ✓                          | ✓            |
| Joomla ![](https://upload.wikimedia.org/wikipedia/ru/a/ab/Joomla_logo.png) | 62                 | 3.4.4          | ✓                          | ╳            |
| Drupal ![](https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Druplicon.vector.svg/100px-Druplicon.vector.svg.png) | 101                | 7.39           | ✓                          | ╳            |
| Typo3 ![](https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Logo_TYPO3.svg/200px-Logo_TYPO3.svg.png) | 78                 | 7.4.0          | ✓                          | ╳            |
| Magento ![](https://upload.wikimedia.org/wikipedia/commons/1/1d/Magento.png) | 45      | 1.9.2.1      | ✓                          | ╳            |
| OsCommerce ![](https://upload.wikimedia.org/wikipedia/commons/5/51/Oscommerce_logo.gif)   | 8           | 2.3.4   | ✓                          | ╳            |
| OpenCart ![](https://upload.wikimedia.org/wikipedia/commons/c/ca/Opencart.png)   | 13     | 2.1.0.0     | ✓                          | ╳            |
| Coppermine ![](https://upload.wikimedia.org/wikipedia/commons/2/27/Coppermine_logo.png)    | 18       | 1.5.38     | ✓                          | ╳            |
| Gallery ![](https://upload.wikimedia.org/wikipedia/ru/6/6f/Gallery_logo.png)    | 10       | 3.0.9     | ✓                          | ╳            |

# Community help
To implement all installation processes for every script I need a lot of man-hours. So every addition that improve installation process of any supported script is a big event and will be meet well.
