<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\DemoBundle\Entity\Category;
use Symfony\Component\Yaml\Yaml;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $data;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categoriesYaml = Yaml::parse($this->getYmlFile());

        foreach ($categoriesYaml as $key => $item) {
            $category = new Category();

            $category->setName(array_key_exists('name', $item) ? $item['name'] : null);

            $manager->persist($category);

            $this->addReference('category-'.$key, $category);
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
        return 1;
    }

    /**
     * @return string
     */
    protected function getYmlFile()
    {
        return __DIR__ . '/Data/Category.yml';
    }
}
