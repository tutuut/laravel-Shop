<?php
return [
    'alipay' => [
        'app_id'         => '2021000116689074',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgSjTbqoKjMkNkJRkjL6DM8Xt4CGgSokV+InGhq/mBvuz7IdA8D1QnBQbL9HeGGJ/cV7ucBt0X/iPJQgX9Ay7ObRES1k5n1Na6TK7y3Kk0NFEQBz2OabHh1rZotwnQ2LeuQvpdT0n3plbrIqPKDcp0xqME9njc8iebdVMdZXSpK2x+WXTCP+9ZMq6LSEyraZwCoADTpr8S8GjLuhXJp6NLfNtXROiZbaQK2VpK6F5wesezM5dquUyGSdKBDZHkLAgFWFabErDb6gPkk/CpNr29aahTIEBYM6EW/W1LF5G9KuqMgZqC4SDNLhCTBsSb1GFOEpiEMKN4lCBuiEhM8M/BQIDAQAB',
        'private_key'   => 'MIIEogIBAAKCAQEAgSjTbqoKjMkNkJRkjL6DM8Xt4CGgSokV+InGhq/mBvuz7IdA8D1QnBQbL9HeGGJ/cV7ucBt0X/iPJQgX9Ay7ObRES1k5n1Na6TK7y3Kk0NFEQBz2OabHh1rZotwnQ2LeuQvpdT0n3plbrIqPKDcp0xqME9njc8iebdVMdZXSpK2x+WXTCP+9ZMq6LSEyraZwCoADTpr8S8GjLuhXJp6NLfNtXROiZbaQK2VpK6F5wesezM5dquUyGSdKBDZHkLAgFWFabErDb6gPkk/CpNr29aahTIEBYM6EW/W1LF5G9KuqMgZqC4SDNLhCTBsSb1GFOEpiEMKN4lCBuiEhM8M/BQIDAQABAoIBAHa/cFTIZVa26o/IvwFfjwUkruVoRRUCIH8XPL1ML3KwK+YFHEFEPj6hhbVbgJRuyrkTDKlptH8f6Yuke1FX+zK8eCXGbOH9IxJQILSWPM33+IXxmre6jKv3bSz8t+SOnDMJrqSpi2RvHwfthFz3Cq8aMzt1Ele7VV2pw9g/3SCles4OF+LNAwFHwq4WFIiZaSutlBhRjVL5ZQypIc5isU2LSBsMaVIZlvj9EbktrRWo97pCAx6K50p0Qw2acfqkdKJdVzfC+NA+m34kBLhTJijWhCh8V7qkY/Jlty1yanmupnejXZGnwQo3edR9cdoaF/TR3U2tn1okzsVkNB6zJoECgYEAvjStkR4vv+TUr0K2BXMQWxoWTwo6k/uLc3HOGWvlLXx6zBKcI14jRul+SxKMn78a7JzE8ltROhDzGzGVMh8DpXsFzTTUGvqy+X88el3lwVD+LpFQtdDpsFvC5WDvVjioYhJwrzIYkrgJgNg+zQjxNATVgX6b3tIvSAOH/mkVXNUCgYEArdZOM8G/2Jg1lgj/V6/xjGHDt7nYeglduX9nA0cxHrRVFB1EYg0pqM7MIH5A6vUh3eWpFlW64QYftwCGjokKJf3ChkCsgNzMLlkp4+EgQ3xGkkK6WdMxRJQ3J9kObXvYLrcNEffpvWjWz+GZMzEmJN3LoFMFMP0YUydNlFaOsXECgYA/qgIugJwa7s0BnKKwUEM5OxIcgp/4yEl06rLBb4vWHcQ8aj442FmWcrEDD8Jh9eVdLVv+gvI9LU8x2vbFP/xId1UJypT0MtWVDTGBA8zTV/i8PYd2U+bkUNJ7VGbHxU8XBHUTLwFqmo8TwU3D8ypI7xVHsskZW+DXidcLIME1wQKBgBF5hYr2Yw6m3lwis2hhK2rtOPtzFyvNXTqUcAqIUYvAnPzUpFcm85UglKx/hI8Z7TmdKI4yOAL+1plS2DPj2r1O8QsF3VFm4K+YDvn1W4TtLTruskTtUfqO26yJyUWAOY8Yn5u6zChaLZ3gE8JtomP6V8naDp+KEbPqM4ZB3T5BAoGANMU1nXlCSijT+rrD8VGIaMJVaT878RLjsvVKvwFX/ZjyqBuKwjLRdeQPscaw7JmSMSkMP64CpLE5Lh14vZw54sZZIfOXprcioaxrsK+KX83r/rFZOCFiQUWPXBFe9Ll7zDVTbB9EK95HjoYdhvmvZ5jxU0whOVCCy9/WGZ+gqiM=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
