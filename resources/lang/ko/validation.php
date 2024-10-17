<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 다음 언어 줄은 검증기 클래스에서 사용하는 기본 오류 메시지를 포함합니다.
    | 각 규칙에 여러 버전이 있을 수 있습니다. 여기에서 각 메시지를 자유롭게 수정할 수 있습니다.
    |
    */

    'accepted' => ':attribute를 동의해야 합니다.',
    'accepted_if' => ':other이 :value일 때 :attribute를 동의해야 합니다.',
    'active_url' => ':attribute는 유효한 URL이어야 합니다.',
    'after' => ':attribute는 :date 이후의 날짜여야 합니다.',
    'after_or_equal' => ':attribute는 :date 이후 또는 같은 날짜여야 합니다.',
    'alpha' => ':attribute는 문자만 포함할 수 있습니다.',
    'alpha_dash' => ':attribute는 문자, 숫자, 대시(-), 밑줄(_)만 포함할 수 있습니다.',
    'alpha_num' => ':attribute는 문자와 숫자만 포함할 수 있습니다.',
    'array' => ':attribute는 배열이어야 합니다.',
    'ascii' => ':attribute는 단일 바이트의 영숫자 및 기호만 포함해야 합니다.',
    'before' => ':attribute는 :date 이전의 날짜여야 합니다.',
    'before_or_equal' => ':attribute는 :date 이전 또는 같은 날짜여야 합니다.',
    'between' => [
        'array' => ':attribute의 항목 수는 :min에서 :max 사이여야 합니다.',
        'file' => ':attribute의 크기는 :min에서 :max 킬로바이트 사이여야 합니다.',
        'numeric' => ':attribute는 :min에서 :max 사이여야 합니다.',
        'string' => ':attribute는 :min에서 :max 글자 사이여야 합니다.',
    ],
    'boolean' => ':attribute는 true 또는 false여야 합니다.',
    'can' => ':attribute에 허용되지 않은 값이 포함되어 있습니다.',
    'confirmed' => ':attribute 확인이 일치하지 않습니다.',
    'contains' => ':attribute에 필수 항목이 누락되었습니다.',
    'current_password' => '비밀번호가 올바르지 않습니다.',
    'date' => ':attribute는 유효한 날짜여야 합니다.',
    'date_equals' => ':attribute는 :date와 같은 날짜여야 합니다.',
    'date_format' => ':attribute는 :format 형식과 일치해야 합니다.',
    'decimal' => ':attribute는 :decimal 자리의 소수여야 합니다.',
    'declined' => ':attribute는 거부해야 합니다.',
    'declined_if' => ':other가 :value일 때 :attribute는 거부해야 합니다.',
    'different' => ':attribute와 :other는 서로 달라야 합니다.',
    'digits' => ':attribute는 :digits 자리여야 합니다.',
    'digits_between' => ':attribute는 :min에서 :max 자리 사이여야 합니다.',
    'dimensions' => ':attribute의 이미지 크기가 잘못되었습니다.',
    'distinct' => ':attribute에 중복된 값이 있습니다.',
    'doesnt_end_with' => ':attribute는 다음 중 하나로 끝날 수 없습니다: :values.',
    'doesnt_start_with' => ':attribute는 다음 중 하나로 시작할 수 없습니다: :values.',
    'email' => ':attribute는 유효한 이메일 주소여야 합니다.',
    'ends_with' => ':attribute는 다음 중 하나로 끝나야 합니다: :values.',
    'enum' => '선택된 :attribute가 유효하지 않습니다.',
    'exists' => '선택된 :attribute가 유효하지 않습니다.',
    'extensions' => ':attribute는 다음 중 하나의 파일이어야 합니다: :values.',
    'file' => ':attribute는 파일이어야 합니다.',
    'filled' => ':attribute 필드에 값이 있어야 합니다.',
    'gt' => [
        'array' => ':attribute는 :value개보다 많은 항목을 포함해야 합니다.',
        'file' => ':attribute는 :value킬로바이트보다 커야 합니다.',
        'numeric' => ':attribute는 :value보다 커야 합니다.',
        'string' => ':attribute는 :value글자보다 길어야 합니다.',
    ],
    'gte' => [
        'array' => ':attribute는 :value개 이상의 항목을 포함해야 합니다.',
        'file' => ':attribute는 :value킬로바이트 이상이어야 합니다.',
        'numeric' => ':attribute는 :value 이상이어야 합니다.',
        'string' => ':attribute는 :value글자 이상이어야 합니다.',
    ],
    'hex_color' => ':attribute는 유효한 16진수 색상이어야 합니다.',
    'image' => ':attribute는 이미지여야 합니다.',
    'in' => '선택된 :attribute가 유효하지 않습니다.',
    'in_array' => ':attribute는 :other에 존재해야 합니다.',
    'integer' => ':attribute는 정수여야 합니다.',
    'ip' => ':attribute는 유효한 IP 주소여야 합니다.',
    'ipv4' => ':attribute는 유효한 IPv4 주소여야 합니다.',
    'ipv6' => ':attribute는 유효한 IPv6 주소여야 합니다.',
    'json' => ':attribute는 유효한 JSON 문자열이어야 합니다.',
    'list' => ':attribute는 목록이어야 합니다.',
    'lowercase' => ':attribute는 소문자여야 합니다.',
    'lt' => [
        'array' => ':attribute는 :value개 미만의 항목을 포함해야 합니다.',
        'file' => ':attribute는 :value킬로바이트 미만이어야 합니다.',
        'numeric' => ':attribute는 :value 미만이어야 합니다.',
        'string' => ':attribute는 :value글자 미만이어야 합니다.',
    ],
    'lte' => [
        'array' => ':attribute는 :value개 이상의 항목을 포함할 수 없습니다.',
        'file' => ':attribute는 :value킬로바이트 이하여야 합니다.',
        'numeric' => ':attribute는 :value 이하여야 합니다.',
        'string' => ':attribute는 :value글자 이하여야 합니다.',
    ],
    'mac_address' => ':attribute는 유효한 MAC 주소여야 합니다.',
    'max' => [
        'array' => ':attribute는 :max개 이상의 항목을 포함할 수 없습니다.',
        'file' => ':attribute는 :max킬로바이트를 초과할 수 없습니다.',
        'numeric' => ':attribute는 :max보다 클 수 없습니다.',
        'string' => ':attribute는 :max글자를 초과할 수 없습니다.',
    ],
    'max_digits' => ':attribute는 :max자리 이상일 수 없습니다.',
    'mimes' => ':attribute는 다음 유형의 파일이어야 합니다: :values.',
    'mimetypes' => ':attribute는 다음 유형의 파일이어야 합니다: :values.',
    'min' => [
        'array' => ':attribute는 최소 :min개의 항목을 포함해야 합니다.',
        'file' => ':attribute는 최소 :min킬로바이트여야 합니다.',
        'numeric' => ':attribute는 최소 :min이어야 합니다.',
        'string' => ':attribute는 최소 :min글자여야 합니다.',
    ],
    'min_digits' => ':attribute는 최소 :min자리여야 합니다.',
    'missing' => ':attribute 필드는 누락되어야 합니다.',
    'missing_if' => ':other이 :value일 때 :attribute 필드는 누락되어야 합니다.',
    'missing_unless' => ':other이 :value가 아닐 때 :attribute 필드는 누락되어야 합니다.',
    'missing_with' => ':values가 있을 때 :attribute 필드는 누락되어야 합니다.',
    'missing_with_all' => ':values가 있을 때 :attribute 필드는 누락되어야 합니다.',
    'multiple_of' => ':attribute는 :value의 배수여야 합니다.',
    'not_in' => '선택된 :attribute가 유효하지 않습니다.',
    'not_regex' => ':attribute 형식이 유효하지 않습니다.',
    'numeric' => ':attribute는 숫자여야 합니다.',
    'password' => [
        'letters' => ':attribute에는 최소 하나의 문자가 포함되어야 합니다.',
        'mixed' => ':attribute에는 최소 하나의 대문자와 소문자가 포함되어야 합니다.',
        'numbers' => ':attribute에는 최소 하나의 숫자가 포함되어야 합니다.',
        'symbols' => ':attribute에는 최소 하나의 기호가 포함되어야 합니다.',
        'uncompromised' => '입력한 :attribute가 데이터 유출에서 발견되었습니다. 다른 :attribute를 선택하세요.',
    ],
    'present' => ':attribute 필드가 있어야 합니다.',
    'present_if' => ':other이 :value일 때 :attribute 필드가 있어야 합니다.',
    'present_unless' => ':other이 :value가 아닐 때 :attribute 필드가 있어야 합니다.',
    'present_with' => ':values가 있을 때 :attribute 필드가 있어야 합니다.',
    'present_with_all' => ':values가 있을 때 :attribute 필드가 있어야 합니다.',
    'prohibited' => ':attribute 필드는 금지되어 있습니다.',
    'prohibited_if' => ':other이 :value일 때 :attribute 필드는 금지되어 있습니다.',
    'prohibited_unless' => ':other이 :values 중 하나에 해당되지 않는 한 :attribute 필드는 금지되어 있습니다.',
    'prohibits' => ':attribute 필드는 :other가 있는 것을 금지합니다.',
    'regex' => ':attribute 형식이 유효하지 않습니다.',
    'required' => ':attribute 필드는 필수입니다.',
    'required_array_keys' => ':attribute 필드에는 다음 항목이 포함되어야 합니다: :values.',
    'required_if' => ':other이 :value일 때 :attribute 필드는 필수입니다.',
    'required_if_accepted' => ':other이 수락되었을 때 :attribute 필드는 필수입니다.',
    'required_if_declined' => ':other이 거부되었을 때 :attribute 필드는 필수입니다.',
    'required_unless' => ':other이 :values 중 하나에 해당되지 않는 한 :attribute 필드는 필수입니다.',
    'required_with' => ':values가 있을 때 :attribute 필드는 필수입니다.',
    'required_with_all' => ':values가 있을 때 :attribute 필드는 필수입니다.',
    'required_without' => ':values가 없을 때 :attribute 필드는 필수입니다.',
    'required_without_all' => ':values 중 하나도 없을 때 :attribute 필드는 필수입니다.',
    'same' => ':attribute와 :other는 일치해야 합니다.',
    'size' => [
        'array' => ':attribute는 :size개의 항목을 포함해야 합니다.',
        'file' => ':attribute는 :size킬로바이트여야 합니다.',
        'numeric' => ':attribute는 :size여야 합니다.',
        'string' => ':attribute는 :size글자여야 합니다.',
    ],
    'starts_with' => ':attribute는 다음 중 하나로 시작해야 합니다: :values.',
    'string' => ':attribute는 문자열이어야 합니다.',
    'timezone' => ':attribute는 유효한 시간대여야 합니다.',
    'unique' => ':attribute는 이미 사용 중입니다.',
    'uploaded' => ':attribute를 업로드하지 못했습니다.',
    'uppercase' => ':attribute는 대문자여야 합니다.',
    'url' => ':attribute는 유효한 URL이어야 합니다.',
    'ulid' => ':attribute는 유효한 ULID여야 합니다.',
    'uuid' => ':attribute는 유효한 UUID여야 합니다.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 여기에서 속성 규칙을 사용하여 사용자 정의 검증 메시지를 지정할 수 있습니다.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | 다음 언어 줄은 속성 자리 표시자를 사용자 친화적인 용어로 교체하는 데 사용됩니다.
    | 예를 들어, "email" 대신 "이메일 주소"를 사용할 수 있습니다.
    |
    */

    'attributes' => [],

];
