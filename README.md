
### Config

| 参数名字     | 类型   | 必须 | 说明                                                            |
| ------------ | ------ | ---- | --------------------------------------------------------------- |
| appId       | string | 是   | 应用编号                                               |
| appCertificate    | string | 是   | 证书编号


### token 账号是字符串类型

```php

$data= \ShengWangSdk\ShengWang::init($config)->getToken('channelName:频道','account:账号字符串','role等级: 1-2数字','tokenExpire：3600','privilegeExpire:3600');
```

