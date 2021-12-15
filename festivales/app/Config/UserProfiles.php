<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class UserProfiles extends BaseConfig
{
    //--------------Roles----------------
    //----------Private-----------------
    const SUPER_ADMIN_ROLE = "superadmin";
    const ADMIN_ROLE = "admin";

    //-----Public--------------

    const APP_CLIENT_ROLE = "app_client";

}
