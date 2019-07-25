<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * To re-generate this file run `make test`
 *
 *
 * @generated SignedSource<<9c467773332189ef35d34936f09c6977>>
 */
namespace Slack\Hack\JsonSchema\Tests\Generated;
use namespace Slack\Hack\JsonSchema;
use namespace Slack\Hack\JsonSchema\Constraints;

type TAnyOfValidator1 = ?string;

<<Codegen>>
final class AnyOfValidator1AnyOf0 {

  private static bool $coerce = false;

  public static function check(mixed $input, string $pointer): string {
    $typed = Constraints\StringConstraint::check($input, $pointer, self::$coerce);

    return $typed;
  }
}

<<Codegen>>
final class AnyOfValidator1 extends JsonSchema\BaseValidator<TAnyOfValidator1> {

  public static function check(
    mixed $input,
    string $pointer,
  ): TAnyOfValidator1 {
    if ($input === null) {
      return null;
    }

    $constraints = vec[
      class_meth(AnyOfValidator1AnyOf0::class, 'check'),
    ];
    $errors = vec[
    ];

    foreach ($constraints as $constraint) {
      try {
        $output = $constraint($input, $pointer);
        return $output;
      } catch (JsonSchema\InvalidFieldException $e) {
        $errors = \HH\Lib\Vec\concat($errors, $e->errors);
      }
    }

    $error = shape(
      'code' => JsonSchema\FieldErrorCode::FAILED_CONSTRAINT,
      'constraint' => shape(
        'type' => JsonSchema\FieldErrorConstraint::ANY_OF,
      ),
      'message' => "failed to match any allowed schemas",
    );

    $output_errors = vec[$error];
    $output_errors = \HH\Lib\Vec\concat($output_errors, $errors);
    throw new JsonSchema\InvalidFieldException($pointer, $output_errors);
  }

  <<__Override>>
  final protected function process(): TAnyOfValidator1 {
    return self::check($this->input, $this->pointer);
  }
}
