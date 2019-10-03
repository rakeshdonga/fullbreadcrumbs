## Installation Instruction

Copy the content of the repo to the app/code/Rakesh/FixProductBreadcrumbs

You need to perform the following commands after that *(within your magento root directory via ssh)*:

  * `php bin/magento setup:upgrade`

  * `php bin/magento setup:di:compile`

  * `php bin/magento setup:static-content:deploy`
