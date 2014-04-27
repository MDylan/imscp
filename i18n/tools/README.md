# How to update i-MSCP translation files

## System Requirements

  1. gettext
  2. Transifex client

In order, to be able to update translation files, you must have the gettext
tool and the Transifex client installed on your system.

## Installation process (Debian/Ubuntu)

### As root user:

  1. Installing gettext

    # aptitude install gettext

  2. Installing Transifex client

    # aptitude install python-setuptools
    # easy_install --upgrade transifex-client

### As normal user:

  3. Creating the Transifex configuration file

    $ touch ~/.transifexrc

And putting the following content in it:

    [https://www.transifex.com]
    hostname = https://www.transifex.com
    password = PASSWORD
    token =
    username = USERNAME

Of course, you have to change the PASSWORD and USERNAME with your own Transifex
login data.

## Updating translation files

### As normal user:

  1. Run the "makemsgs" shell script to get all translation strings from the
    php, phtml and xml files within the i18n/iMSCP.pot file

    $ cd {YOUR_WORKING_COPY}/i18n/tools
    $ sh ./makemsgs

  2. Push the new iMSCP.pot on Transifex

    $ cd {YOUR_WORKING_COPY}/i18n
    $ tx push -s

**Note:** The *.po files will be automatically updated by Transifex and no more
checking is needed from your side.

  3. Getting updated *.po files from Transifex

    $ cd {YOUR_WORKING_COPY}/i18n
    $ tx pull -af

## Compiling translation files

### As normal user

  1. Use the shell script "compilePo" to compile all *.po files

    $ cd {YOUR_WORKING_COPY}/i18n/tools
    $ sh ./compilePo

Once it's done, you commit the resulting files in your git repository.