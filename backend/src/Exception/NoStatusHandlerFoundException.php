<?php
    namespace App\Exception;

    use Symfony\Component\HttpKernel\Exception\HttpException;

    class NoStatusHandlerFoundException extends HttpException
    {
        public function __construct(string $status)
        {
            parent::__construct(403, "Unsupported user status: {$status}");
        }
    }
?>