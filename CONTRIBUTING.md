# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/:vendor/:package_name).

## Branches

- Use a separate **feature branch**. 
  
- The branch name follow following convention: `feature/:short-feature-description` or `feature/{:issue-number}-{:short-feature-description}`

## Commits

Follow conventional commits angular convention!

Extract of Conventional Commits Summary:

The commit contains the following structural elements, to communicate intent to the consumers of your library:

- **fix:** a commit of the type fix patches a bug in your codebase (this correlates with PATCH in semantic versioning).
- **feat:** a commit of the type feat introduces a new feature to the codebase (this correlates with MINOR in semantic versioning).
- **BREAKING CHANGE:** a commit that has a footer BREAKING CHANGE:, or appends a ! after the type/scope, 
  introduces a breaking API change (correlating with MAJOR in semantic versioning). A BREAKING CHANGE can be part of commits of any type.
- footers other than BREAKING CHANGE: <description> may be provided and follow a convention similar to git trailer format.
- A scope may be provided to a commit’s type, to provide additional contextual information 
and is contained within parenthesis, e.g., feat(parser): add ability to parse arrays.

Additional types are not mandated by the Conventional Commits specification, and have no implicit effect in semantic versioning 
(unless they include a BREAKING CHANGE).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - Check the code style with ``$ composer check-style`` and fix it with ``$ composer fix-style``.

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful and follows commit convention. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.


## Running Tests

``` bash
$ composer test
```


**Happy coding**!
