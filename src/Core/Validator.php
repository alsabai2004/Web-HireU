<?php
namespace WebHireU\Core;

final class Validator
{
    public static function required(array $data, array $fields): array
    {
        $errors=[];
        foreach($fields as $field){
            if(trim((string)($data[$field] ?? ''))===''){
                $errors[$field]="$field is required.";
            }
        }
        return $errors;
    }
}
