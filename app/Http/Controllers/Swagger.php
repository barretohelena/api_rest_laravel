<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="This is the API documentation for the product management application.",
 *     @OA\Contact(
 *         name="Your Name",
 *         email="your-email@example.com"
 *     )
 * )
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Use o Bearer token para autenticação",
 *     name="Authorization",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )
 */
class Swagger
{
    // Essa classe pode ficar vazia, o que importa são as anotações acima
}
