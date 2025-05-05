<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;


class ValidKeywords implements Rule
{
    protected $keywordsNum;

    /**
     * Constructor for the ValidKeywords class.
     * 
     * Initializes the $keywordsNum property via dependency injection.
     * 
     * @param int $keywordsNum
     */
    public function __construct(int $keywordsNum)
    {
        $this->keywordsNum = $keywordsNum;
    }
    /**
     * Check the number of accepted words for the Keyword field.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * 
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (count(explode(',', $value)) <= $this->keywordsNum) ?: false;
        
    }

    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message():string
    {
        return 'لا يجوز أن يكون عدد الكلمات المفتاحية أكثر من 10 كلمات';
    }
}

