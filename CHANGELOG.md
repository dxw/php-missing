# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- `Ints::monthName()` will return the name of the corresponding month for integers 1-12.
- PHP8.2 and up support

### Changed
- `Dates::parse()` now returns a `Dxw\Result\Result` object rather than an array.
- `Dates::strftime()` now requires format to be specified in the datetime format used by [DateTimeImmutable](https://www.php.net/manual/en/datetimeimmutable.createfromformat.php). This is a breaking change
- `Dates::parseStrptime()` now requires an array in the format returned by [date_parse_from_format](https://www.php.net/manual/en/function.date-parse-from-format.php) rather than the deprecated [strptime](https://www.php.net/manual/en/function.strptime.php). Although this method is undocumented, it is publicly available so this constitutes a breaking change

### Removed
- Support for PHP7 versions below 7.4 and PHP8 versions below 8.2

## [Earlier Releases]

Releases up to and including `v1.0.0` predate this changelog.
