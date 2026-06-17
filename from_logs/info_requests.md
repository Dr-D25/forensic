# 10. Информационные запросы / сканирование (не атаки)

### Запрос 1
```http
?tree=_class,jobs[name,url,builds[number,result,artifacts[fileName,relativePath]]{0,5},jobs[name,url,builds[number,result,artifacts[fileName,relativePath]]{0,5},jobs[name,url,builds[number,result,artifacts[fileName,relativePath]]{0,5}]{0,250}]{0,250}]{0,250}
```
Действие: запрос к Jenkins API для получения структуры сборок (информационный).

### Запрос 2
```http
graphql?query=%7Bversion+repositoriesOrError%7B__typename+...+on+RepositoryConnection%7Bnodes%7Bname+location%7Bname%7D+pipelines%7Bname%7D%7D%7D%7D%7D
```
Действие: GraphQL-запрос для получения версии и репозиториев.

### Запрос 3
```http
/autodiscover.json?@zdi/Powershell
```
Действие: тестовый запрос (возможно, сканирование).

### Запрос 4
```http
/%3Cpath-to-image%3E
```
Действие: запрос с плейсхолдером.
