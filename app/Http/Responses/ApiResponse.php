<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class ApiResponse implements Responsable
{

    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;

    public function __construct(int $httpCode, array $data = [], string $errorMessage = '')
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
    }
    public function toResponse($request)
    {
        $payload = match (true) {
            $this->httpCode >= 400 => ['error' => $this->errorMessage],
            $this->httpCode >= 200 => $this->data,
        };

        return response()->json(
            data: $payload,
            status: $this->httpCode,
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(array $data)
    {
        return new static(200, $data);
    }

    public static function notFound(string $errorMessage = "Item not found")
    {
        return new static(404, errorMessage: $errorMessage);
    }

    public static function errorUnprocessableEntity(string $errorMessage): static
    {
        return new static(422, errorMessage: $errorMessage);
    }

    public static function fromException(\Throwable $e): static
    {
        return new static(500, errorMessage: $e->getMessage());
    }
}
