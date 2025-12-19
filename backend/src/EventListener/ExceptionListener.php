<?php
    namespace App\EventListener;

    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpKernel\Event\ExceptionEvent;
    use Twig\Environment;
    use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

    class ExceptionListener
    {
        public function __construct(private Environment $twig) {}

        public function onKernelException(ExceptionEvent $event): void
        {
            $e = $event -> getThrowable();
            $request = $event -> getRequest();

            $statusCode = $e instanceof HttpExceptionInterface
                ? $e -> getStatusCode()
                : 500;

            $accept = $request -> headers ->get('Accept', '');

            $message = $statusCode >= 500
            ? 'Internal server error'
            : $e -> getMessage();

            if ($request -> isXmlHttpRequest() || 
                str_contains($accept, 'application/json'))
            {
                $event -> setResponse(new JsonResponse([
                    'success' => false,
                    'error'   => $message
                ], $statusCode));

                return;
            }

            $template = match ($statusCode) {
                403     => 'errors/403.html.twig',
                404     => 'errors/404.html.twig',
                422     => 'errors/422.html.twig',
                default => 'errors/500.html.twig'
            };

            $html = $this -> twig -> render($template, [
                'message' => $message
            ]);

            $event -> setResponse(new Response($html, $statusCode));
        }
    }
?>