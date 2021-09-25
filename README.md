## About Snap

Snap allow developer to create scaffold Laravel project.

### Installation

Clone this repository in your user home directory.

```bash
cd ~
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

## License

The snap is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).