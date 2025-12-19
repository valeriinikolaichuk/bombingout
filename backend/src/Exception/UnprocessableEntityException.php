<?php
    namespace App\Exception;

    use Symfony\Component\HttpKernel\Exception\HttpException;

    class UnprocessableEntityException extends HttpException
    {
        public function __construct(string $message)
        {
            parent::__construct(422, $message);
        }
    }
?>