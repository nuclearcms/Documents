<?php

use Orchestra\Testbench\TestCase;

class TestBase extends TestCase {

    public function setUp()
    {
        parent::setUp();

        $this->resetDatabase();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/..';

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ]);

        $app['config']->set('transit.upload_path', '../../../../../tests/_uploads');

        $app['config']->set('files', [
                'media_model' => 'Nuclear\Documents\Media\Media',

                'media_types' => [
                    'audio'            => [
                        'audio/aac', 'audio/mp4', 'audio/mpeg', 'audio/ogg', 'audio/wav', 'audio/webm'
                    ],
                    'document'         => [
                        'text/plain', 'application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    ],
                    'image'            => [
                        'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'
                    ],
                    'video'            => [
                        'video/mp4', 'video/ogg', 'video/webm'
                    ],
                    'video-youtube'    => ['video/youtube'],
                    'video-vimeo'      => ['video/vimeo'],
                    'audio-soundcloud' => ['audio/soundcloud'],
                ],
                'model_types' => [
                    'audio'            => 'Nuclear\Documents\Media\Audio',
                    'document'         => 'Nuclear\Documents\Media\Document',
                    'image'            => 'Nuclear\Documents\Media\Image',
                    'video'            => 'Nuclear\Documents\Media\Video',
                    'video-youtube'    => 'Nuclear\Documents\Media\YoutubeVideo',
                    'video-vimeo'      => 'Nuclear\Documents\Media\VimeoVideo',
                    'audio-soundcloud' => 'Nuclear\Documents\Media\SoundcloudAudio',
                ]]
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            'Kenarkose\Files\Provider\FilesServiceProvider',
            'Kenarkose\Sortable\SortableServiceProvider',
            'Kenarkose\Transit\Provider\TransitServiceProvider',
            'Simexis\Oembed\OembedServiceProvider',
            'Intervention\Image\ImageServiceProvider',
            'Dimsav\Translatable\TranslatableServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [];
    }

    protected function resetDatabase()
    {
        // Relative to the testbench app folder: vendors/orchestra/testbench/src/fixture
        $migrationsPath = 'tests/_migrations';
        $artisan = $this->app->make('Illuminate\Contracts\Console\Kernel');

        // Migrate
        $artisan->call('migrate', [
            '--database' => 'sqlite',
            '--path'     => $migrationsPath,
        ]);
    }
}