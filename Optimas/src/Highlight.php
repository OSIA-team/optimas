<?php

/**
 * Bittr
 *
 * @license
 *
 * New BSD License
 *
 * Copyright (c) 2017, ghostff community
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *      1. Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer.
 *      2. Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the
 *      documentation and/or other materials provided with the distribution.
 *      3. All advertising materials mentioning features or use of this software
 *      must display the following acknowledgement:
 *      This product includes software developed by the ghostff.
 *      4. Neither the name of the ghostff nor the
 *      names of its contributors may be used to endorse or promote products
 *      derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY ghostff ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL GHOSTFF COMMUNITY BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */
 
declare(strict_types=1);

namespace Dbug;

class Highlight
{

    private static $highlight = [];
    private static $start_line = 0;
    private static $show_line_number = false;

    private static $body = '';
    private static $cast = '#038C8C';
    private static $null = '#0000FF';
    private static $bool = '#D8C300';
    private static $self = '#1D6F0C';
    private static $quote = '#FF0000';
    private static $class = '#000000';
    private static $parent = '#1D6F0C';
    private static $number = '#A4AC21';
    private static $comment = '#FEA500';
    private static $tag_open = '#F00000';
    private static $keywords = '#008000';
    private static $function = '#0000FF';
    private static $variable = '#2071ED';
    private static $constant = '#8C4D03';
    private static $tag_close = '#F00000';
    private static $operators = '#0000FF';
    private static $semi_colon = '#000000';
    private static $parenthesis = '#038C8C';
    private static $return_type = '#E3093F';
    private static $php_function = '#6367A7';
    private static $curly_braces = '#7F5217';
    private static $parameter_type = '#E3093F';
    private static $square_bracket = '#F46164';
    private static $custom_function = '#A611AA';
    private static $multi_line_comment = '#FEA500';


