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
* create a new class test
```
    vendor/bincodecept generate:cept acceptance classname
```


## Install git hooks
cp hooks/* .git/hooks/
