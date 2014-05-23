<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\DemoBundle\Entity\Executor;
use Acme\DemoBundle\Form\ExecutorType;

/**
 * Executor controller.
 *
 */
class ExecutorController extends Controller
{

    /**
     * Lists all Executor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDemoBundle:Executor')->findAll();

        return $this->render('AcmeDemoBundle:Executor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Executor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Executor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('executor_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeDemoBundle:Executor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Executor entity.
    *
    * @param Executor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Executor $entity)
    {
        $form = $this->createForm(new ExecutorType(), $entity, array(
            'action' => $this->generateUrl('executor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Executor entity.
     *
     */
    public function newAction()
    {
        $entity = new Executor();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeDemoBundle:Executor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Executor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Executor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Executor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeDemoBundle:Executor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Executor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Executor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Executor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeDemoBundle:Executor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Executor entity.
    *
    * @param Executor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Executor $entity)
    {
        $form = $this->createForm(new ExecutorType(), $entity, array(
            'action' => $this->generateUrl('executor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Executor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Executor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Executor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('executor_edit', array('id' => $id)));
        }

        return $this->render('AcmeDemoBundle:Executor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Executor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDemoBundle:Executor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Executor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('executor'));
    }

    /**
     * Creates a form to delete a Executor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('executor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
