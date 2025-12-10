<?php
    namespace App\Exception;

    use Symfony\Component\HttpKernel\Exception\HttpException;

    class NoPageResolverFoundException extends HttpException
    {
        public function __construct()
        {
            parent::__construct(404, 'Page not found');
        }
    }
?>