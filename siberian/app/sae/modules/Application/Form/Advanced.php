<?php

/**
 * Class Application_Form_Advanced
 */
class Application_Form_Advanced extends Siberian_Form_Abstract
{
    /**
     * @throws Zend_Exception
     * @throws Zend_Form_Exception
     * @throws Zend_Validate_Exception
     */
    public function init()
    {
        parent::init();

        $this
            ->setAction(__path('/application/settings_advanced/save'))
            ->setAttrib('id', 'form-application-advanced');

        // Bind as a onchange form!
        self::addClass('onchange', $this);

        $this->addSimpleCheckbox('offline_content',
            p__('application', 'Enable Offline content ?'));

        $disableUpdates = $this->addSimpleCheckbox('disable_updates',
            p__('application', 'Lock application updates'));
        $disableUpdates->setDescription(p__('application', 'When used, the application code will be locked & can only be updated through store updates'));

        $this->addSimpleNumber('fidelity_rate',
            p__('application', 'Fidelity points rate'), 0, 10000, true, 0.01);

        $this->groupElements('fidelity', ['fidelity_rate'],
            p__('application', 'Fidelity points'));
    }
}
