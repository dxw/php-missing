<?php

namespace Missing;

class Ints
{
    // Ported directly from active_support's Inflector#ordinal
    // https://github.com/rails/rails/blob/master/activesupport/lib/active_support/inflector/methods.rb#L289
    public static function ordinal($number)
    {
        # abs_number = number.to_i.abs
        $abs_number = abs((int) $number);

        # if (11..13).include?(abs_number % 100)
        if (in_array($abs_number, [11, 12, 13])) {
            # "th"
            return 'th';
            # else
        } else {
            # case abs_number % 10
            switch ($abs_number % 10) {
                # when 1; "st"
                case 1: return 'st';
                # when 2; "nd"
                case 2: return 'nd';
                # when 3; "rd"
                case 3: return 'rd';
                # else    "th"
                default: return 'th';
                # end
            }
            # end
        }
    }

    // Ported directly from active_support's Inflector#ordinalize
    // https://github.com/rails/rails/blob/master/activesupport/lib/active_support/inflector/methods.rb#L313
    public static function ordinalize($number)
    {
        # "#{number}#{ordinal(number)}"
        $ord = self::ordinal($number);

        return "{$number}{$ord}";
    }
}
