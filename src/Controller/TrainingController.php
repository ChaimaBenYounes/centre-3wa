<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\{Training,Module};
use App\Repository\{TrainingRepository, ModuleRepository};


class TrainingController extends AbstractController
{

    //private $trainingRepository;

    /*public function __construct(TrainingRepository $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }*/

    /**
     * @Route("/add", name="training_add")
     */
    public function addTraining(EntityManagerInterface $em, Request $request )
    {
        if(!empty($_POST)){

         var_dump($request->request->get('name'));die();

        /*$module1 = new Module();
        $module1->setName('HTML CSS');
        
        $module2 = new Module();
        $module2->setName('Bootstrap');
        
        $module3 = new Module();
        $module3->setName('JavaScript');
       
        $training = new Training();
        $training->setName('BackOffice Web Developper');
        $training->setDescription(' Description BackOffice Web Developper');
        $training->addModules($module1);
        $training->addModules($module2);
        $training->addModules($module3);
            
        $em->persist($training);
        $em->flush();
           
            //return $this->redirectToRoute('view', ['id' => $advert->getId()]);

        }*/

        }

        /*$training = new Training();

        $form = $this->get('form.factory')->createBuilder(FormType::class, $training)
        ->add('name',      TextType::class)
        ->add('description',     TextType::class)
        ->add('published', CheckboxType::class, array('required' => false))
        ->add('save',      SubmitType::class)
        ->getForm()
      ;*/

        return $this->render('trainings/add-training.html.twig', [
            'modules' => $this->showAllModulees()
        ]);


    }

    /**
     * @Route("/trainings", name="trainings")
     */
    public function showAllTrainings(TrainingRepository $trainingRepository)
    {
        $trainings = $trainingRepository->findAll();
        return $this->render('trainings/formation-module-page01.html.twig', ['trainings'=>$trainings]);
    }

    public function showAllModulees()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository(Module::class)->findAll();
    }

    /**
     * @Route("/trainings/{id}", name="training-slug", requirements={"id"="[0-9a-zA-Z-]+"} )
     */
    public function showTraining($id,TrainingRepository $trainingRepository)
    {
        $training = $trainingRepository->find($id);
        $trainings = $trainingRepository->findAll();
        if (!$training) {
            throw $this->createNotFoundException(
                'No training found for id '.$id
            );
        }

        return $this->render('trainings/formation-module-page02.html.twig',[
            'training'=>$training,
            'trainings'=>$trainings
            ]);
    }

    /**
     * @Route("/module/{id}", name="module-slug", requirements={"slug"="[0-9a-zA-Z-]+"} )
     */
    public function showModule($id, ModuleRepository $moduleRepository,TrainingRepository $trainingRepository)
    {
        $module = $moduleRepository->find($id);
        $trainings = $trainingRepository->findAll();

        if (!$module) {
            throw $this->createNotFoundException(
                'No training found for id '.$id
            );
        }
        
        return $this->render('trainings/formation-module-page03.html.twig',[
            'module'=>$module,
            'trainings'=>$trainings
            ]);
    }

}