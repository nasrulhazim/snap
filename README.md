## About Snap

Snap allow developer to create scaffold Laravel project.

### Installation

Ensured to install MailHog and set your `/etc/hosts` for MailHog:

```plaintext
127.0.0.1 mailhog
```

Clone this repository in your user home directory.

```bash
git clone https://github.com/nasrulhazim/snap 
```

Then make sure to load the script from `.zshrc` or `.profile`

```bash
export SNAP_PATH=$HOME/snap
export PATH=$PATH:$SNAP_PATH
```

### Usage

I'm assuming you already installed the Composer, NPM, Yarn, and Git.

Navigate to your common project directory and create new project with snap:

```bash
snap project-name
```

This will essentially create a new project with the following packages installed and configured accordingly:

- cleaniquecoders/laravel-observers
- cleaniquecoders/laravel-uuid
- lab404/laravel-impersonate
- livewire/livewire
- owen-it/laravel-auditing
- spatie/laravel-activitylog
- spatie/laravel-medialibrary
- spatie/laravel-permission
- yadahan/laravel-authentication-log
- barryvdh/laravel-debugbar

### Configuration

Additional manual configuration are required at the moment.

#### Configure `helpers

Open up `composer.json`, add the following in `autoload` section:

```json
...
"files": [
    "support/helpers.php"
]...
```

#### Configure `.env`

You need to at least configure the email configuration:

```env
MAIL_FROM_ADDRESS="noreplay@your-domain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## License

The snap is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
