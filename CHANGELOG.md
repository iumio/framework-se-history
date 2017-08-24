# Changelog
All notable changes to this project will be documented in this file.

iumio Framework
================

@ The next generation of PHP Frameworks

## [BETA RELEASE]

## [0.4.1] - 2017-08-18
### Added
- Check on iumio installer if required libs are installed
### Fixed
- iumio Manager Sidebar white

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