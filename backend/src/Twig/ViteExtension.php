<?php
    namespace App\Twig;

    use Twig\Extension\AbstractExtension;
    use Twig\TwigFunction;

    class ViteExtension extends AbstractExtension
    {
        private string $projectDir;
        private string $env;

        public function __construct(string $projectDir, string $env)
        {
            $this -> projectDir = $projectDir;
            $this -> env = $env;
        }

        public function getFunctions(): array
        {
            return [
                new TwigFunction('vite_entry', [$this, 'viteEntry'], ['is_safe' => ['html']]),
            ];
        }

        public function viteEntry(string $entry): string
        {
            // DEV MODE
            if ($this->env === 'dev') {
                return sprintf(
                    '<script type="module" src="http://localhost:5173/@vite/client"></script>
                    <script type="module" src="http://localhost:5173/assets/%s.js"></script>',
                    $entry
                );
            }

            // PROD MODE
            $manifestPath = $this->projectDir.'/public/build/manifest.json';

            if (!file_exists($manifestPath)) {
                throw new \RuntimeException('Vite manifest not found.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);

            $key = "assets/$entry.js";

            if (!isset($manifest[$key])) {
                throw new \RuntimeException("Entry $entry not found in Vite manifest.");
            }

            $file = $manifest[$key]['file'];

            return sprintf(
                '<script type="module" src="/build/%s"></script>',
                $file
            );
        }
    }
?>