## Codeception useful commands
* start Selenium with Chrome
```
    make docker.chrome
```
* start Selenium with Firefox
```
    make docker.firefox
```
* run tests
```
    vendor/bin/codecept run -vvv acceptance --env chrome
```
* run one particular test
```
    vendor/bin/codecept run -vvv acceptance --env chrome classname.php
```
* see the all the run option
```
    vendor/bin/codecept run -help
```

## Install git hooks
cp hooks/* .git/hooks/
