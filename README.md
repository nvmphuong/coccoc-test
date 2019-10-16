# Demo Crawler

You need to install [docker](https://docs.docker.com/get-started/) and [git](https://git-scm.com/) first.

## Getting started

```bash
# clone source code
git clone git@github.com:nvmphuong/coccoc-test.git coccoc-test

cd coccoc-test
docker-compose up -d
docker exec nhp_api composer install
docker exec nhp_api php artisan migrate

```

- Wait few minutes and open frontend by your docker ip
- Api hosted at port 8888

### Run test
```
docker exec  nhp_api ./vendor/bin/phpunit
```
 Could we crawl hot video items from this source https://www.tiktok.com/vi/trending in a similar way? How and/or Why?
 - I checked html structure on tiktok page , i think it is posible to crawl video in this page.I saw video link display like this
 ```
 "contentUrl":"https://v16.tiktokcdn.com/d6838777b1c4ecd0a935a574855e9028/5da721cd/video/n/v0102/9841a6a7b16d40958839e9eced3ef8f6/?a=1180&br=1728&cr=0&cs=0&dr=3&ds=3&er=&l=20191016075722010115133128165CD3C8&lr=tiktok&rc=M2Q7cnN0Onc0cDMzNDgzM0ApaDY0Mzg6ZDw5N2k6ZDRkOGdgZHMyZDFkY2JfLS1hLzRzczVfMWMxMjIyLjEyXzJeM146Yw%3D%3D"
 ```
 - We can use regular expression like i used to crawl nhaccuatui.com. This is my regex
 ```
 #"contentUrl":"(.+?)"#is
 ```

