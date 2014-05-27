<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\DemoBundle\Entity\Executor;
use Symfony\Component\Yaml\Yaml;
use DateTime;

class LoadExecutorData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $data;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $executorsYaml = Yaml::parse($this->getYmlFile());

        foreach ($executorsYaml as $key => $item) {
            $executor = new Executor();

            $executor->setFirstName(array_key_exists('firstName', $item) ? $item['firstName'] : null);
            $executor->setMiddleName(array_key_exists('middleName', $item) ? $item['middleName'] : null);
            $executor->setLastName(array_key_exists('lastName', $item) ? $item['lastName'] : null);
            $executor->setBirthday(new \DateTime(array_key_exists('birthday', $item) ? $item['birthday'] : null));
            $executor->setCareerBeginningDate(new \DateTime(array_key_exists('careerBeginningDate', $item) ? $item['careerBeginningDate'] : null));
            $executor->setPhone(array_key_exists('phone', $item) ? $item['phone'] : null);
            $executor->setEmail(array_key_exists('email', $item) ? $item['email'] : null);
            $executor->setSkype(array_key_exists('skype', $item) ? $item['skype'] : null);
            $executor->setTechnologiesUsing(array_key_exists('technologiesUsing', $item) ? $item['technologiesUsing'] : null);

            $manager->persist($executor);

            $this->addReference('executor-'.$key, $executor);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @return string
     */
    protected function getYmlFile()
    {
        return __DIR__ . '/Data/Executor.yml';
    }
}
