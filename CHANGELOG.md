# Changelog
All notable changes to this project will be documented in this file.

iumio Framework
================

@ Let's create more simply

## [BETA RELEASE]


## [0.6.0] - 2017-WW-WW
### Added
- New design for iumio Installer
- Exception in JSONListener Class
- [SmartyEngineTemplate] Disable or enable cache for a specific render when the cache option is available (Dynamic content)
- Add shutdown error handler for E_ERROR
- Add error map : Get the error name according to error level
- Parse error handler is managing by iumio 
- Add new register smarty plugin template with .json
- Added status for service
- Add date for each Engine Autoloader ClassMap 
- Add exception for invalid route parameters type (object and array is not allowed)
- Animation on iumioTaskbar for first event
- Add all pdo driver list to create and edit database
- Add service manager (Graphic)
- Add Compilation Module for FCM
- Add new Renderer class
- Test if return activity is instance of Renderer
- dev.log and prod.log (each line correspond to an error)

### Fixed
- Bug with no rewrite url
- Responsive sidebar
- Bug #B-0000002
- Bug #B-0000003
- Taskbar font-size reduce button
- array_combine notice


### Edited
- Change iumio Manager permissions and publish status display
- Change iumioTaskBar cache, assets and status menu
- Change design of iumio Exception
- Change service to component with different call
- Exception will be event 
- Set password field for user password database
- Change initial.json to framework.config.json
- Logo of iumio Framework
- Change Routing extension from .rt to .irt
- Route for generation app will be unique (appname)



### Removed
- Language installation
- iumio Framework Life
- Remove ex-iumio Installer
- dev.log.json and prod.log.json
- Main OS intalled
- Main user installed
- Smarty fix for iumio Taskbar


## [0.5.0] - 2017-10-09
### Added
- Store the iumio TaskBar position in localStorage(Open, Close)
- Apply PSR2
- Apply PSR4
- Hosts configuration (allowed/denied) in iumio FGM
- Add new icon for iumio FGM sidebar menu
- Add icon for iumio Taskbar elements
### Fixed
- Minor bugs
- Responsive taskbar
- Real time logs on taskbar
### Edited
- Change iumio Classes or method name to apply PSR2
- Editied iumio Exception views to remove element in navbar


## [0.4.9] - 2017-09-28
### Added
- New RT parameters scalar type (int, string, float, bool)
- Add production log in iumio Manager
- Add new iumio autoloader Manager to manage the autoloader generator
- Add iumio Framework language installation in initial.json
### Fixed
- Minor bugs
### Edited
- Change structure of elements directory


## [0.4.8] - 2017-09-08
### Added
- New service system with services.json
- Add php mailer library
- Add infinite scroll on get Unlimited logs
### Fixed
- Color of iumio TaskBar Logs
- iumio TaskBar Logs in current session
- Bug with logs json created with EngineAutoloader
### Removed
- Google fonts for iumio Manager


## [0.4.7] - 2017-09-01
### Fixed
- Project with no .htaccess
- iumio Taskbar : missing logs feature 

## [0.4.6-f1] - 2017-08-31
### Modified version 

## [0.4.6] - 2017-08-31
### Added
- Export and import an iumio App
- Add methods request allowed in RT language
- Add new php extension required (zip)
- Add new item on iumio TaskBar : Request in realtime 
### Fixed
- some bugs

## [0.4.5] - NO BUILD
## [0.4.4] - NO BUILD
## [0.4.3] - NO BUILD

## [0.4.2] - 2017-08-28
### Added
- New Js Routing system
- Rt Class in Rt.js
- Add visibility in .rt file (public, private, disabled)
- Create a json map for JS Routing 
- iumio Routing Manager CLI added
- Add base app - iumio Framework Service
- add dev and prod visibility in apps.json (Base App)
### Fixed
- iumio Taskbar List
- iumio multiple Base App 
### Removed
- Remove visibility in Dev.php and Prod.php


## [0.4.1] - 2017-08-24
### Added
- Check on iumio installer if required libs are installed
- Download all js components
- Add uninstall script components
### Fixed
- iumio Manager Sidebar white
- iumio Installer (Bad url redirection)
### Removed
- Remove All js components

## [0.4.0] - 2017-08-18
### Fixed
- Show url End of iumio framework installer
### Edited
- Readme
### Removed
- Smarty library -- via composer
- Bootstrap library -- via composer
- Font awesome library -- via composer
- jQuery library -- via composer

## [0.3.9] - 2017-08-17
### Fixed
- .htaccess 301 Failed with POST data
### Added
- UIDIE (Unique Identifier of iumio Exception) for each exception
- Add new item for each exception
- Create new interface for Exception
- Create a new interface to look with UIDIE, the exception details
- New iumio Universal installer (Tools Class - installer.php changed to be setup.php)
### Edited
- Change name of [iumioUltimaCore, iumioUltimaMaster, iumioUltima, iumioEngineAutoloader] to [iumioCore, MasterCore, GlobalCoreService, EngineAutoloader]
- Change name of constant "ENVIRONMENT" to "IUMIO_ENV"
- Change layout exception name
- Change disposition of 'LastLog'
### Removed
- Remove iumio installer SE
- Remove composer.phar and composer.json


## [0.3.8] - 2017-07-22
### Fixed
- Bug fixed : Copy Assets to Prod
 
## [0.3.7] - 2017-07-22
### Fixed
- Bug fixed : iumio Prod.php Route generate
- Reduce CSS and JS source code 

## [0.3.6] - 2017-07-17
### Fixed
- Bug fix for iumioUltimaMaster::generateRoute
- Implement iumioUltima Class
- Reduce CSS and JS source code 


## [0.3.5] - 2017-07-03
### Fixed
- Bug fixed on publish assets with iumio Manager (FGM)


## [0.3.4] - 2017-07-01
### Fixed
- Fix missing environment for css, js, image web assets
- Others minor fixes

## [0.3.3] - 2017-06-27
### Added
- Create routing manager
- Show details of route
### Removed
- Remove a routing file

## [0.3.2] - 2017-06-26
### Edited
- Change routing checker with callable activity detection
- Improve route matches

## [0.3.1] - 2017-06-23
### Fixed
- Minor fixes.

## [0.3.0] - 2017-06-22
### Added
- Enable and disable one app.
- Prefix on app url.
- Prefix verification

### Changed
- AppCore::registerApps()
- iumioUltimaCore::dispatching()
- App Template 

### Removed
- Remove Routing Register in .rt file.


[BETA RELEASE]: https://github.com/iumio-team/iumio-framework/
[0.3.0]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.0
[0.3.1]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.1
[0.3.2]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.2
[0.3.3]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.3
[0.3.4]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.4
[0.3.5]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.5
[0.3.6]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.6
[0.3.7]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.7
[0.3.8]: https://github.com/iumio-team/iumio-framework/releases/tag/v0.3.8