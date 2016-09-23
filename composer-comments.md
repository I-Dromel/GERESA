# composer.json comments
Since the JSON format don't allow embedding comments, this file holds them.
They are structure just like the composer.json tree.

You can find more informations about Composer at https://getcomposer.org/.  
The structure of this file is documented at https://getcomposer.org/doc/04-schema.md. 

## config
### process-timeout
Set to 3600 seconds because checking PHPCompatibility can take quite some time!

### bin-dir
Since our vendor directory is part of the repository and we
don't want binaries distributed, we moved them to a developer's
directory that is not part of the distribution.

## require
### composer/installers
This enables to automatically install this module in Dolibarr's ```htdocs/custom``` directory by requiring it in Dolibarr's ```composer.json```.

### [parsedown](http://parsedown.org/)
Used to render the Markdown readme in the module's about page.

## require-dev
### [php-parallel-lint](https://github.com/JakubOnderka/PHP-Parallel-Lint)
PHP code linter used to check syntax correctness.

### php-console-highlighter
Optional dependency for php-parallel-lint enabling console highlighting.

### [phpunit](https://phpunit.de/)
Unit testing framework.

### [php_codesniffer](https://github.com/squizlabs/PHP_CodeSniffer)
Used to check our coding style.

### phpunit-selenium
PHPUnit runner for Selenium functional testing.

### [php-compatibility](https://github.com/squizlabs/PHP_CodeSniffer)
PHP Codesniffer Coding Standard to check our code's compatibility with various PHP versions.

## scripts
You can run these using ```composer [command]```.
Since these are run from within composer, they use the binaries from bin-dir,
not the host ones, making the process more reliable.

## check
A shortcut to run all the checks at once.

### compat_workaround
This is a workaround https://github.com/wimg/PHPCompatibility/issues/102

### check_compat
If TRAVIS_PHP_VERSION is set, we use it. This way we only check the Travis' matrix
PHP version when running this on Travis. Else we set it to all supported PHP versions
(5.3 to 7.0).

### check_style
We use a custom PSR2 ruleset allowing tab indents.

### test
Run PHPunit and Selenium tests.

### test_unit
Run PHPunit tests.

### test_functional
Run Selenium tests.

### TODO: dev_doc
Builds Doxygen developer documentation.

### release
Release a module.
Runs all checks and tests, remove dev dependencies, builds a zip ready to be published and restores dev dependencies.

### build
Builds a module ZIP.  
Requires Perl.

### tx*
Manages transifex.  
Requires the ```tx``` client.

### git_hooks_*
Installs or remove the [provided](dev/git-hooks) GIT hooks.

### git*
Provided GIT hooks callbacks.