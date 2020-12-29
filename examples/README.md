# Application

The [Application](./Application.php) acts as some kind of front controller and
uses an application processor.

The application is not aware of concrete implementation details of processor

## Controller (Not MVC Controller!)

[Application controller](./ApplicationController.php) executes application logic

Logic depend on the field of use

- Front-Controller
- middleware handler
- use-case handler
- interactor handler
- http controller
- cli controller
- etc.  

## Application processor

[Application processor](./ApplicationProcessor.php) is aware of concrete environment like HTTP, CLI.

Furthermore, application processor is able to deal with frameworks
like DI-Containers, routers, event dispatches, API-Clients etc.
