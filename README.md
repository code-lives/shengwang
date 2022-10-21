
### Config

| 参数名字     | 类型   | 必须 | 说明                                                            |
| ------------ | ------ | ---- | --------------------------------------------------------------- |
| appId       | string | 是   | 百度小程序 appkey                                               |
| appCertificate    | string | 是   | 百度小程序支付


### token 账号是字符串类型

```php

$data= \ShengWangSdk\ShengWang::init($config)->getToken('channelName:频道','account:账号字符串','role等级: 1-2数字','tokenExpire：3600','privilegeExpire:3600');
```

