<?php

namespace App\Test\Controller;

use App\Entity\Camping;
use App\Repository\CampingRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CampingControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CampingRepository $repository;
    private string $path = '/camping/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Camping::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Camping index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'camping[Namecamp]' => 'Testing',
            'camping[Descamp]' => 'Testing',
            'camping[Placecamp]' => 'Testing',
            'camping[Datecamp]' => 'Testing',
            'camping[Ndaycamp]' => 'Testing',
            'camping[Idgroupe]' => 'Testing',
        ]);

        self::assertResponseRedirects('/camping/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Camping();
        $fixture->setNamecamp('My Title');
        $fixture->setDescamp('My Title');
        $fixture->setPlacecamp('My Title');
        $fixture->setDatecamp('My Title');
        $fixture->setNdaycamp('My Title');
        $fixture->setIdgroupe('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Camping');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Camping();
        $fixture->setNamecamp('My Title');
        $fixture->setDescamp('My Title');
        $fixture->setPlacecamp('My Title');
        $fixture->setDatecamp('My Title');
        $fixture->setNdaycamp('My Title');
        $fixture->setIdgroupe('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'camping[Namecamp]' => 'Something New',
            'camping[Descamp]' => 'Something New',
            'camping[Placecamp]' => 'Something New',
            'camping[Datecamp]' => 'Something New',
            'camping[Ndaycamp]' => 'Something New',
            'camping[Idgroupe]' => 'Something New',
        ]);

        self::assertResponseRedirects('/camping/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNamecamp());
        self::assertSame('Something New', $fixture[0]->getDescamp());
        self::assertSame('Something New', $fixture[0]->getPlacecamp());
        self::assertSame('Something New', $fixture[0]->getDatecamp());
        self::assertSame('Something New', $fixture[0]->getNdaycamp());
        self::assertSame('Something New', $fixture[0]->getIdgroupe());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Camping();
        $fixture->setNamecamp('My Title');
        $fixture->setDescamp('My Title');
        $fixture->setPlacecamp('My Title');
        $fixture->setDatecamp('My Title');
        $fixture->setNdaycamp('My Title');
        $fixture->setIdgroupe('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/camping/');
    }
}
