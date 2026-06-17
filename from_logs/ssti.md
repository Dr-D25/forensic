# SSTI (Server-Side Template Injection)

### Запрос 1
```http
/asyncrenderer/%7B%7Burl%7D%7D?clientId={{id}}&timeout=500&wiki=xwiki
```
Действие: использование {{url}}, {{id}} в параметрах – вероятная SSTI в XWiki (рендеринг шаблонов с серверной стороны).
