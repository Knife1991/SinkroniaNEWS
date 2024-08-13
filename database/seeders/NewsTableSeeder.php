<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        $news = [
            [
                'title' => 'Le Ultime Tendenze del Web Design nel 2024',
                'body' => 'Il 2024 si preannuncia come un anno di grande cambiamento nel web design. Scopri le ultime tendenze che stanno rivoluzionando il settore, dalle interfacce utente immersive ai design minimalisti.',
                'img' => '/img/webdesign.webp',  // Assicurati che l\'immagine esista nella directory public/storage
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Come l\'Intelligenza Artificiale Sta Cambiando il Marketing Digitale',
                'body' => 'L\'intelligenza artificiale sta trasformando il modo in cui le aziende gestiscono il marketing digitale. Scopri come le nuove tecnologie possono ottimizzare le campagne pubblicitarie e migliorare il targeting.',
                'img' => '/img/ai.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '5 Errori Comuni nei Siti Web delle Piccole Imprese',
                'body' => 'Molte piccole imprese commettono errori comuni nella progettazione dei loro siti web. Leggi questi suggerimenti per evitare problemi e migliorare l\'esperienza utente.',
                'img' => '/img/5errori.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Perché la Sicurezza dei Dati è Cruciale per le Web Agency',
                'body' => 'La sicurezza dei dati è una preoccupazione fondamentale per tutte le web agency. Scopri le migliori pratiche per proteggere le informazioni sensibili e garantire la privacy dei clienti.',
                'img' => '/img/sicurezza.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Il Ruolo dei Chatbot nella Customer Experience',
                'body' => 'I chatbot stanno diventando sempre più comuni nei siti web e nelle applicazioni. Esplora come questi strumenti possono migliorare l\'interazione con i clienti e ottimizzare il servizio clienti.',
                'img' => 'chatbot-customer-experience.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'SEO nel 2024: Cosa Aspettarsi',
                'body' => 'Il SEO è in continua evoluzione. Scopri le previsioni per il 2024 e come adattare le tue strategie di ottimizzazione per i motori di ricerca.',
                'img' => 'seo-2024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'L\'Importanza del Mobile-First Design',
                'body' => 'Con l\'aumento dell\'uso dei dispositivi mobili, il mobile-first design è diventato essenziale. Scopri perché è importante e come implementarlo nei tuoi progetti web.',
                'img' => 'mobile-first-design.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tendenze di E-commerce per il 2024',
                'body' => 'Il commercio elettronico continua a crescere rapidamente. Esplora le tendenze e le innovazioni che modelleranno l\'e-commerce nel prossimo anno.',
                'img' => 'ecommerce-2024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ottimizzare il Tempo di Caricamento del Sito: Strategie Efficaci',
                'body' => 'Un sito web veloce è cruciale per l\'esperienza dell\'utente e il SEO. Scopri le migliori strategie per ridurre il tempo di caricamento e migliorare le prestazioni del sito.',
                'img' => 'tempo-caricamento-sito.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'L\'Impatto della Realtà Aumentata sui Siti Web',
                'body' => 'La realtà aumentata offre nuove possibilità per il design dei siti web. Scopri come questa tecnologia sta cambiando il modo in cui gli utenti interagiscono con il contenuto online.',
                'img' => 'realtà-aumentata.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'La Rivoluzione del Cloud Computing: Cosa Devi Sapere',
                'body' => 'Il cloud computing sta rivoluzionando il modo in cui le aziende gestiscono le loro risorse IT. Scopri i vantaggi e le sfide del passaggio al cloud e come può influire sul tuo business.',
                'img' => 'cloud-computing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}
