<?php
    namespace App\Exception;

    use Symfony\Component\HttpKernel\Exception\HttpException;

    class NoPageResolverFoundException extends HttpException
    {
        public function __construct(string $page)
        {
            parent::__construct(404, "Page {$page} not found");
        }
    }
?>