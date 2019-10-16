# Demo Crawler

You need to install [docker](https://docs.docker.com/get-started/) and [git](https://git-scm.com/) first.

## Getting started

```bash
# clone source code
git clone git@github.com:nvmphuong/coccoc-test.git coccoc-test

cd coccoc-test
docker-compose up -d
docker exec  nhp_api composer install
docker exec  nhp_api php artisan migrate

```

- Wait few minutes and open frontend by your docker ip
- Api hosted at port 8888

### Run test
```
docker exec  nhp_api ./vendor/bin/phpunit
```


