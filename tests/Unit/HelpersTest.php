<?php

test('get_formatted_date helper function', function () {
    $result = get_formatted_date(now());

    expect($result)
        ->toBeString()
        ->toContain(now()->translatedFormat('d F Y'))
        ->toContain('Oggi');
});