    private static $self_ptrn = '/(?<!\$|\w)self/';
    private static $cast_ptrn = '/(\(\s*(int|string|float|array|object|unset|binary|bool)\s*\))/';
    private static $bool_ptrn = '/\b(?<!\$)true|false/i';
    private static $null_ptrn = '/\b(?<!\$)(null)\b/';
    private static $class_ptrn = '/(class|extends|implements)\s+([\w\\\]+)/';
    private static $quote_ptrn = '/(.*?)(?<!\\\\)(\'|(?<!((style|class|label)=))")/';
    private static $parent_ptrn = '/(?<!\$|\w)parent\b/';
    private static $number_ptrn = '/(?<! style="color:#)\b(\d+)\b/';
    private static $comment_ptrn = '/(?<!http:|https:)\/\/.*|(?<!color:)#.*/';
    private static $variable_ptrn = '/\$(\$*)[a-zA-Z_]+[a-zA-Z0-9_]*/';
    private static $function_ptrn = '/(?<=\s|^)(function)(?=\s)/';
    private static $constant_ptrn = '/\b(?<!(\#|\$))([A-Z_]+)(?!<\/\w+>\()\b/';
    private static $keywords_ptrn = '/(?<!\$|\w)((a(bstract|nd|rray\s*(?=\()|s))|
        (c(a(llable|se|tch)|l(ass(?!\=")|one)|on(st|tinue)))|
        (d(e(clare|fault)|ie|o))|
        (e(cho|lse(if)?|mpty|nd(declare|for(each)?|if|switch|while)|val|x(it|tends)))|
        (f(inal|or(each)?))|
        (g(lobal|oto))|
        (i(f|mplements|n(clude(_once)?|st(anceof|eadof)|terface)|sset))|
        (n(amespace|ew))|
        (p(r(i(nt|vate)|otected)|ublic))|
        (re(quire(_once)?|turn))|
        (s(tatic|witch))|
        (t(hrow|r(ait|y)))|
        (u(nset(?!\s*\))|se))|
        (__halt_compiler|break|list|(x)?or|var|while))\b/';
    private static $operators_ptrn = '/((?<! (style|class))\=|\.|\!|\+|\%|-(?!\w+:)|(?<!https|http)[^a-z+]:|\@|\||\?|&gt;|&lt;|&amp;)/';
    private static $semi_colon_ptrn = '/(?<![&lt|&gt|&amp]);/';
    private static $parenthesis_ptrn = '/\(|\)/';
    private static $return_type_ptrn = '/(?<=\:\<\/span\>)\s*(?:\<\w+ \w+="\w+:#\w+" \w+="\w+"\>\?\<\/\w+\>)*(string|bool|array|float|int|callable|void)/';
    private static $curly_braces_ptrn = '/[\{\}]/';
    private static $parameter_type_ptrn = '/(?<!\w)(string|bool|array|float|int|callable)\s*(?=\<span style="[\w:#-;]+" class="(variable|operators)"\>[\$||&amp;])/';
    private static $square_bracket_ptrn = '/\[|\]/';
    private static $multi_line_comment_ptrn = '/\/\*|\*\//';

    /**
     * check and highlight user defined  or php pre defined function
     *
     * @param string $code
     * @return string
     */
    private static function isFunction(string $code): string
    {
        return preg_replace_callback('/([n|t]?.?)\b(\w+)(?=\s\(|\()/', function (array $arg): string
        {
            $back = $arg[1];
            $func = $arg[2];
            if ($back == 'n ' || $back == 't;' || $back == ':')
            {
                return $back . '<span style="color:' . self::$custom_function .'" class="custom_function">' . $func . '</span>';
            }
            elseif (function_exists($func))
            {
                return $back . '<span style="color:' . self::$php_function .'" class="php_function">' . $func . '</span>';
            }
            else
            {
                return $arg[0];
            }
        }, $code);
    }


    /**
     * displays line numbers
     *
     * @param bool $switch
     * @param int $start_line
     */
    public static function showLineNumber(bool $switch, int $start_line = 0)
    {
        self::$start_line = $start_line;
        self::$show_line_number = $switch;
    }


    /**
     * adds html attributes to line table > tr
     *
     * @param int $line
     * @param array $attributes
     * @param bool $override
     */
    public static function setHighlight(int $line, array $attributes = [], bool $override = false)
    {
        if ($override)
        {
            self::$highlight = [];
        }
        self::$highlight[$line] = $attributes;
    }


    /**
     * @param string $name
     * @param string $default
     * @return int (2 used $name, 1 used $default, 0 none, -1 no theme.json file found)
     */
    public static function theme(string $name, string $default = null): int
    {
        $theme_file = __DIR__ . DIRECTORY_SEPARATOR . 'theme.json';
        if (file_exists($theme_file))
        {
            $_theme = file_get_contents($theme_file);
            $theme = json_decode($_theme, true);

            $return_int = isset($theme[$name]) ? 2 : (isset($theme[$default]) ? 1 : 0);
            if ($return_int !== 0)
            {
                $properties = ($return_int == 2) ? $theme[$name] : $theme[$default];
                foreach ( $properties as $property => $styles)
                {
                    $style = '';
                    if (isset($styles['color']))
                    {
                        $style = $styles['color'] . ';';
                        unset($styles['color']);
                    }

                    $styles = array_map(function(string $keyword, string $attributes): string {
                        return $keyword . ':' . $attributes . ';';
                    }, array_keys($styles), $styles);
                    
                    

                    $style .= implode($styles);
                    self::$$property = $style;
                }
            }
            return $return_int;
        }
        return -1;
    }


    /**
     * processes supplied text
     *
     * @param string $code
     * @return string
     */
    private static function format(string $code): string
    {
        $code = str_replace(
            ['<?php', '<?=', '?>', '\\\\'],
            ['PP_PHP_LONG_TAG_OPEN', 'PP_PHP_SHORT_TAG_OPEN', 'PP_PHP_CLOSE_TAG', 'PP_PHP_DOUBLE_BACK_SLASH'],
            $code
        );

        $code = htmlspecialchars($code, ENT_NOQUOTES);
        $new_code = null;
        $start_number = self::$start_line;

        $is_MLQ = false; #is_multi_line_quote
        $is_MLC = false; #is_multi_line_comment
        $QO = false; #quote_opened
        $QT = null; #qoute_type
        $line_number = self::$show_line_number;

        foreach (explode("\n", $code) as $lines)
        {

            $lines = preg_replace(
                self::$semi_colon_ptrn,
                '<span style="color:' . self::$semi_colon .'" class="semi_colon">$0</span>',
                $lines
            );
            
            $SLC = false;
            $start_number++;

            $gui_line_number = ($line_number) ? '<td>' . $start_number . '</td><td>' : '<td>';

            if (isset(self::$highlight[$start_number]))
            {
                $highlight_attr = '';
                foreach (self::$highlight[$start_number] as $key => $values)
                {
                    $highlight_attr .= ' ' . $key . '="' . $values . '"';
                }
                $gui_highlight = '<tr' . $highlight_attr . '>';
            }
            else
            {
                $gui_highlight = '<tr>';
            }

            $new_code .= $gui_highlight . $gui_line_number;

            if ( ! $is_MLQ)
            {
                if ($is_MLC)
                {
                    $lines = '<font style="color:' . self::$multi_line_comment .'" class="strip multi_line_comment">' . $lines . '</font>';
                }

                $lines = preg_replace_callback(self::$multi_line_comment_ptrn, function(array $matches) use (&$is_MLC): string
                {
                    if ($matches[0] == '*/')
                    {
                        $is_MLC = false;
                        return $matches[0] . '</font>';
                    }
                    else
                    {
                        $is_MLC = true;
                        return '<font style="color:' . self::$multi_line_comment . '" class="strip multi_line_comment">' . $matches[0];
                    }

                }, $lines);
            }

            if ( ! $is_MLC)
            {
                if ($is_MLQ)
                {
                    $lines = '<font style="color:' . self::$quote .'" class="strip quote">' . $lines . '</font>';
                }

                $lines = preg_replace_callback(self::$quote_ptrn, function(array $matches) use (&$QO, &$is_MLQ, &$SLC, &$QT): string
                {
                    if ($QO)
                    {
                        if ($QT == $matches[2])
                        {
                            $is_MLQ = false;
                            $QO = false;
                            return $matches[0] . '</font>';
                        }
                        return $matches[0];
                    }
                    else
                    {
                        if ((strpos($matches[1], '//') !== false) || (strpos($matches[1], '#') !== false) || $SLC)
                        {
                            $SLC = true;
                            return $matches[0];
                        }
                        $QO = true;
                        $QT = $matches[2];
                        $is_MLQ = true;
                        return $matches[1] . '<font style="color:' . self::$quote . '" class="strip quote">' . $matches[2];
                    }

                }, $lines);
            }

            $lines = self::isFunction($lines);
            $lines = preg_replace([
                self::$operators_ptrn,
                self::$number_ptrn,
                self::$class_ptrn,
                preg_replace('/\s\s+/', '', self::$keywords_ptrn),
                self::$function_ptrn,
                self::$variable_ptrn,
                self::$cast_ptrn,
                self::$constant_ptrn,
                self::$parenthesis_ptrn,
                self::$curly_braces_ptrn,
                self::$square_bracket_ptrn,
                self::$null_ptrn,
                self::$self_ptrn,
                self::$parent_ptrn,
                self::$bool_ptrn,
                self::$comment_ptrn,
                self::$parameter_type_ptrn,
                self::$return_type_ptrn,
                '/PP_PHP_LONG_TAG_OPEN/',
                '/PP_PHP_SHORT_TAG_OPEN/',
                '/PP_PHP_CLOSE_TAG/',
                '/PP_PHP_DOUBLE_BACK_SLASH/'
            ], [
                '<span style="color:' . self::$operators .'" class="operators">$0</span>',
                '<span style="color:' . self::$number .'" class="number">$0</span>',
                '<span style="color:' . self::$class .'" class="number">$0</span>',
                '<span style="color:' . self::$keywords .'" class="keyword">$0</span>',
                '<span style="color:' . self::$function .'" class="function">$1</span>',
                '<span style="color:' . self::$variable .'" class="variable">$0</span>',
                '<span style="color:' . self::$cast .'" class="cast">$0</span>',
                '<span style="color:' . self::$constant .'" class="constant">$0</span>',
                '<span style="color:' . self::$parenthesis .'" class="parenthesis">$0</span>',
                '<span style="color:' . self::$curly_braces .'" class="curly_braces">$0</span>',
                '<span style="color:' . self::$square_bracket .'" class="square_bracket">$0</span>',
                '<span style="color:' . self::$null .'" class="null">$0</span>',
                '<span style="color:' . self::$self .'" class="self">$0</span>',
                '<span style="color:' . self::$parent .'" class="parent">$0</span>',
                '<span style="color:' . self::$bool .'" class="bool">$0</span>',
                '<span style="color:' . self::$comment .'" class="strip comment">$0</span>',
                '<span style="color:' . self::$parameter_type .'" class="parameter_type">$0</span>',
                '<span style="color:' . self::$return_type .'" class="return_type">$0</span>',
                '<span style="color:' . self::$tag_open .'" class="tag long">&lt;?php</span>',
                '<span style="color:' . self::$tag_open .'" class="tag short">&lt;?=</span>',
                '<span style="color:' . self::$tag_close .'" class="tag clode">?></span>',
                '\\\\\\',
            ],$lines);
            $new_code .= $lines . '</td></tr>';

        }

        $new_code .= '<tr class="last-map"><td></td><td></td></tr>';
        $new_code = str_replace(['\"', '\\\'', '  '], ['"', '\'', '&nbsp;&nbsp;'], $new_code);

        $style = '.strip font,.strip span{color:inherit !important;all:initial !important;all:unset !important}';
        $pretty = '<table style="' . self::$body .'">'. $new_code . '</table><style>' . $style . '</style>';

        return $pretty;
    }


    /**
     * check if code is a file or a string then renders accordingly
     *
     * @param string $code
     * @return string
     */
    public static function render(string $code): string
    {
        return self::format($code);
    }
}
