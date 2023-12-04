<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\CategoryMoto;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private const CATEGORIES = [
        'Sportbike',
        'Cruiser',
        'Touring',
        'Dual Sport',
        'Adventure Touring',
        'Sport Touring',
        'Naked Bike',
        'Standard',
        'Cafe Racer',
        'Chopper',
        'Bobber',
        'Touring Cruiser',
        'Trike',
        'Off-Road',
        'Supermoto',
        'Scooter',
        'Electric',
        'Dirt Bike',
        'Vintage',
        'Custom',
    ];
    private const BRANDS = [
        'Honda',
        'Yamaha',
        'Suzuki',
        'Kawasaki',
        'Ducati',
        'Harley-Davidson',
        'BMW',
        'Triumph',
        'KTM',
        'Aprilia',
        'Moto Guzzi',
        'Indian Motorcycle',
        'Husqvarna',
        'Royal Enfield',
        'Victory Motorcycles',
        'Buell',
        'MV Agusta',
        'Benelli',
        'Zero Motorcycles',
        'Hyosung',
    ];
    private const NB_USER = 10;
    
    public function __construct(
        private string $adminEmail
    )
    {

    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for($i = 0; $i < self::NB_USER; $i++)
        {
            $regularUser = new User();
            $regularUser
                ->setEmail($faker->email())
                ->setPassword('test1234')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setPhoneNumber($faker->phoneNumber())
                ->setProfilePicture('default')
                ->setPseudo($faker->realTextBetween(5,15));
    
            $manager->persist($regularUser);
        }

        $adminUser = new User();
        $adminUser
            ->setEmail($this->adminEmail)
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword('admin1234')
            ->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setPhoneNumber($faker->phoneNumber())
            ->setProfilePicture('default')
            ->setPseudo($faker->realTextBetween(5,15));

        $manager->persist($adminUser);
        
        // $users = [$regularUser, $adminUser];
        

        for ($i = 0; $i < count(self::CATEGORIES); $i++)
        {
            $category = new CategoryMoto();
            $category->setName(self::CATEGORIES[$i]);
            $manager->persist($category);
        }

        for ($i = 0; $i < count(self::BRANDS); $i++)
        {
            $brand = new Brand();
            $brand->setName(self::BRANDS[$i]);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
