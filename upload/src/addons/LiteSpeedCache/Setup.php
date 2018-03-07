<?php
/**
 *
 * @since 1.0.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 */

namespace LiteSpeedCache;

use \XF\AddOn\AbstractSetup;

class Setup extends AbstractSetup
{

    use \XF\AddOn\StepRunnerInstallTrait;
    use \XF\AddOn\StepRunnerUninstallTrait;
    use \XF\AddOn\StepRunnerUpgradeTrait;
}
