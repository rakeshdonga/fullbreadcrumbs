## Installation

Create a folder named **Rakesh/FixProductBreadcrumbs** under your app/code folder within your Magento Root directory and place all provided files within the src directory under that.

You need to perform the following commands after that *(within your magento root directory via ssh)*:

  * `php bin/magento setup:upgrade`

  * `php bin/magento setup:di:compile`

  * `php bin/magento setup:static-content:deploy`
