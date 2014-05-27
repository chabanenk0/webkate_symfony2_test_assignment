<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\DemoBundle\Entity\Project;
use Symfony\Component\Yaml\Yaml;
use DateTime;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $data;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $projectsYaml = Yaml::parse($this->getYmlFile());

        foreach ($projectsYaml as $key => $item) {
            $project = new Project();

            $project->setName(array_key_exists('name', $item) ? $item['name'] : null);
            $project->setCreatedAt(new \DateTime(array_key_exists('createdAt', $item) ? $item['createdAt'] : null));
            $project->setClientCompany(array_key_exists('clientCompany', $item) ? $item['clientCompany'] : null);
            $categoryReferenceName = $item['category'];
            $category = $this->getReference($categoryReferenceName);
            $project->setCategory($category);
            $executors = $item['executors'];
            foreach ($executors as $executorReferenceName) {
                $executor = $this->getReference($executorReferenceName);
                //$project->addExecutor($executor);
                $executor->addProject($project);
            }
    
            $manager->persist($project);

            $this->addReference('project-'.$key, $project);
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
        return 3;
    }

    /**
     * @return string
     */
    protected function getYmlFile()
    {
        return __DIR__ . '/Data/Project.yml';
    }
}
