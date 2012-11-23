<?php

/**
 * chofer actions.
 *
 * @package    automotores
 * @subpackage chofer
 * @author     Your name here
 */
class choferActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Choferess = ChoferesQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ChoferesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ChoferesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Choferes = ChoferesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Choferes, sprintf('Object Choferes does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChoferesForm($Choferes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Choferes = ChoferesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Choferes, sprintf('Object Choferes does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChoferesForm($Choferes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Choferes = ChoferesQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Choferes, sprintf('Object Choferes does not exist (%s).', $request->getParameter('id')));
    $Choferes->delete();

    $this->redirect('chofer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Choferes = $form->save();

      $this->redirect('chofer/edit?id='.$Choferes->getId());
    }
  }
}
