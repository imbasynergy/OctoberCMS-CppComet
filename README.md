 
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/CppComet/Lobby?utm_source=share-link&utm_medium=link&utm_campaign=share-link)
 
![CppComet](https://comet-server.com/img/CppComet.png)
    
# Project page and docs

[Project page](http://comet-server.com/)


# Documentation and examples

Documentation in [Russian](http://comet-server.com/doku.php/ru) and [English](http://comet-server.com/doku.php/en) languages

## Demo access to server API

For testing CppComet without install on vps  you can use [free cloud service with same api](https://comet-server.com/). 
In the all examples I will use demonstration access from [comet-server.com](http://comet-server.com) for those who could not or were too lazy to deploy the server on their vps.

For demo access use credentials:
```
Login: 15
Password:lPXBFPqNg3f661JcegBY0N0dPXqUBdHXqj2cHf04PZgLHxT6z55e20ozojvMRvB8
Host: app.comet-server.ru
```

Example of connecting to [cometQL api](http://comet-server.com/doku.php/en:comet:cometql) from console using mysql-client:
```
mysql -h app.comet-server.ru -u15 -plPXBFPqNg3f661JcegBY0N0dPXqUBdHXqj2cHf04PZgLHxT6z55e20ozojvMRvB8 -DCometQL_v1 --skip-ssl
```


License
----

Apache License Version 2.0 