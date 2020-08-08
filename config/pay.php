<?php
return [
    'alipay' => [
        'app_id'         => '2021000116689074',
        'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB',
        'private_key'    => 'MIIEogIBAAKCAQEAg80rYHf03s8YJfAzKpvDfsBznwZABcQK2Xd1W7G6ZTcP2Ea/0oB+KmzdgzIxgXVZ2Z6W8E6LVBXXDgg5OTxpUyNkfDoBZzdwrovU1YMANN8EIeg/Uyb3nHHa2sCX3AsQZx5cSHPvll7eJ3GWDXJ70oIcQ6xCrxYheD+1uZq6Tecopp9En2F/nU/rC1bId41fZF0XCTCuAX1tmJdTpZze5PqoGFRX8h2BXSUW6r5IjM/gNMk6kUNgQxwm4t/BhULeUUXF+tbY2m/YNLL9n1XCVNyWCza1lKi1AOJ+uE089Tf/dhM8brRW5QSIxRALVmL42oDFgMUpD2XakJ/mS8B+fwIDAQABAoIBAAxUflFZB4RslVK/RNoglkpeULK4z/Z6H5W2kjkQyGI9o3LVM47KzILFineCk5UL2Gr+Zhp3DpvAK005wbi0CRpo/jaM6qKwUg9SL4gF6FgJ4QYXBw2NYK63DAVY7Rv9wPwUoAd7KRfFKj1AaAw8AI9x8pj2HYrppBnuw95oNjOhYEKWef1Sup+F7NfpV03R8rJ2ibjueqXFZrdONwE67/P6fsot6fgc8q+KIsdjahHMUVndn6xIr+lC5wSs8npiUf9LQ+xEEs2leLY81TZuWXKjhmEp9Izs1MZ/w0lygHGrMN4jlQGgvm9ih1OAHkNOII0OQ94Y1Tbg6qkRQMhjuukCgYEA5DxPccHdDqZfB9asdzg38JEZkF0dN6TUJBE89pgo+94fhQiu4/4ceUYExhh4rNBenORpbtT+OPO2mgVUOp1Vpy6YQsO+O10iu9hvA/U1pH8TxY5apSdn2URxjre7LSgEnfHlIG+ZZc8lLD8gfSmmuY7pOkHVaOyyZhzbLZJUydsCgYEAk9W3ei+elQfJf0r0bGxVyX/+lK6oC1VaJCDjmWlmTwzu+vK48kLMmIAlxbap7TD26h4aKvDTHMo/ao9273JaWNkNf49zLc52JBjkVmQ0P11n5na/2YYfl5P/9RZq0QliiqxJtA87rM+ETkiUPz12ewoApP5aoV/Iehb+DrZ5+S0CgYB/3l4wAIoFxCYnsRkM7h1BFTn6TICrBRipYFMEYPlNKwQDt3qsV1jChPz1sw4g29i2E64SHxiS9c/O+L9Y2376XDuH5Dy265YjIb4IvJ+iGmQMYZXdQ3eGHTd12u/t+6aiirxw8LVDect8v51HIke7XBrEvc9/qmTEmtQc8we30wKBgBbCrq7nKfkz67fnaF5RB5wwUpe9lC26hFhPn/r8mT3OdfS47fSOiEVqZWZdSygzg7Bj1g+KaFZkZQMY92zCJFrNgCCFi2wf/1xrYKxUXR7sWJTI75yj47VImf2359YrJbrH78kDF2LxyCLtVbWu1tD2p0a/ymBSCOGTLKZDPeA5AoGADMVQyFfZdok3GI6CTh5Pnsdwz8fHkEjRXcYfhDXQ5tGHE1CumaE5gxn+l6jTHl7xigrJO4e9v290KbC7KeqD2koQecVnXOOC9l2MxWmFN1uhjFQ45QOgOzxih4Sa9gs83lXVH1fHVh3r5sIlsHfLLybR9Vx1XDRnLONdkfIESuI=',
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
