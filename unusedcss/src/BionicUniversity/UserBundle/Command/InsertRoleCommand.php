<?php
/**
 * Created by PhpStorm.
 * User: varrek
 * Date: 24.06.14
 * Time: 22:24
 */
namespace BionicUniversity\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BionicUniversity\UserBundle\Entity\Role;

class InsertRoleCommand extends ContainerAwareCommand
{
    /**
     * Configure command, set parameters definition and help.
     */
    protected function configure()
    {
        $this
            ->setName('userbundle:role:insert')
            ->setDescription('Perform my custom schema update.')
            ->setHelp(sprintf(
                'Adds our custom role record. \n' .
                PHP_EOL
            ));
    }

    /**
     * Execution Code
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $entityRole = $em->getRepository('BionicUniversity\UserBundle\Entity\Role')->findOneBy(array('role' => 'ROLE_USER'));
        if ($entityRole == null) {
            $entity = new Role();
            $entity->setName('ROLE_USER');
            $entity->setRole('ROLE_USER');
            $em->persist($entity);
            $em->flush();
            $output = 'Role created!!!';
        } else {
            $output = 'Role exist!!!';
        }
            // do your custom things here.
            echo $output;
        }
    }