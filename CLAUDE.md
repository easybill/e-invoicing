# CLAUDE.md - E-Invoicing SDK Development Instructions

## Project Overview

This SDK provides comprehensive support for reading and writing electronic invoicing documents in compliance with the EN16931 standard and its various extensions (CIUS) such as:
- XRechnung (German standard)
- ZUGFeRD/Factur-X
- PEPPOL BIS Billing
- Other European e-invoicing standards

The SDK supports both UBL (Universal Business Language) and CII (Cross Industry Invoice) formats.

## Development Standards

### PHP Coding Standards

1. **Strict Types**: ALWAYS include `declare(strict_types=1);` at the beginning of every PHP file
2. **Final Classes**: All classes MUST be declared as `final` to prevent inheritance issues
3. **Code Style**: Follow PSR-2, Symfony, and PhpCsFixer standards (configured in `.php-cs-fixer.dist.php`)
4. **Type Safety**: Use proper type declarations for all parameters, return types, and properties

### Code Quality Tools

- **Linting**: PHPStan at MAX level (`composer lint`)
- **Testing**: PHPUnit 12 (`composer test`)
- **Code Formatting**: PHP CS Fixer (`composer cs-fix`)

## Development Workflow

### Before Starting Development

1. **Start Docker Containers** (required for testing):
   ```bash
   composer start
   ```

2. **Stop Docker Containers** when done:
   ```bash
   composer stop
   ```

### Making Changes

1. **Understand existing patterns**: Review similar code in the codebase before implementing new features
2. **Follow conventions**: Match existing code style, naming patterns, and architectural decisions
3. **Implement changes**: Write your code following all standards mentioned above
4. **Test your changes**:
   ```bash
   composer test
   ```
5. **Check code quality**:
   ```bash
   composer lint
   ```
6. **Fix code style**:
   ```bash
   composer cs-fix
   ```

### Post-Change Verification

ALWAYS run these commands after making changes (unless explicitly instructed otherwise):
1. `composer test` - Ensure all tests pass
2. `composer lint` - Verify no PHPStan errors at MAX level
3. `composer cs-fix` - Fix the code style if necessary

## Architecture Principles

### SOLID Principles
- **Single Responsibility**: Each class should have one reason to change
- **Open/Closed**: Classes should be open for extension but closed for modification
- **Liskov Substitution**: Derived classes must be substitutable for their base classes
- **Interface Segregation**: Many client-specific interfaces are better than one general-purpose interface
- **Dependency Inversion**: Depend on abstractions, not concretions

### DRY (Don't Repeat Yourself)
- Avoid code duplication
- Extract common functionality into reusable components
- Use inheritance and composition appropriately

## Code Generators

The project includes code generators in `tools/Generators/` for maintaining EN16931 code lists as PHP enums:

- `CountryCodeEnumGenerator.php`
- `CurrencyCodeEnumGenerator.php`
- `DocumentTypeEnumGenerator.php`
- `ReferenceQualifierEnumGenerator.php`
- `UnitCodeEnumGenerator.php`
- `EASEnumGenerator.php`

### Running Generators

```bash
composer generate
```

### Important Generator Rules

1. **Preserve Deprecated Values**: When regenerating enums, NEVER remove old values that are no longer in the input code list
2. **Mark as Deprecated**: Instead of removing, mark old values as `@deprecated`
3. **Provide Alternatives**: Always specify an alternative when marking something as deprecated
   - If an alternative exists, reference it: `@deprecated Use VALUE_NEW instead`
   - If no alternative exists, explicitly note it: `@deprecated No alternative available`

## Developer Experience (DX) Guidelines

### Type Safety First
Prioritize strong typing to improve developer experience:

**BAD Example**:
```php
// Avoid requiring developers to format strings manually
$document->issueDate = '2024-01-15'; // String format required
```

**GOOD Example**:
```php
// Use proper type objects that serialize correctly
$document->issueDate = new \DateTime('2024-01-15');
// The object will be serialized to the correct format automatically
```

### Use Enums for Fixed Values
Instead of magic strings, use the provided enums:
```php
use easybill\eInvoicing\Enums\CurrencyCode;
use easybill\eInvoicing\Enums\DocumentType;

$document->documentCurrencyCode = CurrencyCode::EUR;
$document->invoiceTypeCode = DocumentType::COMMERCIAL_INVOICE;
```

### Clear Method Names and Documentation
- Use descriptive method and property names
- Add PHPDoc comments for complex logic
- Provide usage examples in documentation

## Testing Guidelines

### Test Structure
- Unit tests for individual components
- Integration tests for document generation and reading
- Use test validators in `tests/Validators/` for schema validation

### Running Tests
```bash
# Run all tests
composer test

# Run specific test file
./vendor/bin/phpunit tests/Integration/UBLTest.php

# List available tests
./vendor/bin/phpunit --list-tests
```

## Project Structure

```
src/
├── CII/           # Cross Industry Invoice models and documents
├── UBL/           # Universal Business Language models and documents
├── Enums/         # EN16931 code list enums
├── Handlers/      # Serialization handlers
├── Dtos/          # Data Transfer Objects
├── Reader.php     # Main reader for unknown XML formats
├── Transformer.php # Document transformation utilities
└── ConfiguredSerializer.php # JMS Serializer configuration

tests/
├── Integration/   # Integration tests
└── Validators/    # Schema and CIUS validators

tools/
└── Generators/    # Code list enum generators
    └── Input/     # Input files for generators
```

## Important Reminders

1. **Never skip verification**: Always run `composer test`, `composer cs-fix` and `composer lint` after changes
2. **Docker is required**: Tests won't work properly without Docker containers running
3. **Maintain backward compatibility**: Use deprecation instead of removal
4. **Focus on DX**: Make the SDK easy and intuitive to use
5. **Type safety**: Prefer typed objects over primitive types where sensible

## Common Tasks

### Updating Code Lists
1. Update the input file in `tools/Generators/Input/`
2. Run `composer generate`
3. Review generated changes
4. Ensure deprecated values are preserved with proper annotations

### Implementing a New Handler
1. Create handler in `src/Handlers/`
2. Implement necessary interfaces
3. Register in `ConfiguredSerializer`
4. Add tests for the handler
5. Document usage in README if user-facing
