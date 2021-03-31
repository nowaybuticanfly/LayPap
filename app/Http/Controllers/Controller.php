<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="LayPap Docs",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=SWAGGER_LUME_CONST_HOST,
 *      description="Local Server"
 * )
 *
 * @OA\Tag(
 *     name="LayPap",
 *     description="API Endpoints of LayPap"
 * )
 */


class Controller extends BaseController
{
    //
}
