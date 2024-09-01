<?php

namespace App\Command;

use App\Entity\Movies;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Psr\Http\Client\ClientInterface; // Utiliser ClientInterface au lieu de GuzzleHttp\Client
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'app:movies',
    description: 'Import movies from TMDb API',
)]
class MoviesCommand extends Command
{
    private ClientInterface $client;
    private SerializerInterface $serializer;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ClientInterface $client,
        SerializerInterface $serializer,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct();
        $this->client = $client;
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            // Utiliser Guzzle pour effectuer la requête à l'API TMDb
            $response = $this->client->request('GET', 'trending/movie/day?language=en-US');

            // Décoder la réponse JSON
            $data = json_decode($response->getBody()->getContents(), true);

            // Initializer la bar de progression
            $progressBar = new ProgressBar($output, count($data['results']));
            $progressBar->start();

            // Boucle pour parcourir les films récupérés et les stocker dans la base de données
            foreach ($data['results'] as $movieData) {
                // Output the raw movie data

                /**
                 * @var Movies $movie
                 */
                $movie = $this->serializer->deserialize(json_encode($movieData), Movies::class, 'json');


                // Afficher les titre au moment de l'appel api
                $io->info($movie->getOriginalTitle());

                // persist db
                $this->entityManager->persist($movie);
                $progressBar->advance();
            }

            // Exécuter la transaction pour enregistrer les films dans la base de données
            $this->entityManager->flush();

            // fin de la progress bar
            $progressBar->finish();


            $io->writeln('');
            $io->success('Movies have been successfully imported from TMDb!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('An error occurred: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
