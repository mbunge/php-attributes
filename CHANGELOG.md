# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

## [3.0.0](https://github.com/mbunge/php-attributes/compare/v2.1.0...v3.0.0) (2020-12-29)


### ⚠ BREAKING CHANGES

* **autoloader:** Separate factory from LoaderHandler.

### Features

* Add copyright ([69d2fd3](https://github.com/mbunge/php-attributes/commit/69d2fd32b5a54f775d870e4dd0d85533fc4f0530))
* **autoloader:** Separate factory from LoaderHandler. ([cc2cafe](https://github.com/mbunge/php-attributes/commit/cc2cafe255d05f06e1508f24239395e53b27a425))
* **dev-workflow:** Configure excludes when installing the package. ([9ede894](https://github.com/mbunge/php-attributes/commit/9ede894b2b88059497783745f1fd6bba9c0b2ef4))
* **example:** Add more documentation ([4d7890f](https://github.com/mbunge/php-attributes/commit/4d7890f1d57c34d6b0230aa3430ee6f04d985e74))
* **examples:** Show case presenters with auto-subscribing listeners. ([796942c](https://github.com/mbunge/php-attributes/commit/796942c58ffb317c85d89e3d88a0998f5450e158))
* Update copyright ([a6b3e4d](https://github.com/mbunge/php-attributes/commit/a6b3e4db4b55be051ddde187c10349975b4d3cb1))
* **presenter:** [#9](https://github.com/mbunge/php-attributes/issues/9) Present attributes. Add optional type guard. ([bd047dc](https://github.com/mbunge/php-attributes/commit/bd047dc80ad02761d653f12116849cbd08adefb7))


### Bug Fixes

* **dev-workflow:** Require PHP 8 minor version. ([0018329](https://github.com/mbunge/php-attributes/commit/0018329b7a843ac82c8ce161c384dfac3120e75a))

## [2.1.0](https://github.com/mbunge/php-attributes/compare/v2.0.0...v2.1.0) (2020-12-28)


### Features

* **handler:** [#3](https://github.com/mbunge/php-attributes/issues/3) Restrict handler execution with filter decorator ([4f1c0f8](https://github.com/mbunge/php-attributes/commit/4f1c0f8ee62b586b8bf72ebf425185ecd40e1145))


### Bug Fixes

* **handler:** Update class version information ([2d788e3](https://github.com/mbunge/php-attributes/commit/2d788e3518516a7b1c245265c2598bffef4378ba))

## [2.0.0](https://github.com/mbunge/php-attributes/compare/v1.2.0...v2.0.0) (2020-12-28)


### ⚠ BREAKING CHANGES

* **handler:** Resolve and return all attributes from class name as \Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto
* **handler:** Refactor handler related classes into `\Mbunge\PhpAttributes\Resolver` namespace.

### Features

* **dev-workflow:** Merge develop branch when run deployment. ([61ee086](https://github.com/mbunge/php-attributes/commit/61ee0865c0b84e44bbf421cabd78c9573115b826))
* **dev-workflow:** Restrict deployments to master branch. ([d1aca0e](https://github.com/mbunge/php-attributes/commit/d1aca0e7872e9d3ea47de6b4dab62567e49a9786))
* **dev-workflow:** Separatly run unit and integration tests. ([acde87f](https://github.com/mbunge/php-attributes/commit/acde87f9cf841cc40baf173be9ef2ff0d22f9cc6))
* **docs:** Update Readme with new handler ([fbd47e9](https://github.com/mbunge/php-attributes/commit/fbd47e9a136e93402d3381b3b3e71365ea39a910))
* **handler:** Get all attributes from class name. ([62e039c](https://github.com/mbunge/php-attributes/commit/62e039c82094c545903fcc997f30ef135390b422))
* **handler:** Refactor handler related classes into `\Mbunge\PhpAttributes\Resolver` namespace. ([3c50f13](https://github.com/mbunge/php-attributes/commit/3c50f13bc6cea1bae18dc98d9540ebe1fb026bab))
* **handler:** Resolve and return all attributes from class name as \Mbunge\PhpAttributes\Resolver\ResolvedAttributeDto ([38db836](https://github.com/mbunge/php-attributes/commit/38db83680f703d46f01372ed152ec0fafd4d8405))


### Bug Fixes

* **docs:** Use github code highlighting in readme ([63e3f27](https://github.com/mbunge/php-attributes/commit/63e3f2778c8d28da9427c740ede5bfeb5c2fc634))
* **handler:** Instantiate AttributeDto within factory ([a3aed10](https://github.com/mbunge/php-attributes/commit/a3aed10fd26b451b6d8b970e8f2732a4baa59a17))
* **handler:** Only use allowed Reflections as Union types. ([2543934](https://github.com/mbunge/php-attributes/commit/254393455bd8bd6c9fa87c1d59e6758fb4209389))

## [1.2.0](https://github.com/mbunge/php-attributes/compare/v1.1.1...v1.2.0) (2020-12-28)


### Features

* **dev-workflow:** Run tests before release or deployment step. ([bd992e7](https://github.com/mbunge/php-attributes/commit/bd992e7941e1645cc1ea26ed5cd6668163896dba))
* **docs:** Update detailed usage, add feature overview and add development instructions. ([2aa91e2](https://github.com/mbunge/php-attributes/commit/2aa91e2d3c482ffc8dcf2434bfb3626364833562))
* Allow passing customer attribute handler to class loader decorator factory and return AttributeResolverInterface in attribute handler factory. ([95dd26d](https://github.com/mbunge/php-attributes/commit/95dd26dc5ac9eea1a3bb1e4c852f3f6f5c5aacf1))
* Document version details to library classes ([add84c9](https://github.com/mbunge/php-attributes/commit/add84c99a13f0330f4683a690d8ff8923035a281))
* Handle class loader within an own command and avoid massive overload of boilerplate code to use autoload feature ([ce77b34](https://github.com/mbunge/php-attributes/commit/ce77b34db7be0b09ebfa9e764f67bd3ad6e363fc))
* Use AttributeResolverInterface as contract instead of AttributeResolver. The contract allows extension of custom implementations of attribute handler without extending attribute handler ([4d91912](https://github.com/mbunge/php-attributes/commit/4d91912b978d5d277869fc6b945c5762b2ced76f))

### [1.1.1](https://github.com/mbunge/php-attributes/compare/v1.1.0...v1.1.1) (2020-12-27)


### Bug Fixes

* Replace old description ([ae899f0](https://github.com/mbunge/php-attributes/commit/ae899f02e9f5ef935b674bea1c0dca8e6fa322b1))

## [1.1.0](https://github.com/mbunge/php-attributes/compare/v1.0.0...v1.1.0) (2020-12-27)


### Features

* Add deployment script ([29adf92](https://github.com/mbunge/php-attributes/commit/29adf92a06c19ed8f02a444631e58f8652f3d195))
* Use standard-version for package release ([8302d30](https://github.com/mbunge/php-attributes/commit/8302d30d990f412285c2b8df98bd2fcb9fb42441))

## 1.0.0 (2020-12-27)


### Features

* Add autogenerated changelog ([8260804](https://github.com/mbunge/php-attributes/commit/82608044e7c32e5b5fbfad213ef9aaf0d199bab7))
* Apply attributes after class has been loaded ([cbe62ef](https://github.com/mbunge/php-attributes/commit/cbe62eff9025ad38039f519b22bc726e8017a643))
* Rename namespace to :vendor/:package pattern. ([d397638](https://github.com/mbunge/php-attributes/commit/d39763836d69cfbe5ec683ae7a262d59a7bd299b))
* Update license information. Fix author. ([3fcd061](https://github.com/mbunge/php-attributes/commit/3fcd0618a4517b723e29621a1c9a8fc848d47b47))
* Update readme ([7d6fba7](https://github.com/mbunge/php-attributes/commit/7d6fba72b458f9a578f9a2a08af2b119f0e62b1e))
* Update readme and add version ([65ea547](https://github.com/mbunge/php-attributes/commit/65ea547b24b0641840ab0d10669b0114b8ce9cc2))


### Bug Fixes

* Fix order of topics in readme ([ff1dd39](https://github.com/mbunge/php-attributes/commit/ff1dd39ad6e63834e779e50918e18c13fabaf3b7))
