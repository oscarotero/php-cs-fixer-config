<?php
namespace My;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

abstract class PhpCsFixerConfig
{
    public static function create(string ...$paths): Config
    {
        $config = self::createConfig();

        if (empty($paths)) {
            return $config;
        }

        return $config->setFinder(self::createFinder(...$paths));
    }

    private static function createFinder(string ...$paths): Finder
    {
        $finder = Finder::create()
            ->files()
            ->name('*.php');

        foreach ($paths as $path) {
            if (substr($path, 0, 1) === '!') {
                $finder->exclude(substr($path, 1));
            } else {
                $finder->in($path);
            }
        }

        return $finder;
    }

    private static function createConfig(): Config
    {
        return (new Config())->setRules([
                '@PSR2' => true,
                'array_syntax' => ['syntax' => 'short'],
                'blank_line_after_namespace' => true,
                'blank_line_after_opening_tag' => false,
                'blank_line_before_statement' => [
                    'statements' => ['return'],
                ],
                'braces' => [
                    'allow_single_line_closure' => false,
                ],
                'cast_spaces' => true,
                'class_definition' => [
                    'single_line' => false,
                    'single_item_single_line' => true,
                    'multi_line_extends_each_single_line' => true,
                ],
                'class_keyword_remove' => false,
                'combine_consecutive_unsets' => true,
                'concat_space' => false,
                'declare_equal_normalize' => [
                    'space' => 'single',
                ],
                'declare_strict_types' => false,
                'elseif' => true,
                'encoding' => true,
                'full_opening_tag' => true,
                'function_declaration' => true,
                'function_typehint_space' => true,
                'single_line_comment_style' => [
                    'comment_types' => ['hash'],
                ],
                'header_comment' => false,
                'heredoc_to_nowdoc' => true,
                'include' => true,
                'indentation_type' => true,
                'line_ending' => true,
                'linebreak_after_opening_tag' => true,
                'lowercase_cast' => true,
                'constant_case' => [
                    'case' => 'lower',
                ],
                'lowercase_keywords' => true,
                'mb_str_functions' => false,
                'method_argument_space' => true,
                'class_attributes_separation' => [
                    'elements' => ['method' => 'one'],
                ],
                'native_function_casing' => true,
                'native_function_invocation' => false,
                'new_with_braces' => true,
                'no_blank_lines_after_class_opening' => true,
                'no_blank_lines_after_phpdoc' => false,
                'no_blank_lines_before_namespace' => false,
                'no_closing_tag' => true,
                'no_empty_comment' => true,
                'no_empty_phpdoc' => true,
                'no_empty_statement' => true,
                'no_extra_blank_lines' => [
                    'tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block'],
                ],
                'no_leading_import_slash' => true,
                'no_leading_namespace_whitespace' => true,
                'no_mixed_echo_print' => [
                    'use' => 'echo',
                ],
                'no_multiline_whitespace_around_double_arrow' => true,
                'multiline_whitespace_before_semicolons' => false,
                'no_short_bool_cast' => true,
                'no_singleline_whitespace_before_semicolons' => true,
                'no_spaces_after_function_name' => true,
                'no_spaces_around_offset' => true,
                'no_spaces_inside_parenthesis' => true,
                'no_trailing_comma_in_list_call' => true,
                'no_trailing_comma_in_singleline_array' => true,
                'no_trailing_whitespace' => true,
                'no_trailing_whitespace_in_comment' => true,
                'no_unneeded_control_parentheses' => true,
                'no_unused_imports' => true,
                'no_useless_else' => true,
                'no_useless_return' => true,
                'no_whitespace_before_comma_in_array' => true,
                'no_whitespace_in_blank_line' => true,
                'normalize_index_brace' => true,
                'not_operator_with_space' => false,
                'not_operator_with_successor_space' => false,
                'object_operator_without_whitespace' => true,
                'ordered_class_elements' => false,
                'ordered_imports' => true,
                'php_unit_fqcn_annotation' => true,
                'php_unit_strict' => false,
                'phpdoc_add_missing_param_annotation' => true,
                'phpdoc_align' => true,
                'phpdoc_no_access' => true,
                'phpdoc_no_alias_tag' => [
                    'replacements' => ['property-read' => 'property', 'property-write' => 'property', 'type' => 'var'],
                ],
                'phpdoc_no_empty_return' => true,
                'phpdoc_no_package' => true,
                'phpdoc_no_useless_inheritdoc' => true,
                'phpdoc_order' => true,
                'phpdoc_return_self_reference' => true,
                'phpdoc_scalar' => true,
                'phpdoc_separation' => false,
                'phpdoc_single_line_var_spacing' => true,
                'phpdoc_summary' => false,
                'phpdoc_to_comment' => true,
                'phpdoc_trim' => true,
                'phpdoc_types' => true,
                'phpdoc_var_without_name' => true,
                'pow_to_exponentiation' => false,
                'increment_style' => [
                    'style' => 'pre',
                ],
                'protected_to_private' => true,
                'return_type_declaration' => true,
                'semicolon_after_instruction' => true,
                'short_scalar_cast' => true,
                'single_blank_line_at_eof' => true,
                'single_blank_line_before_namespace' => false,
                'single_class_element_per_statement' => true,
                'single_import_per_statement' => true,
                'single_line_after_imports' => true,
                'single_quote' => true,
                'space_after_semicolon' => true,
                'standardize_not_equals' => true,
                'strict_param' => false,
                'switch_case_semicolon_to_colon' => true,
                'switch_case_space' => true,
                'ternary_operator_spaces' => true,
                'ternary_to_null_coalescing' => false,
                'trailing_comma_in_multiline' => [
                    'elements' => ['arrays'],
                ],
                'trim_array_spaces' => true,
                'unary_operator_spaces' => true,
                'visibility_required' => true,
                'whitespace_after_comma_in_array' => true,
            ]);
    }
}
