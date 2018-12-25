<?php

return [
    '^admin$' => 'admin/index',
    '^admin/remove/(\d*)$' => 'admin/remove/$1',

    '$^' => 'site/index',
    '^client/add$' => 'client/add',


];