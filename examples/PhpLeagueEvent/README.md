# Event Application

## Usage

Execute bootstrap.php.

```
$ php bootstrap.php
```

## Concept

A listener subscribes to an event via [SubscribeTo attribute](./Attribute/SubscribeTo.php).

[EventAttributePresenter](./EventAttributePresenter.php) resolves SubscribeTo attribute and realize subscription 
of autoloaded listeners.

In this case [DomainWithEventsController](./Controller/DomainWithEventsController.php) used to be a 
listener and automatically subscribes to [InitApplicationEvent](./Event/InitApplicationEvent.php) after initiation.

[League\Event](https://event.thephpleague.com/) framework manages subscriptions and event dispatching.

[EventDispatcherApplicationProcessor](./EventDispatcherApplicationProcessor.php) uses [League\Event](https://event.thephpleague.com/) 
framework to dispatch events and execute controllers.


